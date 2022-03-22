@extends('admin.master')
@section('title', 'Editar Multimedia')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/multimedia') }}">
            <i class="far fa-folder-open"></i>
            Multimedia
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <div class="panel shadow">

                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-edit"></i>
                            Editar multimedia
                        </h2>
                    </div>

                    <div class="inside">

                        {!! Form::open(['url' => '/admin/multimedia/'.$cat->id.'/edit']) !!}

                        <div class="row" style="padding: 16px;">

                                <div class="col-md-12 ">

                                    {!! Form::label('name','Título:') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-keyboard"></i>
                                            </span>
                                        </div>
                                        {!! Form::text('name', $cat->name, [ 'class' => 'form-control']) !!}
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    {!! Form::label('file','Imagen:') !!}
                                    <div class="input-group">
                                        <div class="custom-file">
                                            {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                            <label class="custom-file-label" for="customFile">Choose File</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 mt16">

                                    {!! Form::label('year','Año:') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                {{ Form::select('year', $clasi, $cat->year_id, ['class'=>'form-control']) }}
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>

            <div class="col-md-3">

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

@stop


