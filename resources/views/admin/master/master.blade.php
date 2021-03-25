<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/reset.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/libs.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/boot.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/style.css')) }}"/>
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/images/favicon.png')}}"/>

    @hasSection ('css')
        @yield('css')
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TerraSoft - Site Control</title>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"></div>

<div class="dash">
    <aside class="dash_sidebar">
        <article class="dash_sidebar_user">
            <img class="dash_sidebar_user_thumb" src="{{ url('backend/assets/images/avatar.jpg') }}" alt="" title=""/>

            <h1 class="dash_sidebar_user_name">
                <a href="">Francys Dias</a>
            </h1>
        </article>

        <ul class="dash_sidebar_nav">
            <li class="dash_sidebar_nav_item {{ isActive('admin.home') }}">
                <a class="icon-tachometer" href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.users') }} {{ isActive('admin.sellers') }} {{ isActive('admin.companies') }}"><a class="icon-users" href="{{ route('admin.users.index') }}">Clientes</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class="{{ isActive('admin.home.index') }}"><a href="{{ route('admin.users.index') }}">Ver Todos</a></li>
                    <li class="{{ isActive('admin.home.team') }}"><a href="{{ route('admin.users.team') }}">Funcionários</a></li>
                    <li class="{{ isActive('admin.companies.index') }}"><a href="{{ route('admin.companies.index') }}">Empresas</a></li>
                    <li class="{{ isActive('admin.sellers.index') }}"><a href="{{ route('admin.sellers.index') }}">Vendedores</a></li>
                    <li class="{{ isActive('admin.home.create') }}"><a href="{{ route('admin.users.create') }}">Novo Cliente</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.vehicles') }} {{ isActive('admin.brands') }} {{ isActive('admin.models') }} {{ isActive('admin.types') }}"><a class="icon-car" href="{{ route('admin.vehicles.index')}}">Veículos</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class="{{ isActive('admin.brands.index') }}"><a href="{{ route('admin.brands.index')}}">Marcas</a></li>
                    <li class="{{ isActive('admin.models.index') }}"><a href="{{ route('admin.models.index')}}">Modelos</a></li>
                    <li class="{{ isActive('admin.types.index') }}"><a href="{{ route('admin.types.index')}}">Tipos</a></li>
                    <li class="{{ isActive('admin.vehicles.create') }}"><a href="{{ route('admin.vehicles.create')}}">Novo Veículo</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.processes') }}"><a class="icon-file-text" href="{{ route('admin.processes.index') }}">Processos</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class="{{ isActive('admin.processes.index') }}"><a href="{{ route('admin.processes.index') }}">Ver Todos</a></li>
                    <li class="{{ isActive('admin.processes.create') }}"><a href="{{ route('admin.processes.create') }}">Criar Novo</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item"><a class="icon-print" href="#">Relatórios</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class=""><a href="#">Ver Todos</a></li>
                    <li class=""><a href="{{ route('admin.processes.create') }}">Criar Novo</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item"><a class="icon-reply" href="">Ver Site</a></li>
            <li class="dash_sidebar_nav_item"><a class="icon-sign-out on_mobile" href="{{ route('admin.logout') }}" target="_blank">Sair</a></li>
        </ul>

    </aside>

    <section class="dash_content">

        <div class="dash_userbar">
            <div class="dash_userbar_box">
                <div class="dash_userbar_box_content">
                    <span class="icon-align-justify icon-notext mobile_menu transition btn btn-green"></span>
                    <h1 class="transition">
                        <i class="text-red"><img src="{{url('backend/assets/images/icon.png')}}" width="18"></i><a href=""><b> TAURUS</b>.Serviços</a>
                    </h1>
                    <div class="dash_userbar_box_bar no_mobile">
                        <a class="text-red icon-sign-out" href="{{ route('admin.logout') }}">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dash_content_box">
            @yield('content')
        </div>
    </section>
</div>


<script src="{{ url(mix('backend/assets/js/jquery.js')) }}"></script>
<script src="{{ url('backend/assets/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url(mix('backend/assets/js/libs.js')) }}"></script>
<script src="{{ url(mix('backend/assets/js/scripts.js')) }}"></script>

@hasSection ('js')
    @yield('js')
@endif
</body>
</html>
