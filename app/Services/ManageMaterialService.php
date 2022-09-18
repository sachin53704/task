<?php

namespace App\Services;
use App\Models\ManageMaterial;
use DB;


class ManageMaterialService
{
    //  function to get inward and outward list
    public function list()
    {
        return ManageMaterial::join('category', 'category.id', 'manage_materials.category_id')
               ->join('materials', 'materials.id', 'manage_materials.material_id')
               ->select('manage_materials.date', 'category.name as cat_name', 'materials.name as material_name', 'materials.opening_balance', DB::raw('sum(manage_materials.quantity) as quantity'))
               ->groupBy(['manage_materials.material_id', 'manage_materials.category_id']);
    }

    // function to store inward and outward
    public function store($req)
    {
        $manageMaterial = new ManageMaterial;
        $manageMaterial->category_id = $req->category_id;
        $manageMaterial->material_id = $req->material_id;
        $manageMaterial->date = date('Y-m-d', strtotime($req->date));
        $manageMaterial->quantity = $req->quantity;
        if($manageMaterial->save())
        {
            return true;
        }
    }
}