<?php

namespace LaraDev\Http\Controllers\admin;

use Illuminate\Http\Request;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Http\Requests\Admin\VehicleType as VehicleTypeRequest;
use LaraDev\VehicleType;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = VehicleType::all();
        return view('admin.vehicles.types.index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicles.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleTypeRequest $request)
    {
        $createType = VehicleType::create($request->all());

        return redirect()->route('admin.types.edit', [
            'type' => $createType
        ])->with(['color' => 'green', 'message' => 'Tipo de veículo cadastrado com sucesso!']);
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
        $type = VehicleType::where('id', $id)->first();
        return view('admin.vehicles.types.edit', [
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleTypeRequest $request, $id)
    {
        $typesUpdate = VehicleType::where('id', $id)->first();
        $typesUpdate->fill($request->all());
        $typesUpdate->save();

        return redirect()->route('admin.types.edit', [
            'type' => $typesUpdate->id
        ])->with(['color' => 'green', 'message' => 'Tipo de veículo atualizado com sucesso!']);
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
