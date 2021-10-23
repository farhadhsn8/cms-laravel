<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(15);
        $parent_categories = Category::where('category_id',null)->get();
        return view('panel.categories.index')->with('categories',$categories)->with('parent_categories',$parent_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required' , 'string' , 'max:255'],
            'slug' => ['required' , 'string' , 'max:255' , 'unique:categories'],
            'category_id' => ['nullable' , 'exists:categories,id' , 'max:255']
        ]);

        Category::create(
            $request->only(['name' , 'slug' , 'category_id'])
        );
        session()->flash('status' , 'دسته بندی با موفقیت ایجاد شد !');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category , Request $request)
    {
        $category->delete();
        $request->session()->flash('status' , 'دسته بندی به درستی حذف شد!');
        return redirect()->route('categories.index');
    }
}
