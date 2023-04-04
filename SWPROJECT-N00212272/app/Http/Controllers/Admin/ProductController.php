<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use App\Models\Material;
// use Illuminate\Support\Facades\DB;
use App\Models\Condition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\CategoryTypesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $products = Product::all();

       


        return view('admin.products.index')->with('products', $products);
    }


    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

       
        $categories = Category::all();
        $sizes = Size::all();
        $conditions = Condition::all();
        $materials = Material::all();
        //shows the create view from create.blade.php
        return view('admin.products.create')->with('categories',$categories)->with('conditions',$conditions)->with('sizes',$sizes)->with('materials',$materials);
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

         return to_route('admin.products.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
          $user = Auth::user();
        $user->authorizeRoles('admin');

        $products = Product::all();
        $categories = Category::all();
        $sizes = Size::all();
        $conditions = Condition::all();
        $materials = Material::all();
        //This gets the sizes id from the pivot table and plucks the id to an array
        $material_id = $product->materials->pluck('id')->toArray();

        // $image1 = $product->old('image1');
        
        return view('admin.products.edit')->with('product',$product)->with('categories',$categories)->with('conditions',$conditions)->with('sizes',$sizes)->with('materials',$materials)->with('material_id', $material_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //image1
        $image1 = $request->file('image1');
        $extension1 = $image1->getClientOriginalExtension();
        
        $filename1= date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension1;
        // store the file $image2 in /public/images, and name is $filename
        $path1 = $image1->storeAs('public/images', $filename1);

         //image2
            $image2 = $request->file('image2');
            $extension2 = $image2->getClientOriginalExtension();
            
            $filename2= date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension2;
            // store the file $image2 in /public/images, and name is $filename
            $path2 = $image2->storeAs('public/images', $filename2);

            //image3
            $image3 = $request->file('image3');
            $extension3 = $image3->getClientOriginalExtension();

            $filename3= date('Y-m-d-His') . '_' . $request->input('name') . '.' . $extension3;
            // store the file $image3 in /public/images, and name is $filename
            $path3 = $image3->storeAs('public/images', $filename3);

    

    // dd($request);
    //validates updated database
    $request->validate([
        'name' => 'required|max:120',
        'description' => 'required',
        'price' => 'required',
        'category_id'=>'required',
        'size_id'=>'required',
        'condition_id' => 'required',
        'materials' => ['required'],
    ]);
        //updates the variables in database
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id'=>$request->category_id,
        'condition_id' => $request->condition_id,
        'size_id'=> $request->size_id,
        'image1' => $filename1,
        'image2' => $filename2,
        'image3' => $filename3,
    ]);

    
    
     
    
    //deletes existing ids
      $product->materials()->detach();
       //adds entry to pivot table
        $product->materials()->attach($request->materials);
        
  
   

    return to_route('admin.products.show',$product);
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.products.index');
    }
   
}
