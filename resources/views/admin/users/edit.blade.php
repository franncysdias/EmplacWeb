@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Editar Cliente</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.create') }}" class="text-orange">Novo Cliente</a></li>
                    </ul>
                </nav>
            </div>
        </header>

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
                    <li class="nav_tabs_item">
                        <a href="#complementary" class="nav_tabs_item_link">Dados Complementares</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#vehicles" class="nav_tabs_item_link">Veículos</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#attachments" class="nav_tabs_item_link">Anexos</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#management" class="nav_tabs_item_link">Administrativo</a>
                    </li>

                </ul>

                <form class="app_form" action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="nav_tabs_content">
                        <div id="data">
                            <!--
                                                    Entrada Locatorio Locador
                                                    <div class="label_gc">
                                                    <span class="legend">Perfil:</span>
                                                    <label class="label">
                                                        <input type="checkbox" name="lessor"><span>Locatário</span>
                                                    </label>

                                                    <label class="label">
                                                        <input type="checkbox" name="lessee"><span>Locador</span>
                                                    </label>
                                                </div>
                                            -->

                            <label class="label">
                                <span class="legend">*Nome:</span>
                                <input type="text" name="name" placeholder="Nome Completo"
                                    value="{{ old('name') ?? $user->name }}" />
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Genero:</span>
                                    <select name="genre">
                                        <option value="male"
                                            {{ old('genre') == 'male' ? 'selected' : ($user->genre == 'male' ? 'selected' : '') }}>
                                            Masculino</option>
                                        <option value="female"
                                            {{ old('genre') == 'female' ? 'selected' : ($user->genre == 'female' ? 'selected' : '') }}>
                                            Feminino</option>
                                        <option value="other"
                                            {{ old('genre') == 'other' ? 'selected' : ($user->genre == 'other' ? 'selected' : '') }}>
                                            Outros</option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">*CPF:</span>
                                    <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                        value="{{ old('document') ?? $user->document }}" />
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*RG:</span>
                                    <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                        value="{{ old('document_secondary') ?? $user->document_secondary }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Órgão Expedidor:</span>
                                    <input type="text" name="document_secondary_complement" placeholder="Expedição"
                                        value="{{ old('document_secondary_complement') ?? $user->document_secondary_complement }}" />
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Data de Nascimento:</span>
                                    <input type="tel" name="date_of_birth" class="mask-date"
                                        placeholder="Data de Nascimento"
                                        value="{{ old('date_of_birth') ?? $user->date_of_birth }}}}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Foto</span>
                                    <input type="file" name="cover">
                                </label>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Endereço</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*CEP:</span>
                                            <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                                placeholder="Digite o CEP"
                                                value="{{ old('zipcode') ?? $user->zipcode }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street" placeholder="Endereço Completo"
                                            value="{{ old('street') ?? $user->street }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                value="{{ old('number') ?? $user->number }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                value="{{ old('complement') ?? $user->complement }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood" placeholder="Bairro"
                                            value="{{ old('neighborhood') ?? $user->neighborhood }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                value="{{ old('state') ?? $user->state }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                value="{{ old('city') ?? $user->city }}" />
                                        </label>
                                    </div>
                                </div>
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
                                                placeholder="Número do Telefonce com DDD"
                                                value="{{ old('cell') ?? $user->cell }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Residencial:</span>
                                            <input type="tel" name="telephone" class="mask-phone"
                                                placeholder="Número do Telefonce com DDD"
                                                value="{{ old('telephone') ?? $user->telephone }}" />
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
                                                value="{{ old('email') ?? $user->email }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso" value="" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="complementary" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Vincular Empresa</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none content_spouse">

                                    <label class="label">
                                        <select name="addCompany" class="select2" data-action="{{ route('admin.user.getDataCompany') }}">
                                            <option value="">Selecione uma empresa</option>
                                            @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->social_name }} ({{ $company->document_company }})</option>
                                            @endforeach
                                        </select>
                                    </label>

                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Empresa(s)</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                        <div class="companies_list">
                                            @if ($userCompanies)
                                            @foreach ($userCompanies as $company)
                                                <div class="companies_list_item mb-2">
                                                    <p style="text-align: right; margin: 0px;">
                                                        <a href="{{ route('admin.user.getDataCompany',['company' => $company->id])}}" class="text-orange icon-eraser" style="font-size: .8em;">Excluir</a>
                                                    </p>
                                                    <p><b>Razão Social:</b> {{ $company->social_name }}</p>
                                                    <p><b>Nome Fantasia:</b> {{ $company->alias_name }}</p>
                                                    <p><b>CNPJ:</b> {{ $company->document_company }} - <b>Inscrição
                                                        Estadual:</b> {{ $company->document_company_secondary }}
                                                    </p>
                                                    <p><b>Endereço:</b> {{ $company->street }}, {{ $company->number }}
                                                        {{ $company->complement }}</p>
                                                        <p><b>CEP:</b> {{ $company->zipcode }} <b>Bairro:</b>
                                                            {{ $company->neighborhood }} <b>Cidade/Estado: </b>
                                                            {{ $company->city }}/{{ $company->state }}</p>
                                                        </div>

                                            @endforeach

                                        @else
                                            <div class="no-content mb-2">Não foram encontrados registros!</div>
                                        @endif

                                        </div>

                                    <p class="text-right">
                                        <a href="{{ route('admin.companies.create') }}"
                                            class="btn btn-green icon-building-o">Cadastrar
                                            Nova Empresa</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="vehicles" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Veículos</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">

                                    <div class="companies_list">
                                        @if ($user->vehicles->count())
                                            @foreach ($user->vehicles()->get() as $vehicle)

                                                <div class="companies_list_item mb-2">
                                                    <p><b>Placa:</b> {{ $vehicle->board ?? 'Sem placa' }} - <b>Marca:</b>
                                                        {{ $vehicle->brand()->first()->name }} </p>
                                                    <p><b>Modelo:</b> {{ $vehicle->model()->first()->name }} -
                                                        <b>Tipo:</b> {{ $vehicle->type()->first()->name }}
                                                    </p>
                                                    <p><b>Chassi:</b> {{ $vehicle->chassis }}</p>
                                                    <p><b>Ano de Fabricação:</b> {{ $vehicle->year_manu }} - <b>Ano
                                                            Modelo:</b> {{ $vehicle->year_model }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="no-content mb-2">Não foram encontrados registros!</div>
                                        @endif
                                    </div>
                                    <ul>
                                        <li class="icon-car">{{ $user->vehicles->count() }} veículos</li>
                                    </ul>
                                    <p class="text-right">
                                        <a href="javascript:void(0)" class="btn btn-green icon-car-o">Cadastrar Novo
                                            Veículo</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="attachments" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Arquivos</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">

                                    <div class="companies_list">
                                        <div class="no-content mb-2">Não foram encontrados registros!</div>

                                        <div class="companies_list_item mb-2">
                                            <p><b>Razão Social:</b> UpInside Treinamentos LTDA</p>
                                            <p><b>Nome Fantasia:</b> UpInside Treinamentos</p>
                                            <p><b>CNPJ:</b> 12.3456.789/0001-12 - <b>Inscrição Estadual:</b>1231423421</p>
                                            <p><b>Endereço:</b> Rodovia Dr. Antônio Luiz de Moura Gonzaga, 3339 Bloco A Sala
                                                208</p>
                                            <p><b>CEP:</b> 88048-301 <b>Bairro:</b> Campeche <b>Cidade/Estado:</b>
                                                Florianópolis/SC</p>
                                        </div>
                                    </div>

                                    <p class="text-right">
                                        <a href="javascript:void(0)"
                                            class="btn btn-green btn-disabled icon-building-o">Cadastrar Novo Documento</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="management" class="d-none">
                            <div class="label_gc">
                                <span class="legend">Conceder:</span>
                                <label class="label">
                                    <input type="checkbox" name="admin" id="admin"
                                        {{ old('admin') == 'on' || old('admin') == true ? 'checked' : ($user->admin == true ? 'checked' : '') }}><span>Administrativo</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="manager"><span>Gerente</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="financial"><span>Financeiro</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="financial"><span>Financeiro</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="client"
                                        {{ old('client') == 'on' || old('client') == true ? 'checked' : ($user->client == true ? 'checked' : '') }}><span>Cliente</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="seller"><span>Vendedor(a)</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){
            $('select[name="addCompany"]').change(function(){
                var addCompany = $(this);
                $.post(addCompany.data('action'), {company: addCompany.val()}, function(){

                }, 'json');
            });
        });
    </script>
@endsection
