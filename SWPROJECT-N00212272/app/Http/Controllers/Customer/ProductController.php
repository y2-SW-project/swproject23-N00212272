<?php

namespace App\Http\Controllers\Customer;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use App\Models\Material;
// use Illuminate\Support\Facades\DB;
use App\Models\Condition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use App\Enums\CategoryTypesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('customer');
        $products = Product::when($request->category_id != null, function($q) use ($request){
            return $q->where('category_id',$request->category_id);
        })
        ->when($request->condition_id != null, function($q) use ($request){
            return $q->where('condition_id',$request->condition_id);
        })
        ->when($request->size_id != null, function($q) use ($request){
            return $q->where('size_id',$request->size_id);
        })
        ->when($request->price != null, function($q) use ($request){
            return $q->orderby('price',$request->price);
        })
        ->paginate(25);


        return view('customer.products.index')->with(compact('products'));
    }





    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $products = Product::paginate(3);
        return view('customer.products.show')->with('product',$product)->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function buy(Product $product)
    {
        
        return view('customer.products.buy')->with('product',$product);
    }
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('customer');

       
        $categories = Category::all();
        $sizes = Size::all();
        $conditions = Condition::all();
        $materials = Material::all();
        //shows the create view from create.blade.php
        return view('customer.products.create')->with('categories',$categories)->with('conditions',$conditions)->with('sizes',$sizes)->with('materials',$materials);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    
        
        $request->validate([
            'name' => 'required|max:120',
            'description' => 'required',
            'price' => 'required',
            'category_id'=>'required',
            'size_id'=>'required',
            'condition_id' => 'required',
            'materials' => ['required'],
        ]);
        
           //creating variable for image and its extension
           $image1 = $request->file('image1');
           $extension = $image1->getClientOriginalExtension();
   
           //file name has to be unique so i added in this for a unqiue name so it can be definitly be found
           $filename= date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension;
           
           $path1 = $image1->storeAs('public/images', $filename);

           $image2 = $request->file('image2');
           $extension2 = $image2->getClientOriginalExtension();
   
           //file name has to be unique so i added in this for a unqiue name so it can be definitly be found
           $filename2= date('Y-m-d') . '_' . $request->input('name') . '.' . $extension2;
           
           $path2 = $image2->storeAs('public/images', $filename2);

           $image3 = $request->file('image3');
           $extension3 = $image3->getClientOriginalExtension();
   
           //file name has to be unique so i added in this for a unqiue name so it can be definitly be found
           $filename3= date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension3;
           
           $path3 = $image3->storeAs('public/images', $filename3);
            
       $product = new Product;

       $product->user_id = Auth::id();
       $product->name = $request->name;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->category_id = $request->category_id;
       $product->size_id = $request->size_id;
       $product->condition_id = $request->condition_id;
       $product->image1 = $filename;
       $product->image2 = $filename2;
       $product->image3= $filename3;

       $product->save();

         //adds entry to pivot table
         $product->materials()->attach($request->materials);

         return to_route('customer.products.index');
    
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('customer.products.index')->with('success', 'Thank you for your purchase, A confirmation email has been sent, please check email for more details');
    }
   
}
