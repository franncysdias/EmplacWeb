<?php

namespace LaraDev\Http\Controllers\admin;

use LaraDev\Company;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Http\Requests\Admin\Vehicle as VehicleRequest;
use LaraDev\User;
use LaraDev\Vehicle;
use LaraDev\VehicleBrand;
use LaraDev\VehicleModel;
use LaraDev\VehicleType;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles.index', [
            'vehicles' => $vehicles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $companies = Company::all();
        $brands = VehicleBrand::all();
        $models = VehicleModel::all();
        $types = VehicleType::all();
        return view('admin.vehicles.create', [
            'users' => $users,
            'companies' => $companies,
            'brands' => $brands,
            'models' => $models,
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicleCreate = Vehicle::create($request->all());

        return redirect()->route('admin.vehicles.edit', [
            'vehicles' => $vehicleCreate->id
        ])->with(['color' => 'green', 'message' => 'Veículo cadastrado com sucesso!']);
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
        $users = User::all();
        $companies = Company::all();
        $brands = VehicleBrand::all();
        $models = VehicleModel::all();
        $types = VehicleType::all();
        $vehicle = Vehicle::where('id', $id)->first();
        return view('admin.vehicles.edit', [
            'vehicle' => $vehicle,
            'users' => $users,
            'companies' => $companies,
            'brands' => $brands,
            'models' => $models,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicleUpdate = Vehicle::where('id', $id)->first();
        $vehicleUpdate->fill($request->all());
        $vehicleUpdate->save();

        return redirect()->route('admin.vehicles.edit', [
            'vehicle' => $vehicleUpdate->id
        ])->with(['color' => 'green', 'message' => 'Veículo atualizado com sucesso!']);
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
