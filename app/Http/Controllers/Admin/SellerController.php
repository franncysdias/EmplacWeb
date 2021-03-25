<?php

namespace LaraDev\Http\Controllers\admin;

use Illuminate\Http\Request;
use LaraDev\Company;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Http\Requests\Admin\Seller as SellerRequest;
use LaraDev\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();
        return view('admin.sellers.index', [
            'sellers' => $sellers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.sellers.create', [
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellerRequest $request)
    {
        $sellerCreate = Seller::create($request->all());

        return redirect()->route('admin.sellers.edit', [
            'users' => $sellerCreate->id,
        ])->with(['color' => 'green', 'message' => 'Vendedor(a) cadastrado com sucesso!']);

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
        $seller = Seller::where('id', $id)->first();
        $companies = Company::all();
        return view('admin.sellers.edit', [
            'seller' => $seller,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellerRequest $request, $id)
    {
        $sellerUpdate = Seller::where('id', $id)->first();
        $sellerUpdate->fill($request->all());
        $sellerUpdate->save();

        return redirect()->route('admin.sellers.edit', [
            'brand' => $sellerUpdate->id
        ])->with(['color' => 'green', 'message' => 'Vendedor(a) atualizada com sucesso!']);
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
