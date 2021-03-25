@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Editar Vendedor(a)</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Vendedores</a></li>
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

        @if (session()->exists('message'))
            @message(['color' => session()->get('color')])
            <p class="icon-asterisk">{{ session()->get('message') }}
                @endmessage
        @endif

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <form class="app_form" action="{{ route('admin.sellers.update', ['seller' => $seller->id]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $seller->id }}">
                    <div class="label_g2">

                        <label class="label">
                            <span class="legend">*Nome do vendedor(a):</span>
                            <input type="text" name="name" placeholder="Nome do vendedor(a)"
                                value="{{ old('name') ?? $seller->name }}" />
                        </label>

                        <label class="label">
                            <span class="legend">Empresa:</span>
                            <select name="company" class="select2">
                                <option value="" selected>Selecione um empresa...</option>
                                @foreach ($companies as $company)
                                    <option value="{{ old('company') ?? $company->id }}"
                                        {{ $company->id === $seller->company ? 'selected' : '' }}>
                                        {{ $company->social_name }} ({{ $company->document_company }})
                                    </option>
                                @endforeach
                            </select>
                        </label>

                    </div>

                    <div class="label_g2">
                        <label class="label">
                            <span class="legend">Telefone(Whatsapp):</span>
                            <input type="tel" name="telephone" class="mask-cell"
                                placeholder="Número do Telefonce com DDD"
                                value="{{ old('telephone') ?? $seller->telephone }}" />
                        </label>

                        <label class="label">
                            <span class="legend">Status:</span>
                            <select name="status" class="select2">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : ($seller->status == 1 ? 'selected' : '')}}>Ativo</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : ($seller->status == 0 ? 'selected' : '')}}>Inativo</option>
                            </select>
                        </label>
                    </div>


                    <div class="text-right">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Editar Vendedor(a)</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
