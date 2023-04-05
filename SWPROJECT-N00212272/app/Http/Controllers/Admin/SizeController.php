<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SizeController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $sizes = Size::all();
      
        return view('admin.sizes.index')->with('sizes',$sizes);
    }


    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        //shows the create view from create.blade.php
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    
        
        $request->validate([
            'ageRange' => 'required|max:120',
        ]);
        
          
            
       $size = new Size;

       $size->ageRange = $request->ageRange;
       $size->save();

         return to_route('admin.sizes.index');
    
    }

    /**
     * Display the specified resource.
     */
    // public function show(Size $size)
    // {
    //     return view('admin.sizes.show')->with('size',$size);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
          $user = Auth::user();
        $user->authorizeRoles('admin');

    
        
        return view('admin.sizes.edit')->with('size',$size);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
      
    $request->validate([
        'ageRange' => 'required|max:120',
    ]);
        //updates the variables in database
    $size->update([
        'ageRange' => $request->ageRange,
    ]);
        
    return to_route('admin.sizes.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return to_route('admin.sizes.index');
    }
   
}
