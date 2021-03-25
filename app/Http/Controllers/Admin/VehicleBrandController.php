<?php

namespace LaraDev\Http\Controllers\admin;

use Illuminate\Http\Request;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Http\Requests\Admin\VehicleBrand as VehicleBrandRequest;
use LaraDev\VehicleBrand;

class VehicleBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = VehicleBrand::all();
        return view('admin.vehicles.brands.index', [
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicles.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleBrandRequest $request)
    {
        $createBrand = VehicleBrand::create($request->all());

        return redirect()->route('admin.brands.edit', [
            'brand' => $createBrand->id
        ])->with(['color' => 'green', 'message' => 'Marca cadastrada com sucesso!']);
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
        $brand = VehicleBrand::where('id', $id)->first();
        return view('admin.vehicles.brands.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleBrandRequest $request, $id)
    {
        $brandsUpdate = VehicleBrand::where('id', $id)->first();
        $brandsUpdate->fill($request->all());
        $brandsUpdate->save();

        return redirect()->route('admin.brands.edit', [
            'brand' => $brandsUpdate->id
        ])->with(['color' => 'green', 'message' => 'Marca atualizada com sucesso!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
