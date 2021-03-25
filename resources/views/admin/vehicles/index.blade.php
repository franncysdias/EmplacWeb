@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Filtro</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.brands.create')}}">Veículos</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.vehicles.create')}}" class="btn btn-orange icon-car ml-1">Cadastrar Veículo</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.vehicles.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Proprietário</th>
                        <th>Renavam</th>
                        <th>Chassi</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td><a href="{{ route('admin.vehicles.edit', ['vehicle' => $vehicle->id]) }}"
                                class="text-orange">{{ $vehicle->board ?? ''}}</a></td>
                                <td><a href="{{ route('admin.users.edit', ['vehicle' => $vehicle->user]) }}"
                                    class="text-orange">{{ ($vehicle->user()->first()->name ?? $vehicle->company()->first()->social_name) }}</a></td>
                            <td>{{$vehicle->renavam}}</td>
                            <td><a href="{{ route('admin.vehicles.edit', ['vehicle' => $vehicle->id]) }}"
                                class="text-orange">{{ $vehicle->chassis }}</td>
                            <td>{{$vehicle->brand()->first()->name}}</td>
                            <td>{{$vehicle->model()->first()->name}}</td>
                            <td>{{$vehicle->type()->first()->name}}</td>
                            <td>{{ (($vehicle->status) ? 'Ativo' : 'Inativo') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
