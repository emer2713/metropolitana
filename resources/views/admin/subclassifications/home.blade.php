@extends('admin.master')
@section('title', 'Subclasificaciones')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/subclassifications') }}">
            <i class="far fa-folder-open"></i>
            Subclasificaciones
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-4">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Agregar subclasificación
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'subclassifications_add'))

                                {!! Form::open(['url' => '/admin/subclassification/add']) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12 ">

                                            {!! Form::label('name','Nombre:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt16">

                                            {!! Form::label('classification','Clasificación:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                <select class="custom-select" id="classification" name="classification">
                                                    @foreach ($clasi as $key => $estado)
                                                        <option id="{{ $estado->id }}" name="{{ $estado->id }}" value="{{ $estado->id }}">{{ $estado->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt16">

                                            {!! Form::label('color','Color:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {!! Form::color('color', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>
                                        <div class="col-md-12 ">

                                            {!! Form::label('orden','Orden:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('orden', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>
                                    </div>


                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                                {!! Form::close() !!}

                            @endif

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8" style="height: 490px;">
                <div class="container-fluid" style="height: 100%;">
                    <div class="panel shadow" style="height: 100%;">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-folder-open"></i>
                                Subclasificaciones
                            </h2>
                        </div>

                        <div class="inside"style="height: 90%; overflow: auto;">
                            <div class="row" style="padding: 16px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Clasificación</td>
                                            <td>Orden</td>
                                            <td>Estado</td>
                                            <td width="140"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cats as $cat)
                                            <tr>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->classification->name }}</td>
                                                <td>{{ $cat->orden }}</td>
                                                <td>
                                                    @if ($cat->status == '1')
                                                        <i class="fas fa-globe-americas" style="color: green;"></i>
                                                    @else
                                                        <i class="fas fa-globe-americas" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="opts">
                                                        @if (kvfj(Auth::user()->permissions, 'subclassifications_edit'))
                                                            <a href="{{ url('/admin/subclassification/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                            </a>
                                                        @endif
                                                        @if (kvfj(Auth::user()->permissions, 'subclassifications_delete'))
                                                            <a href="{{ url('/admin/subclassification/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                                <i class="fas fa-trash-alt" style="color: red;"></i>
                                                            </a>
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
                </div>
            </div>

        </div>

    </div>

@stop


