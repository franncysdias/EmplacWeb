<?php

namespace LaraDev\Http\Controllers\admin;

use Illuminate\Http\Request;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Http\Requests\Admin\VehicleModel as VehicleModelRequest;
use LaraDev\VehicleModel;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = VehicleModel::all();
        return view('admin.vehicles.models.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicles.models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleModelRequest $request)
    {
        $createModel = VehicleModel::create($request->all());

        return redirect()->route('admin.models.edit', [
            'model' => $createModel->id
        ])->with(['color' => 'green', 'message' => 'Modelo de veículo cadastrado com sucesso!']);
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
        $model = VehicleModel::where('id', $id)->first();
        return view('admin.vehicles.models.edit', [
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleModelRequest $request, $id)
    {
        $brandsUpdate = VehicleModel::where('id', $id)->first();
        $brandsUpdate->fill($request->all());
        $brandsUpdate->save();

        return redirect()->route('admin.brands.edit', [
            'brand' => $brandsUpdate->id
        ])->with(['color' => 'green', 'message' => 'Modelo de veículo atualizado com sucesso!']);
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
