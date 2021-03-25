<?php

namespace LaraDev\Http\Controllers\admin;

use Illuminate\Http\Request;
use LaraDev\Company;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Seller;
use LaraDev\User;
use LaraDev\Vehicle;
use LaraDev\VehicleBrand;
use LaraDev\VehicleModel;
use LaraDev\VehicleType;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.processes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all();
        $nome = json_encode(User::all('document'));
        $companies = Company::all();
        $brands = VehicleBrand::all();
        $models = VehicleModel::all();
        $types = VehicleType::all();
        $vehicles = Vehicle::all();
        $sellers = Seller::all();//Pegar vendedores da loja do id do colaborador taurus

        return view('admin.processes.create', [
            'users' => $users,
            'companies' => $companies,
            'brands' => $brands,
            'models' => $models,
            'types' => $types,
            'nome' => $nome,
            'vehicles' => $vehicles,
            'sellers' => $sellers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function getDataOwner(Request $request)
    {
        $owner = User::where('id', $request->user)->first();

        if(empty($owner)){
            $owner = null;
        } else {
            $json['owner'] = $owner;
            return response()->json($json);
        }
    }

    public function getDataVehicle(Request $request)
    {
        $vehicle = Vehicle::where('id', $request->vehicle)->first();

        if(empty($vehicle)){
            $vehicle = null;
        } else {
            $json['vehicle'] = $vehicle;
            return response()->json($json);
        }
    }

    public function getDataCompanies(Request $request)
    {
        $companies = User::where('id', $request->vehicle)->first();
        if(empty($companies)){
            $companies = null;
        } else {
            $json['companies'] = $companies;
            return response()->json($json);
        }
    }
/*
    public function getDataSellers(Request $request)
    {
        $sellersCompany = Seller::where('id', $request->vehicle)->first();

        if(empty($sellersCompany)){
            $sellersCompany = null;
        } else {
            $json['sellersCompany'] = $sellersCompany;
            return response()->json($json);
        }
    } */
}
