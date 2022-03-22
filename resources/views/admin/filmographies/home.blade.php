@extends('admin.master')
@section('title', 'Multimedia')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/multimedia') }}">
            <i class="far fa-file-image"></i>
            Multimedia
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
                                    Agregar multimedia
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'multimedia_add'))

                                {!! Form::open(['url' => '/admin/multimedia/add', 'files' => true]) !!}

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
                                                        <select class="custom-select" id="year" name="year">
                                                            @foreach ($clasi as $key => $estado)
                                                                <option id="{{ $estado->id }}" name="{{ $estado->id }}" value="{{ $estado->id }}">{{ $estado->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
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

            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="panel shadow">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-file-image"></i>
                                Multimedia
                            </h2>
                        </div>

                        <div class="inside" style="max-height: 400px; overflow: auto;">
                            <div class="row" style="padding: 16px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td width="70">Imagen</td>
                                            <td>Nombre</td>
                                            <td>Año</td>
                                            <td width="140"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cats as $cat)
                                            <tr>
                                                <td><img src="{{ url('/multimedia/'.$cat->file_path.'/t_'.$cat->file) }}" class="img-fluid"></td>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->year->name }}</td>
                                                <td>
                                                    <div class="opts">
                                                        @if (kvfj(Auth::user()->permissions, 'multimedia_edit'))
                                                            <a href="{{ url('/admin/multimedia/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                            </a>
                                                        @endif
                                                        @if (kvfj(Auth::user()->permissions, 'multimedia_delete'))
                                                            <a href="{{ url('/admin/multimedia/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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


