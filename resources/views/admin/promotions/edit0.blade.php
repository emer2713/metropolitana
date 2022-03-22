@extends('admin.master')
@section('title', 'Editar Paquete')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/promotions') }}">
            <i class="far fa-folder-open"></i>
            Paquetes
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-9">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Editar Paquete
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'promotions_add'))

                                {!! Form::open(['url' => '/admin/promotion/edit/'.$cat->id, 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">


                                        <div class="col-md-6 col-12">

                                            {!! Form::label('name','Nombre:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {{  Form::text('name', $cat->name, [ 'class' => 'form-control'])  }}
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-12">

                                            {!! Form::label('file','Imagen:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-12">

                                            {!! Form::label('file_icon','Imagen de scroll en Home:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file_icon', ['class' => 'custom-file-input', 'id' => 'customFile_icon']) !!}
                                                    <label class="custom-file-label" for="customFile_icon">Choose File</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 col-12">

                                            {!! Form::label('price','Precio:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('price', $cat->price, [ 'class' => 'form-control']) !!}
                                            </div>
    
                                        </div>
                                        @if($principal == 0)
                                        <div class="col-md-4 col-12">

                                            {!! Form::label('principal ','Principal:') !!}
                                           
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-unsplash"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::select('principal', [ '0' => 'No', '1' => 'Si'],$cat->principal, ['class' => 'custom-select']) !!}

                                                </div>
                                            
                                        </div>
                                        @endif
                                        @if($cat->principal == '1')
                                        <div class="col-md-4 col-12">

                                            {!! Form::label('principal ','Principal:') !!}
                                           
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-unsplash"></i>
                                                        </span>
                                                    </div>
                                                    {!! Form::select('principal', [ '0' => 'No', '1' => 'Si'],$cat->principal, ['class' => 'custom-select']) !!}

                                                </div>
                                           
                                        </div>
                                        @endif

                                        <div class="col-md-4 col-12 ">

                                            {!! Form::label('status ','Estado:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </span>
                                                </div>
                                                {!! Form::select('status', [ 'draft' => 'Borrador', 'published' => 'Publicado'], $cat->status, ['class' => 'custom-select']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt16">
                                            <div class="form-group">
    
                                                {{ Form::label('description','Descripcion:') }}
                                                <div class="input-group-prepend">
                                                    {!! Form::textarea('description', $cat->description, ['class' => 'form-control Ckeditor', 'id' => 'ckeditor']) !!}
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
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">

                        <div class="container-fluid">
                            <div class="panel shadow">

                                <div class="header">
                                    <h2 class="title">
                                        <i class="far fa-image "></i>
                                        Imagen destacada
                                    </h2>
                                </div>
                                <div class="inside">
                                    <img src="{{ url('/multimedia/'.$cat->file_path.'/t_'.$cat->file) }}" class="img-fluid">
                                </div>

                            </div>
                        </div>

                    </div>
                
                </div>
            </div>
        </div>

    </div>

@stop


