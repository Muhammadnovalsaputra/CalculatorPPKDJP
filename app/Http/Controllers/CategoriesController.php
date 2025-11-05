<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // select * from categories
        $datas = category::orderBy('id', 'desc')->get();
        $title = 'Data Catagories';
        return view('categories.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Categories';
        // categories mengambil dari folder
        return view('categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // nama category ngambil dari model category.php
        category::create($request->all());
        alert()->success('success', 'success insert');
        return redirect()->to('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //select * from categories where id=$id
        $edit = category::find($id);
        $title = "Edit Categories";
        // categories view ngambil dari nama folder
        return view('categories.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $update = category::find($id);
        $update->category_name = $request->category_name;
        $update->save();
        alert()->success('Success', 'Updated success');
        return redirect()->to('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        category::find($id)->delete();
        alert()->success('Success', 'Delete success');
        return redirect()->to('category');
    }
}
