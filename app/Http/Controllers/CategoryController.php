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
        // to call category service class
        $this->categoryService = new CategoryService;
    }

    public function list()
    {
        // to get the list of category data
        $category = $this->categoryService->list();

        return view('category.list', compact('category'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(CategoryRequest $req)
    {
        // to store the new category
        $category = $this->categoryService->store($req);

        if($category)
        {
            session()->flash('success', "New category created successfully");

            return redirect('/category/list');
        }
    }

    public function edit($id)
    {
        // to get the single category details
        $category = $this->categoryService->edit($id);

        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $req)
    {
        // to update single category details
        $category = $this->categoryService->update($req);

        if($category)
        {
            session()->flash('success', "Category updated successfully");

            return redirect('/category/list');
        }
    }

    public function delete(Request $req)
    {
        // to delete the single category and add it to the trash
        $category = $this->categoryService->delete($req);

        if($category)
        {
            session()->flash('success', "Category removed successfully");

            return redirect('/category/list');
        }
    }

    public function getTrash()
    {
        //  to get the category trash data
        $category = $this->categoryService->getTrash();

        return view('category.trash', compact('category'));
    }

    public function restore(Request $req)
    {
        // to restore the category by id
        $category = $this->categoryService->restore($req);

        if($category)
        {
            session()->flash('success', "category restore successfully");

            return redirect('/category/trash');
        }
    }


    public function deleteForever(Request $req)
    {
        // permanentraly delete the category by id
        $category = $this->categoryService->deleteForever($req);

        if($category)
        {
            session()->flash('success', "category removed successfully");

            return redirect('/category/trash');
        }
    }
}
