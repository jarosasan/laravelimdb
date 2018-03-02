<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('admin.form.creat_cat_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $category, CreateCategoryRequest $request)
    {
	    $category->create($request->except('_token', '_method')+[
	    	'user_id' => Auth::id()
		    ]);
	
	    return redirect(route('admin_category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
	    $categories =  Category::all();
	    $data = ['categories' => $categories];
	
	    return view('admin.categories', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $category =  Category::findOrFail($id);
	    $data['category'] = $category;
	    return view('admin.form.edit_cat_form', $data );
	    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoryRequest $request, Category $category, $id)
    {
	    $category = $category->findOrFail($id);
	    $category->update($request->except('_token'));
	
	    return redirect(route('admin_category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category->findOrFail($id)->delete();
        
        return redirect(route('admin_category'));
    }
}
