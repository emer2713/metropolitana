@extends('admin.master')
@section('title', 'Cotizaciones')
@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/quotes') }}">
            <i class="fas fa-clipboard-list"></i>
            Cotizaciones
        </a>
    </li>

@endsection

@section('content')

<div class="container-fluid">
    <div class="panel shadow">

        <div class="header">
            <h2 class="title">
                <i class="fas fa-clipboard-list"></i>
                Cotizaciones
            </h2>
        </div>

        <div class="inside" style="max-height: 400px; overflow: auto;">

            <div class="row mt16">

                <div class="col-md-10">
                    <div class="" id="">

                        <ul>
                            {!! Form::open(['url' => '/admin/quotes/search']) !!}
                                 <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda', 'required']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::select('filter', ['0' => 'Nombre del consulta', '1' => 'Sku'], 0,['class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::select('status',  ['0' => 'No atendidas', '1' => 'Atendidas'], 0,['class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </ul>

                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="dropdown">
                        <button  style="width:100%" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-filter"  style="margin-right: 3px;"></i>Filtrar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ url('/admin/quotes/all') }}" class="dropdown-item"><i class="fas fa-stream"  style="margin-right: 3px;"></i>Atendidas</a>
                            <a href="{{ url('/admin/quotes/null') }}" class="dropdown-item"><i class="fas fa-unlink"  style="margin-right: 3px;"></i>No atendidas</a>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mt16">
                <thead>
                    <tr>
                        <td style="text-align: center;">Nombre</td>
                        <td style="text-align: center;">Sku</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotizaciones as $user)
                        <tr>

                            <td style="text-align: center;">{{ $user->name }}</td>
                            <td style="text-align: center;">{{ $user->sku }}</td>
                            <td style="text-align: center;">
                                <div class="opts">
                                    @if (kvfj(Auth::user()->permissions, 'quotes_download' ))
                                        <a href="{{ url('/multimedia/'.$user->file_path.'/'.$user->file) }}" class="us" data-toggle="tooltip" data-placement="top" title="Descargar">
                                            <i class="fas fa-file-download" style="color: #707791;"></i>
                                        </a>
                                    @endif
                                    @if (kvfj(Auth::user()->permissions, 'quotes_finish'))
                                        @if ($user->deleted_at == null)
                                            <a href="{{ url('/admin/quotes/'.$user->id.'/finalizar') }}" data-toggle="tooltip" data-placement="top" title="Confirmar">
                                                <i class="fas fa-clipboard-check" style="color: green;"></i>
                                            </a>
                                        @else

                                        @endif
                                    @endif


                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
</div>


@endsection
