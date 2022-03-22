@extends('admin.master')
@section('title', 'Alimentos')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/foods/all') }}">
            <i class="fas fa-hamburger"></i>
            Alimentos
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/foods/add/') }}">
            <i class="fas fa-plus"></i>
            Agregar alimento
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
                            Agregar alimento
                        </h2>
                    </div>
                    <div class="inside">

                        @if (kvfj(Auth::user()->permissions, 'foods_add'))

                            {!! Form::open(['url' => '/admin/food/add', 'files' => true]) !!}

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-5 col-12">

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
                                    <div class="col-md-12 mt16">

                                        {!! Form::label('file','Imagen:') !!}
                                        <div class="input-group">
                                            <div class="custom-file">
                                                {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                <label class="custom-file-label" for="customFile">escoge una imagen</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row" style="padding: 16px;">
                                    <div class="col-12">
                                        <div class="form-group">

                                            {{ Form::label('description','Descripcion:') }}
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
