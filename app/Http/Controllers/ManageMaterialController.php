<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManageMaterialService;
use App\Services\CategoryService;
use App\Services\MaterialService;
use App\Http\Requests\ManageMaterialRequest;
use Yajra\Datatables\Datatables;

class ManageMaterialController extends Controller
{
    protected $manageMaterialService;
    protected $categoryService;
    protected $materialService;

    public function __construct()
    {
        $this->manageMaterialService = new ManageMaterialService;

        $this->categoryService = new CategoryService;

        $this->materialService = new MaterialService;
    }

    public function list(Request $req)
    {
        if($req->ajax())
        {
            $manageMaterial = $this->manageMaterialService->list();

            return DataTables::of($manageMaterial)
                    ->addIndexColumn()
                    ->editColumn('current_balance', function ($data) {
                        return $data->opening_balance + $data->quantity;
                    })
                    ->toJson();
        }
        return view('manage-material.list');
    }

    public function add()
    {
        $category = $this->categoryService->list();

        $materials = $this->materialService->list();

        return view('manage-material.add', compact('category', 'materials'));
    }

    public function store(Request $req)
    {
        $manageMaterial = $this->manageMaterialService->store($req);

        if($manageMaterial)
        {
            session()->flash('success', "New inward-outward created successfully");

            return redirect('/manage-material/add');
        }
    }
}
