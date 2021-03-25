<?php

namespace LaraDev\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaraDev\Company;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Http\Requests\Admin\User as UserRequest;
use LaraDev\Support\Cropper;
use LaraDev\User;
use LaraDev\UsersCompanies;
use LaraDev\VehicleBrand;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function team()
    {
        $users = User::where('admin', 1)->get();// Pegar todos os usuarios do banco de dados
        return view('admin.users.team', [
            'users' => $users
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
        return view('admin.users.create', [
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userCreate = User::create($request->all());

        if(!empty($request->file('cover'))){
            $userCreate->cover = $request->file('cover')->store('user');
            $userCreate->save();
        }

        return redirect()->route('admin.users.edit', [
            'users' => $userCreate->id
        ])->with(['color' => 'green', 'message' => 'Cliente cadastrado com sucesso!']);

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
        $user = User::where('id', $id)->first();
        $companies = Company::all();
        $userCompanies = $user->companies()->get();
        return view('admin.users.edit', [
            'user' => $user,
            'companies' => $companies,
            'userCompanies' => $userCompanies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->setAdminAttribute($request->admin);
        $user->setClientAttribute($request->client);

        if(!empty($request->file('cover'))){
            Storage::delete($user->cover);
            Cropper::flush($user->cover);
            $user->cover = '';
        }

        $user->fill($request->all());
        /*
        if($user->seller == "on"){
            $createType = VehicleType::create($request->all());
            var_dump('$createType');
        } else {
            var_dump('não é vendedor');
        }
        exit;
        */

        if(!empty($request->file('cover'))){
            $user->cover = $request->file('cover')->store('user');
        }

        if(!$user->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.users.edit', [
            'users' => $user->id
        ])->with(['color' => 'green', 'message' => 'Cliente atualizado com sucesso!']);

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

    public function getDataCompany(Request $request)
    {
        $companyAdd = UsersCompanies::where('user', $request->user()->id)->where('company', $request->company)->count();
        if($companyAdd == 0){
            $currentCompany = new UsersCompanies();
            $currentCompany->user = $request->user()->id;
            $currentCompany->company = $request->company;
            $currentCompany->save();
        } else {
            $currentCompany = null;
        }
        $json['company'] = $companyAdd;
        $json['count'] = $companyAdd;
        return response()->json($json);

    }
}
