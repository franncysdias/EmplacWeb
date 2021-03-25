@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Cliente</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home')}}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.users.index')}}">Clientes</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.users.create')}}" class="text-orange">Novo Cliente</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="nav">

            @if($errors->all())
                @foreach ($errors->all() as $error)
                    @message(['color' => 'orange'])
                    <p class="icon-asterisk"> {{ $error }} </p>
                    @endmessage
                @endforeach
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

            <form class="app_form" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf

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
                            <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name')}}"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Genero:</span>
                                <select name="genre">
                                    <option value="male" {{ (old('genre') == 'male' ? 'selected' : '')}}>Masculino</option>
                                    <option value="female" {{ (old('genre') == 'female' ? 'selected' : '')}}>Feminino</option>
                                    <option value="other" {{ (old('genre') == 'other' ? 'selected' : '')}}>Outros</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">*CPF:</span>
                                <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                value="{{ old('document')}}"/>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*RG:</span>
                                <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                       value="{{ old('document_secondary')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Órgão Expedidor:</span>
                                <input type="text" name="document_secondary_complement" placeholder="Expedição"
                                       value="{{ old('document_secondary_complement')}}"/>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Data de Nascimento:</span>
                                <input type="tel" name="date_of_birth" class="mask-date"
                                       placeholder="Data de Nascimento" value="{{ old('date_of_birth')}}"/>
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
                                               placeholder="Digite o CEP" value="{{ old('zipcode')}}"/>
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Endereço:</span>
                                    <input type="text" name="street" class="street"
                                           placeholder="Endereço Completo" value="{{ old('street')}}"/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="number" placeholder="Número do Endereço"
                                               value="{{ old('number')}}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complement" placeholder="Completo (Opcional)"
                                               value="{{ old('complement')}}"/>
                                    </label>
                                </div>

                                <label class="label">
                                    <span class="legend">*Bairro:</span>
                                    <input type="text" name="neighborhood" class="neighborhood"
                                           placeholder="Bairro" value="{{ old('neighborhood')}}"/>
                                </label>

                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="state" class="state" placeholder="Estado"
                                               value="{{ old('state')}}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="city" class="city" placeholder="Cidade"
                                               value="{{ old('city')}}"/>
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
                                               placeholder="Número do Telefonce com DDD" value="{{ old('cell')}}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Residencial:</span>
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
                                        <span class="legend">E-mail:</span>
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

                    <div id="complementary" class="d-none">
                        <div class="app_collapse">
                            <div class="app_collapse_header collapse">
                                <h3>Vincular Empresa</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none content_spouse">

                                <label class="label">
                                    <select name="addCompany" class="select2" data-action="{{ route('admin.user.getDataCompany') }}" >
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
                                <h3>Empresa</h3>
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
                                    <a href="javascript:void(0)" class="btn btn-green btn-disabled icon-building-o">Cadastrar
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
                                <div id="vehicles">
                                    <div class="realty_list">
                                        <div class="realty_list_item mb-1">
                                            <div class="realty_list_item_actions_stats">
                                                <img src="assets/images/realty.jpeg" alt="">
                                                <ul>
                                                    <li>Venda: R$ 450.000,00</li>
                                                    <li>Aluguel: R$ 2.000,00</li>
                                                </ul>
                                            </div>

                                            <div class="realty_list_item_content">
                                                <h4>Casa Residencial - Campeche</h4>

                                                <div class="realty_list_item_card">
                                                    <div class="realty_list_item_card_image">
                                                        <span class="icon-realty-location"></span>
                                                    </div>
                                                    <div class="realty_list_item_card_content">
                                                        <sp an class="realty_list_item_description_title">Bairro:</sp>
                                                        <span class="realty_list_item_description_content">Campeche</span>
                                                    </div>
                                                </div>

                                                <div class="realty_list_item_card">
                                                    <div class="realty_list_item_card_image">
                                                        <span class="icon-realty-util-area"></span>
                                                    </div>
                                                    <div class="realty_list_item_card_content">
                                                        <span class="realty_list_item_description_title">Área Útil:</span>
                                                        <span class="realty_list_item_description_content">150m&sup2;</span>
                                                    </div>
                                                </div>

                                                <div class="realty_list_item_card">
                                                    <div class="realty_list_item_card_image">
                                                        <span class="icon-realty-bed"></span>
                                                    </div>
                                                    <div class="realty_list_item_card_content">
                                                        <span class="realty_list_item_description_title">Domitórios:</span>
                                                        <span class="realty_list_item_description_content">4 Quartos<br><span>Sendo 2 suítes</span></span>
                                                    </div>
                                                </div>

                                                <div class="realty_list_item_card">
                                                    <div class="realty_list_item_card_image">
                                                        <span class="icon-realty-garage"></span>
                                                    </div>
                                                    <div class="realty_list_item_card_content">
                                                        <span class="realty_list_item_description_title">Garagem:</span>
                                                        <span class="realty_list_item_description_content">4 Vagas<br><span>Sendo 2 cobertas</span></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="realty_list_item_actions">
                                                <ul>
                                                    <li class="icon-eye">1234 Visualizações</li>
                                                </ul>
                                                <div>
                                                    <a href="" class="btn btn-blue icon-eye">Visualizar Imóvel</a>
                                                    <a href="" class="btn btn-green icon-pencil-square-o">Editar
                                                        Imóvel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="no-content">Não foram encontrados registros!</div>
                                </div>
                            </div>
                        </div>

                        <div class="app_collapse mt-3">
                            <div class="app_collapse_header collapse">
                                <h3>Veículos</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">
                                <div id="vehicles">
                                    <div class="no-content">Não foram encontrados registros!</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="attachments" class="d-none">
                        <div class="app_collapse">
                            <div class="app_collapse_header collapse">
                                <h3>Empresa</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">

                                <div class="companies_list">
                                    <div class="no-content mb-2">Não foram encontrados registros!</div>

                                </div>

                                <p class="text-right">
                                    <a href="javascript:void(0)" class="btn btn-green btn-disabled icon-building-o">Cadastrar Novo Documento</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="management" class="d-none">
                        <div class="label_gc">
                            <span class="legend">Conceder:</span>
                            <label class="label">
                                <input type="checkbox" name="admin" {{ (old('admin') == '1' ? 'selected' : '')}}><span>Administrativo</span>
                            </label>

                            <label class="label">
                                <input type="checkbox" name="manager"><span>Gerente</span>
                            </label>

                            <label class="label">
                                <input type="checkbox" name="financial"><span>Financeiro</span>
                            </label>

                            <label class="label">
                                <input type="checkbox" name="client" {{ (old('client') == '1' ? 'selected' : '')}}><span>Cliente</span>
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
    $(function(){
        $('select[name="addCompany"]').change(function(){
            var addCompany = $(this);
            alert(addCompany.val());
        });
    });
</script>
@endsection
