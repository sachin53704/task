<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Material;


class DashboardService
{
    //  function to get total category
    public function getTotalCategory()
    {
        return Category::count();
    }

    // function to get the total material
    public function getTotalMaterial()
    {
        return Material::count();
    }
}