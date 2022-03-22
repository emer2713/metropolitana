@extends('admin.master')
@section('title', 'Editar Alimento')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/foods/all') }}">
            <i class="fas fa-food"></i>
            Alimentos
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/foods/'.$product->id.'/add/') }}">
            <i class="fas fa-plus"></i>
            Editar Alimento {{ $product->name  }}
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
                            Editar Alimento
                        </h2>
                    </div>
                    <div class="inside">

                        @if (kvfj(Auth::user()->permissions, 'foods_add'))

                            {!! Form::open(['url' => '/admin/food/'.$product->id.'/edit', 'files' => true]) !!}

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-4 col-12">

                                        {!! Form::label('name','Nombre:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-signature"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('name', $product->name, [ 'class' => 'form-control']) !!}
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
                                            {{ Form::select('subclassification', $subclasi, $product->subclassification_id, ['class'=>'form-control']) }}
                                        </div>

                                    </div>

                                    <div class="col-md-2 col-12">

                                        {!! Form::label('price','Precio:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('price', $product->price, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    
                                    <div class="col-md-2 ">

                                        {!! Form::label('status ','Estado:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-toggle-on"></i>
                                                </span>
                                            </div>
                                            {!! Form::select('status', [ 'draft' => 'Borrador', 'published' => 'Publicado'], $product->status, ['class' => 'custom-select']) !!}
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
                                <!--
                                <div class="row" style="padding: 16px;">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            {{ Form::label('beers','Lo sugerido:') }}
                                            @foreach ($dishes as $dish)
                                                <label >
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                {{ Form::checkbox('beers[]', $dish->id) }}
                                                            </span>
                                                        </div>
                                                        <img src="{{ url('/media/'.$dish->getTypes->file_path.'/'.$dish->getTypes->file) }}" width="65">
                                                        {{ $dish->name }}
                                                    </div>

                                                </label>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                -->
                                <div class="row" style="padding: 16px;">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            {{ Form::label('description','Descripcion 1:') }}
                                            <div class="input-group-prepend">
                                                {!! Form::textarea('description', $product->description, ['class' => 'form-control Ckeditor', 'id' => 'ckeditor']) !!}
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


