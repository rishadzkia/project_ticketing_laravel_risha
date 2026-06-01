<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller  
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    // Read data
    {
        // ASC urutan berdasrkan abjad
      $category = Categories::orderBy('id', 'ASC')->get();
      return response()->json([
        'Status' => 'Success',
        'data'=>$category 
      ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    // Store: create data
    {
       $request->validate([
        'name' => 'required|String',
       ]);

       Categories::create($request->all());

       return response()->json([
        'Status' => 'Sukses menambahkan category',
        'data' => $request->all()
       ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
