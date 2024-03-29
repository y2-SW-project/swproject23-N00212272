<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MaterialController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $materials = Material::all();
      
        return view('admin.materials.index')->with('materials',$materials);
    }


    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        //shows the create view from create.blade.php
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    
        
        $request->validate([
            'name' => 'required|max:120',
        ]);
        
          
            
       $material = new Material;
       $material->name = $request->name;
       $material->save();

         return to_route('admin.materials.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('admin.materials.show')->with('material',$material);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
          $user = Auth::user();
        $user->authorizeRoles('admin');

    
        
        return view('admin.materials.edit')->with('material',$material);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
      
    $request->validate([
        'name' => 'required|max:120',
    ]);
        //updates the variables in database
    $material->update([
        'name' => $request->name,
    ]);
        
    return to_route('admin.materials.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return to_route('admin.materials.index');
    }
   
}
