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
                    <li><a href="{{ route('admin.types.create')}}">Veículos</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.types.create')}}" class="btn btn-orange icon-car ml-1">Cadastrar Tipo</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.vehicles.types.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td><a href="{{ route('admin.types.edit', ['type' => $type->id]) }}"
                                    class="text-orange">{{ $type->name }}</a></td>
                            <td>{{ (($type->status) ? 'Ativo' : 'Inativo') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
