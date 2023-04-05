<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $categories = Category::all();
      
        return view('admin.categories.index')->with('categories',$categories);
    }


    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        //shows the create view from create.blade.php
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    
        
        $request->validate([
            'name' => 'required|max:120',
        ]);
        
          
            
       $category = new Category;
       $category->name = $request->name;
       $category->save();

         return to_route('admin.categories.index');
    
    }

    /**
     * Display the specified resource.
     */
    // public function show(Category $category)
    // {
    //     return view('admin.categories.show')->with('category',$category);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
          $user = Auth::user();
        $user->authorizeRoles('admin');

    
        
        return view('admin.categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
      
    $request->validate([
        'name' => 'required|max:120',
    ]);
        //updates the variables in database
    $category->update([
        'name' => $request->name,
    ]);
        
    return to_route('admin.categories.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index');
    }
   
}
