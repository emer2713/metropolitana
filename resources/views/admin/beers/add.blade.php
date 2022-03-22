@extends('admin.master')
@section('title', 'Cervezas')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/beers/all') }}">
            <i class="fas fa-beer"></i>
            Cervezas
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/beers/add/') }}">
            <i class="fas fa-plus"></i>
            Agregar cerveza
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-plus"></i>
                            Agregar cerveza
                        </h2>
                    </div>
                    <div class="inside">

                        @if (kvfj(Auth::user()->permissions, 'beers_add'))

                            {!! Form::open(['url' => '/admin/beer/add', 'files' => true]) !!}

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-6 col-12">

                                        {!! Form::label('name','Nombre:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-signature"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-12">

                                        {!! Form::label('subclassification','Escuela:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-school"></i>
                                                </span>
                                            </div>
                                            <select class="custom-select" id="subclassification" name="subclassification">
                                                @foreach ($subclasificaciones as $key => $subclasificacion)
                                                    <option id="{{ $subclasificacion->id }}" name="{{ $subclasificacion->id }}" value="{{ $subclasificacion->id }}">{{ $subclasificacion->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-2 col-12">

                                        {!! Form::label('type','Tipo de cerveza:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-holly-berry"></i>
                                                </span>
                                            </div>
                                            <select class="custom-select" id="type" name="type">
                                                @foreach ($types as $type)
                                                    <option id="{{ $type->id }}" name="{{ $type->id }}" value="{{ $type->id }}" style="text-transform: capitalize;"><p style="margin:0; text-transform: capitalize !important;">{{ $type->name }}</p></option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-6 col-12">

                                        {!! Form::label('style','Estilo:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-percent"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('style', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-3 col-12">

                                        {!! Form::label('price','Precio:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('price', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-3 col-12">

                                        {!! Form::label('alcohol','% de alcohol:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-percent"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('alcohol', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-4 col-12">

                                        {!! Form::label('malts','Maltas:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-seedling"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('malts', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-12">

                                        {!! Form::label('fermentation','Fermentación:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-industry"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('fermentation', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="padding: 16px;">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            {{ Form::label('description','Descripcion 1:') }}
                                            <div class="input-group-prepend">
                                                {!! Form::textarea('description', null, ['class' => 'form-control Ckeditor', 'id' => 'ckeditor']) !!}
                                            </div>

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

    </div>

@stop


@section('scripts')



@endsection
