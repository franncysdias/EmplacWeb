@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Cadastrar Veículo</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.vehicles.index') }}">Veículos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Cadastrar Veículo</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @if ($errors->all())
            @foreach ($errors->all() as $error)
                @message(['color' => 'orange'])
                <p class="icon-asterisk"> {{ $error }} </p>
                @endmessage
            @endforeach
        @endif

        @include('admin.vehicles.filter')

        <div class="dash_content_app_box">

            <div class="nav">
                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados do Veículo</a>
                    </li>
                </ul>

                <form action="{{ route('admin.vehicles.store') }}" method="post" class="app_form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Proprietário:</span>
                                    <select name="property" class="select2">

                                        <option value="">Nome (CPF/CNPJ)</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user') == $user->id ? 'selected' : '' }}> {{ $user->name }} ({{ $user->document }})</option>
                                        @endforeach
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id + 10000000000 }}"
                                                {{ old('company') == $company->id ? 'selected' : '' }}> {{ $company->social_name }} ({{ $company->document_company }})</option>
                                        @endforeach
                                    </select>

                                </label>
                                <label class="label">
                                    <span class="legend">Chassi:</span>
                                    <input type="text" name="chassis" placeholder="9BG00000123456789" maxlength="17"
                                        value="{{ old('chassis') }}" />
                                </label>
                            </div>
                            <div class="label_g4">

                                <label class="label">
                                    <span class="legend">Placa:</span>
                                    <input type="text" name="board" placeholder="PIA2I21" maxlength="7"
                                        value="{{ old('board') }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Renavam:</span>
                                    <input type="text" name="renavam" placeholder="00012345678" maxlength="11"
                                        value="{{ old('renavam') }}" />
                                </label>
                                <label class="label">
                                    <span class="legend">Ano de Fabricação:</span>
                                    <input type="number" name="year_manu" placeholder="{{ date('Y') }}"
                                        min="{{ date('Y') - 100 }}" max="{{ date('Y') }}"
                                        value="{{ old('year_manu') }}" />
                                </label>
                                <label class="label">
                                    <span class="legend">Ano Modelo:</span>
                                    <input type="number" name="year_model" placeholder="{{ date('Y') }}"
                                        min="{{ date('Y') - 100 }}" max="{{ date('Y') }}"
                                        value="{{ old('year_model') }}" />
                                </label>

                            </div>
                            <div class="label_g4">
                                <label class="label">
                                    <span class="legend">Marca:</span>
                                    <select name="brand" class="select2">
                                        <option value="{{ old('brand') }}">Selecione uma marca...</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">Modelo:</span>
                                    <select name="model" class="select2">
                                        <option value="{{ old('model') }}">Selecione uma modelo...</option>
                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">Tipo:</span>
                                    <select name="type" class="select2">
                                        <option value="{{ old('type') }}">Selecione uma tipo...</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="label">
                                    <span class="legend">Status:</span>
                                    <select name="status" class="select2">
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativo</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Veículo</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
