@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Nova Empresa</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.companies.index') }}">Empresas</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        @if ($errors->all())
            @foreach ($errors->all() as $error)
                @message(['color' => 'orange'])
                <p class="icon-asterisk"> {{ $error }} </p>
                @endmessage
            @endforeach
        @endif

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <form class="app_form" action="{{ route('admin.companies.store') }}" method="post">
                    @csrf

                    <label class="label">
                        <span class="legend">CNPJ:</span>
                        <input type="tel" name="document_company" class="mask-cnpj cnpj_search" placeholder="CNPJ da Empresa"
                            value="{{ old('document_company') }}" />
                    </label>

                    <label class="label">
                        <span class="legend">Nome Fantasia:</span>
                        <input type="text" name="alias_name" id="alias_name" placeholder="Nome Fantasia"
                            value="{{ old('alias_name') }}" />
                    </label>

                    <div class="label_g2">

                        <label class="label">
                            <span class="legend">*Razão Social:</span>
                            <input type="text" name="social_name" id="social_name" placeholder="Razão Social"
                                value="{{ old('social_name') }}" />
                        </label>

                        <label class="label">
                            <span class="legend">Inscrição Estadual:</span>
                            <input type="text" name="document_company_secondary" placeholder="Número da Inscrição"
                                value="{{ old('document_company_secondary') }}" />
                        </label>
                    </div>

                    <div class="app_collapse">
                        <div class="app_collapse_header mt-2 collapse">
                            <h3>Endereço</h3>
                            <span class="icon-minus-circle icon-notext"></span>
                        </div>

                        <div class="app_collapse_content">
                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*CEP:</span>
                                    <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                        placeholder="Digite o CEP" id="zipcode" value="{{ old('zipcode') }}" />
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Endereço:</span>
                                <input type="text" name="street" class="street" id="street" placeholder="Endereço Completo"
                                    value="{{ old('street') }}" />
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Número:</span>
                                    <input type="text" name="number" id="number" placeholder="Número do Endereço"
                                        value="{{ old('number') }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Complemento:</span>
                                    <input type="text" name="complement" id="complement" placeholder="Completo (Opcional)"
                                        value="{{ old('complement') }}" />
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Bairro:</span>
                                <input type="text" name="neighborhood" id="neighborhood" class="neighborhood" placeholder="Bairro"
                                    value="{{ old('neighborhood') }}" />
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Estado:</span>
                                    <input type="text" name="state" id="state" class="state" placeholder="Estado"
                                        value="{{ old('state') }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">*Cidade:</span>
                                    <input type="text" name="city" id="city" class="city" placeholder="Cidade"
                                        value="{{ old('city') }}" />
                                </label>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Contato</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Celular:</span>
                                            <input type="tel" name="cell" class="mask-cell"
                                                   placeholder="Número do Telefonce com DDD" value="{{ old('cell')}}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Comercial:</span>
                                            <input type="tel" name="telephone" class="mask-phone"
                                                   placeholder="Número do Telefonce com DDD" value="{{ old('telephone')}}"/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Acesso</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*E-mail:</span>
                                            <input type="email" name="email" placeholder="Melhor e-mail"
                                                   value="{{ old('email')}}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso"
                                                   value=""/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Empresa</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
