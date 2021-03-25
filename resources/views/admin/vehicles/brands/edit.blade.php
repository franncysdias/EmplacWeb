@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Editar Marca</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.brands.index') }}">Veículos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Editar Marca</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.vehicles.brands.filter')

        <div class="dash_content_app_box">

            <div class="nav">
                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        @message(['color' => 'orange'])
                        <p class="icon-asterisk"> {{ $error }} </p>
                        @endmessage
                    @endforeach
                @endif

                @if (session()->exists('message'))
                    @message(['color' => session()->get('color')])
                    <p class="icon-asterisk">{{ session()->get('message') }}
                        @endmessage
                @endif

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                </ul>

                <form action="{{ route('admin.brands.update', ['brand' => $brand->id]) }}" method="post" class="app_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $brand->id }}">

                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">Nome:</span>
                                    <input type="text" name="name" placeholder="Nome da marca" value="{{ old('name') ?? $brand->name }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Status:</span>
                                    <select name="status" class="select2">
                                        <option value="1" {{ old('status') == '1' ? 'selected' : ($brand->status == 1 ? 'selected' : '')}}>Ativo</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : ($brand->status == 0 ? 'selected' : '')}}>Inativo</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Editar marca</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
