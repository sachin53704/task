<?php

namespace App\Services;
use App\Models\Category;


class CategoryService
{
    //  function to get category list
    public function list()
    {
        return Category::select('id', 'name')->get();
    }

    // function to store new category
    public function store($req)
    {
        $category = new Category;
        $category->name = $req->name;
        if($category->save())
        {
            return true;
        }
    }

    // function to get category data by id
    public function edit($id)
    {
        return Category::find($id);
    }

     // function to update category by id
    public function update($req)
    {
        $category = Category::find($req->id);
        $category->name = $req->name;
        if($category->save())
        {
            return true;
        }
    }

    // function to delete category by id
    public function delete($req)
    {
        $category = Category::find($req->id);

        if($category->delete())
        {
            return true;
        }
    }

    // function to get trash category
    public function getTrash()
    {
        return Category::onlyTrashed()
               ->select('id', 'name')
               ->get();
    }

    // function to restore category
    public function restore($req)
    {
        $category = Category::withTrashed()->find($req->id);

        if($category->restore())
        {
            return true;
        }
    }

    // function to remove category perma
    public function deleteForever($req)
    {
        Category::where('id', $req->id)->forceDelete();
        return true;
    }
}