@extends('admin.master')
@section('title', 'Editar clasificaciones')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/classifications') }}">
            <i class="far fa-folder-open"></i>
            Clasificaciones
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="container-fluid">
                    <div class="panel shadow">

                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-edit"></i>
                                Editar Clasificación
                            </h2>
                        </div>

                        <div class="inside">

                            {!! Form::open(['url' => '/admin/classification/'.$cat->id.'/edit']) !!}

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-4 mt-3 ">

                                        {!! Form::label('name','Nombre:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('name', $cat->name, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>
                                   
                                    <div class="col-2 mt-3 ">

                                        {!! Form::label('color','Color:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::color('color', $cat->color, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-2  mt-3">

                                        {!! Form::label('orden','Orden:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('orden', $cat->orden, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-4 mt-3">

                                        {!! Form::label('status ','Estado:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::select('status', [ '0' => 'Borrador', '1' => 'Publicado'], $cat->status, ['class' => 'custom-select']) !!}
                                        </div>
                                    </div>

                                </div>

                                {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                            {!! Form::close() !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@stop


