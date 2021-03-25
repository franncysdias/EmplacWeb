@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.sellers.index') }}" class="text-orange">Vendedores</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.sellers.create') }}" class="btn btn-orange icon-building-o ml-1">Criar
                    Vendedor</a>
                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.sellers.filter')

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Empresa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $seller)
                            <tr>
                                <td><a href="{{ route('admin.sellers.edit', ['seller' => $seller->id]) }}"
                                        class="text-orange">{{ $seller->name }}</a></td>
                                <td>{{ $seller->telephone }}</td>
                                <td><a href="{{ route('admin.companies.edit', ['seller' => $seller]) }}"
                                        class="text-orange">{{ $seller->company()->first()->social_name }}</a></td>
                                <td>{{ $seller->status ? 'Ativo' : 'Inativo' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
