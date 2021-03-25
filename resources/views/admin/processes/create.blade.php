@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Novo Processo</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.processes.create') }}">Novo Processo</a></li>
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

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#dataProperty" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#vehicles" class="nav_tabs_item_link">Veículos</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#process_data" class="nav_tabs_item_link">Dados do Processo</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#attachments" class="nav_tabs_item_link">Anexos</a>
                    </li>
                </ul>

                <form class="app_form" action="{{ route('admin.users.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="nav_tabs_content">

                        <div class="label_gc">
                            <span class="legend">Pessoa:</span>
                            <label class="label">
                                <input type="checkbox" id="physics" checked><span>Física</span>
                            </label>

                            <label class="label">
                                <input type="checkbox" id="legal"><span>Jurídica</span>
                            </label>
                        </div>
                        <div id="dataProperty">
                            <label class="label">
                                <span class="legend">*Proprietário:</span>
                                <div id="peixe">
                                    <select name="owner" id="ownerSelected" class="select2"
                                        data-action="{{ route('admin.processes.getDataOwner') }}">
                                        <option value="">Selecione um cliente...</option>
                                        <option value="novo">Inserir novo cliente...</option>
                                        @foreach ($users as $owner)
                                            <option value="{{ $owner->id }}">{{ $owner->name }}
                                                ({{ $owner->document }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="meuDiv" hidden>
                                    <div class="label_g2">
                                        <input type="text" name="name" placeholder="Insira o nome"
                                            value="{{ old('document') }}" />
                                        <button type="button" id="cancel" class="btn">Cancelar</button>
                                    </div>
                                </div>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Genero:</span>
                                    <select name="genre">
                                        <option value="male" {{ old('genre') == 'male' ? 'selected' : '' }}>Masculino
                                        </option>
                                        <option value="female" {{ old('genre') == 'female' ? 'selected' : '' }}>Feminino
                                        </option>
                                        <option value="other" {{ old('genre') == 'other' ? 'selected' : '' }}>Outros
                                        </option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">*CPF:</span>
                                    <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                        value="{{ old('document') }}" />
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*RG:</span>
                                    <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                        value="{{ old('document_secondary') }}" />
                                </label>

                                <label class="label">
                                    <span class="legend">Órgão Expedidor:</span>
                                    <input type="text" name="document_secondary_complement" placeholder="Expedição"
                                        value="{{ old('document_secondary_complement') }}" />
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Data de Nascimento:</span>
                                    <input type="tel" name="date_of_birth" class="mask-date"
                                        placeholder="Data de Nascimento" value="{{ old('date_of_birth') }}" />
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
                                                placeholder="Digite o CEP" value="{{ old('zipcode') }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street" placeholder="Endereço Completo"
                                            value="{{ old('street') }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                value="{{ old('number') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                value="{{ old('complement') }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood" placeholder="Bairro"
                                            value="{{ old('neighborhood') }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                value="{{ old('state') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                value="{{ old('city') }}" />
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
                                                placeholder="Número do Telefonce com DDD" value="{{ old('cell') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Residencial:</span>
                                            <input type="tel" name="telephone" class="mask-phone"
                                                placeholder="Número do Telefonce com DDD"
                                                value="{{ old('telephone') }}" />
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
                                                value="{{ old('email') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso" value="" />
                                        </label>
                                    </div>
                                </div>

                                <p class="text-right">
                                    <a href="#vehicles" class="btn btn-green icon-car-o">Cadastrar Veículo</a>
                                </p>
                            </div>
                        </div>

                        <div id="dataCompany" hidden>

                            <label class="label">
                                <span class="legend">CNPJ:</span>
                                <input type="tel" name="document_company" class="mask-cnpj cnpj_search"
                                    placeholder="CNPJ da Empresa" value="{{ old('document_company') }}" />
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
                                        <input type="text" name="street" class="street" id="street"
                                            placeholder="Endereço Completo" value="{{ old('street') }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Número:</span>
                                            <input type="text" name="number" id="number" placeholder="Número do Endereço"
                                                value="{{ old('number') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" id="complement"
                                                placeholder="Completo (Opcional)" value="{{ old('complement') }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" id="neighborhood" class="neighborhood"
                                            placeholder="Bairro" value="{{ old('neighborhood') }}" />
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
                                                        placeholder="Número do Telefonce com DDD"
                                                        value="{{ old('cell') }}" />
                                                </label>

                                                <label class="label">
                                                    <span class="legend">Comercial:</span>
                                                    <input type="tel" name="telephone" class="mask-phone"
                                                        placeholder="Número do Telefonce com DDD"
                                                        value="{{ old('telephone') }}" />
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
                                                        value="{{ old('email') }}" />
                                                </label>

                                                <label class="label">
                                                    <span class="legend">Senha:</span>
                                                    <input type="password" name="password" placeholder="Senha de acesso"
                                                        value="" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="process_data" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Dados do Processo</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Tipo de Financiamento:</span>
                                            <select name="type_of_process" class="select">
                                                <option value="Leasing">Leasing</option>
                                                <option value="CDC">CDC</option>
                                                </option>
                                            </select>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Banco:</span>
                                            <select name="bank" class="select2">
                                                <option value="">Insira banco...</option>
                                                <option value="246">Banco ABC Brasil S.A.</option>
                                                <option value="748">Banco Cooperativo Sicredi S.A.</option>
                                                <option value="117">Advanced Cc Ltda</option>
                                                </option>
                                            </select>
                                        </label>

                                    </div>
                                    <div class="label_g4">
                                        <label class="label">
                                            <span class="legend">Vendedor:</span>
                                            <select name="bank" class="select2">
                                                <option value="">Informe o vendedor...</option>
                                                @foreach ($sellers as $seller)
                                                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                                @endforeach
                                                </option>
                                            </select>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Nota Fiscal:</span>
                                            <input type="text" class="mask-doc" name="spouse_document"
                                                placeholder="Insira a nota fiscal" value="" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Valor Total:</span>
                                            <input type="text" class="mask-doc" name="spouse_document" placeholder="0,00"
                                                value="" />
                                        </label>
                                        <label class="label">
                                            <span class="legend">Tipo de cortesia:</span>
                                            <select name="courtesy" class="select2">
                                                <option value="">Insira tipo de cortesia...</option>
                                                <option value="1">Sem Cortesia</option>
                                                <option value="2">Parcial</option>
                                                <option value="3">Total</option>
                                                </option>
                                            </select>
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Valor Recebido:</span>
                                            <input type="text" name="spouse_document_secondary" placeholder="0,00"
                                                value="" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Valor à Receber:</span>
                                            <input type="text" name="spouse_document_secondary_complement"
                                                placeholder="0,00" value="" />
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Valor Placa:</span>
                                            <input type="text" class="mask-doc" name="spouse_document" placeholder="0,00"
                                                value="" />
                                        </label>
                                        <label class="label">
                                            <span class="legend">Valor Serviço:</span>
                                            <input type="text" class="mask-doc" name="spouse_document" placeholder="0,00"
                                                value="" />
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Local:</span>
                                            <select name="company" class="select2"
                                                data-action="{{ route('admin.processes.getDataCompany') }}">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->social_name }}
                                                        ({{ $company->document_company }})</option>
                                                @endforeach
                                                </option>
                                            </select>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Observação:</span>
                                            <textarea cols=10 id="opiniao" rows="5" name="opiniao" maxlength="500"
                                                wrap="hard" placeholder="Coloque um observação..."></textarea>
                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div id="vehicles" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Veículos</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_tabs_content">
                                    <div id="dataVehicle">
                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Chassi:</span>
                                                <div id="gato" class="gato">
                                                    <select name="vehicle" id="vehicleSelected"
                                                        data-action="{{ route('admin.processes.getDataVehicle') }}"
                                                        class="select2">
                                                        <option value="">Placa (Chassi)</option>
                                                        <option value="novo">Inserir veículo novo...</option>
                                                        @foreach ($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->id }}"
                                                                {{ old('vehicle') == $vehicle->id ? 'selected' : '' }}>
                                                                {{ $vehicle->board }}
                                                                ({{ $vehicle->chassis }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="meuDiv2">
                                                    <div class="label_g2">
                                                        <input type="text" name="board" placeholder="Insira o chassi"
                                                            value="{{ old('chassis') }}" />
                                                        <button type="button" id="cancel2" class="btn">Cancelar</button>
                                                    </div>
                                                </div>
                                            </label>

                                            <label class="label">
                                                <span class="legend">Placa:</span>
                                                <input type="text" name="board" placeholder="PIA2I21" maxlength="7"
                                                    value="{{ old('board') }}" />
                                            </label>
                                        </div>
                                        <div class="label_g4">
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
                                                <select name="brand">
                                                    <option value="{{ old('brand') }}">Selecione uma marca...</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ $brand->id == old('brand') ? 'selected' : '' }}>
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </label>

                                            <label class="label">
                                                <span class="legend">Modelo:</span>
                                                <select name="model">
                                                    <option value="{{ old('model') }}">Selecione uma modelo...</option>
                                                    @foreach ($models as $model)
                                                        <option value="{{ $model->id }}"
                                                            {{ $model->id == old('model') ? 'selected' : '' }}>
                                                            {{ $model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </label>

                                            <label class="label">
                                                <span class="legend">Tipo:</span>
                                                <select name="type">
                                                    <option value="{{ old('type') }}">Selecione uma tipo...</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}"
                                                            {{ $type->id == old('type') ? 'selected' : '' }}>
                                                            {{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="attachments" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Arquivo anexo</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="companies_list">
                                        <div class="no-content mb-2">Não foram encontrados arquivos!</div>
                                    </div>

                                    <p class="text-right">
                                        <a href="javascript:void(0)"
                                            class="btn btn-green btn-disabled icon-building-o">Cadastrar Novo Documento</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-orange icon-eraser" type="reset">Limpar
                        </button>
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Processo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

