<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MaterialService;
use App\Http\Requests\MaterialRequest;
use DB;

class MaterialController extends Controller
{
    protected $materialService;

    public function __construct()
    {
        $this->materialService = new MaterialService;
    }

    public function list()
    {
        $materials = $this->materialService->list();

        return view('material.list', compact('materials'));
    }

    public function add()
    {
        return view('material.add');
    }

    public function store(MaterialRequest $req)
    {
        $material = $this->materialService->store($req);

        if($material)
        {
            session()->flash('success', "New material created successfully");

            return redirect('/material/list');
        }
    }

    public function edit($id)
    {
        $material = $this->materialService->edit($id);

        return view('material.edit', compact('material'));
    }

    public function update(materialRequest $req)
    {
        $material = $this->materialService->update($req);

        if($material)
        {
            session()->flash('success', "material updated successfully");

            return redirect('/material/list');
        }
    }

    public function delete(Request $req)
    {
        $material = $this->materialService->delete($req);

        if($material)
        {
            session()->flash('success', "material removed successfully");

            return redirect('/material/list');
        }
    }

    public function getTrash()
    {
        $materials = $this->materialService->getTrash();

        return view('material.trash', compact('materials'));
    }

    public function restore(Request $req)
    {
        $material = $this->materialService->restore($req);

        if($material)
        {
            session()->flash('success', "material restore successfully");

            return redirect('/material/trash');
        }
    }


    public function deleteForever(Request $req)
    {
        $material = $this->materialService->deleteForever($req);

        if($material)
        {
            session()->flash('success', "material removed successfully");

            return redirect('/material/trash');
        }
    }
}
