<?php

namespace App\Services;
use App\Models\Material;

class MaterialService
{
    //  function to get material list
    public function list()
    {
        return Material::select('id', 'name', 'opening_balance')->get();
    }

    // function to store new material
    public function store($req)
    {
        $material = new Material;
        $material->name = $req->name;
        $material->opening_balance = $req->opening_balance;
        if($material->save())
        {
            return true;
        }
    }

    // function to get material data by id
    public function edit($id)
    {
        return Material::find($id);
    }

     // function to update material by id
    public function update($req)
    {
        $material = Material::find($req->id);
        $material->name = $req->name;
        $material->opening_balance = $req->opening_balance;
        if($material->save())
        {
            return true;
        }
    }

    // function to delete material by id
    public function delete($req)
    {
        $material = Material::find($req->id);

        if($material->delete())
        {
            return true;
        }
    }

    // function to get trash material
    public function getTrash()
    {
        return Material::onlyTrashed()
               ->select('id', 'name', 'opening_balance')
               ->get();
    }

    // function to restore material
    public function restore($req)
    {
        $material = Material::withTrashed()->find($req->id);

        if($material->restore())
        {
            return true;
        }
    }

    // function to remove material perma
    public function deleteForever($req)
    {

        Material::where('id', $req->id)->forceDelete();
        return true;
    }
}