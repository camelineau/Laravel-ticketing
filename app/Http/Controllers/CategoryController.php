<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mailers\AppMailer;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new Category([
            'name' => $request->input('name'),
            'parent_id' => $request->input('category')
        ]);

        $category->save();

        return redirect()->back()->with("status", "La catégorie $category->name a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $category = Category::where('id', $category_id)->firstOrFail();

        return view('category.show', compact('category'));
    }

    public function delete($category_id)
    {
        Category::where('id', $category_id)->delete();

        return redirect()->back()->with("status", "La catégorie $category_id->name a été supprimée.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        #$category_id= Category::where('id', $category)->firstOrFail();

        return view('category.edit', compact('categories'));
    }
    public function update(Request $request, $category_id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $name-> $request->input('name');
        $parent_id-> $request->input('category');

        Category::where('id', $category_id)->update(['name'=>$name, 'parent_id'=>$parent_id]);
        /*$category = new Category([
            'name' => $request->input('name'),
            'parent_id' => $request->input('category')
        ]);*/

        $category->save();

        return redirect()->back();
    }
}