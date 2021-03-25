@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Filtro</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Contratos</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Filtro</a></li>
                </ul>
            </nav>

            <a href="dashboard.php?app=contracts/create" class="btn btn-orange icon-file-text ml-1">Criar Contrato</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.processes.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Veículo</th>
                        <th>Empresa</th>
                        <th>Vendedor</th>
                        <th>Serviço</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" class="text-orange">1</a></td>
                        <td><a href="" class="text-orange">Francys Dias</a></td>
                        <td><a href="" class="text-orange">NIM7733</a></td>
                        <td>Jelta Veículos</td>
                        <td>Rafael</td>
                        <td>Primeiro Emplacamento</td>
                    <td>{{ date('d/m/Y')}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
