<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
       return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|unique:categories'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('status', 'Categoria creada con éxito');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', ['category' => $category]);

    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3|max:255|unique:categories'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('status', 'Categoria actualizada con éxito');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('status', 'Categoria Eliminada con éxito');
    }
}
