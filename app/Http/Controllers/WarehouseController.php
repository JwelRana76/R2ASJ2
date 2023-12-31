<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Service\WarehouseService;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->baseService = new WarehouseService;
    }

    public function index()
    {
        $warehouse = $this->baseService->forDataTable();
        $columns = Warehouse::$columns;

        if (request()->ajax()) {
            return $warehouse;
        }

        return view('warehouse.index', compact('columns'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->create($data);
        return redirect()->route('backend.warehouse.index')->with('success', 'Warehouse Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Warehouse::find($id);
        $columns = Warehouse::$columns;
        return view('warehouse.index', compact('columns', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->baseService->delete($id);
        return redirect()->route('backend.warehouse.index')->with('success', 'Warehouse Deleted Successfully');
    }
}
