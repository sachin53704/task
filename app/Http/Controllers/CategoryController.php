<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService;
    }

    public function list()
    {
        $category = $this->categoryService->list();

        return view('category.list', compact('category'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(CategoryRequest $req)
    {
        $category = $this->categoryService->store($req);

        if($category)
        {
            session()->flash('success', "New category created successfully");

            return redirect('/category/list');
        }
    }

    public function edit($id)
    {
        $category = $this->categoryService->edit($id);

        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $req)
    {
        $category = $this->categoryService->update($req);

        if($category)
        {
            session()->flash('success', "Category updated successfully");

            return redirect('/category/list');
        }
    }

    public function delete(Request $req)
    {
        $category = $this->categoryService->delete($req);

        if($category)
        {
            session()->flash('success', "Category removed successfully");

            return redirect('/category/list');
        }
    }

    public function getTrash()
    {
        $category = $this->categoryService->getTrash();

        return view('category.trash', compact('category'));
    }

    public function restore(Request $req)
    {
        $category = $this->categoryService->restore($req);

        if($category)
        {
            session()->flash('success', "category restore successfully");

            return redirect('/category/trash');
        }
    }


    public function deleteForever(Request $req)
    {
        $category = $this->categoryService->deleteForever($req);

        if($category)
        {
            session()->flash('success', "category removed successfully");

            return redirect('/category/trash');
        }
    }
}
