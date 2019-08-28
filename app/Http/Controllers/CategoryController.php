<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Cart;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = Category::paginate(3);
        return view('admin.category.index', compact('categories'))->with('no', 1);
    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
             ]);

       $category = New Category;
        $category->name = $request->name;

         $category->save();
         return back()->withInfo('New Category Added Succesfully!!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories= Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
             ]);

       $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
         return back()->withInfo('Category Updated succesfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories= Category::find($id);
        $categories->delete();

        return back()->withInfo('Category Deleted succesfully!!!');


    }

    public function showcategories($id)
    {

        $cartItems = Cart::content();
        $categories = Category::all();
        $categories2 = Category::find($id);
        return view('showcategories', compact('categories2','categories','cartItems'));
    }
}
