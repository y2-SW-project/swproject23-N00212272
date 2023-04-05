<?php

namespace App\Http\Controllers\Admin;

use App\Models\Condition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ConditionController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $conditions = Condition::all();
      
        return view('admin.conditions.index')->with('conditions',$conditions);
    }


    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        //shows the create view from create.blade.php
        return view('admin.conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    
        
        $request->validate([
            'type' => 'required|max:120',
        ]);
        
          
            
       $condition = new Condition;
       $condition->type = $request->type;
       $condition->save();

         return to_route('admin.conditions.index');
    
    }

    /**
     * Display the specified resource.
     */
    // public function show(Condition $condition)
    // {
    //     return view('admin.conditions.show')->with('condition',$condition);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Condition $condition)
    {
          $user = Auth::user();
        $user->authorizeRoles('admin');

    
        
        return view('admin.conditions.edit')->with('condition',$condition);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Condition $condition)
    {
      
    $request->validate([
        'type' => 'required|max:120',
    ]);
        //updates the variables in database
    $condition->update([
        'type' => $request->type,
    ]);
        
    return to_route('admin.conditions.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Condition $condition)
    {
        $condition->delete();
        return to_route('admin.conditions.index');
    }
   
}
