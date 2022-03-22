@extends('admin.master')
@section('title', 'Paquetes')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/promotions') }}">
            <i class="fas fa-tags"></i>
            Paquetes
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-5">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Agregar Paquete
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'promotions_add'))

                                {!! Form::open(['url' => '/admin/promotion/add', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">



                                        <div class="col-12">

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

                                        <div class="col-12">

                                            {!! Form::label('file','Imagen:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">

                                            {!! Form::label('file_icon','Imagen de scroll en Home:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file_icon', ['class' => 'custom-file-input', 'id' => 'customFile_icon']) !!}
                                                    <label class="custom-file-label" for="customFile_icon">Choose File</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">

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

                                        <div class="col-12">

                                            {!! Form::label('principal ','Principal:') !!}
                                            @if($principal < 1)
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fab fa-unsplash"></i>

                                                        </span>
                                                    </div>
                                                    {!! Form::select('principal', [ '0' => 'No', '1' => 'Si'],'0', ['class' => 'custom-select']) !!}

                                                </div>
                                            @endif
                                        </div>
                                            <div class="col-12 mt16">
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

            <div class="col-md-7">
                <div class="panel shadow">

                    <div class="header">
                        <h2 class="title">
                            <i class="fab fa-uikit"></i>
                            Paquetes
                        </h2>
                    </div>
                    <div class="inside" style="    max-height: 458px;     overflow: auto;">
                        <div class="row" style="padding: 16px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Precio</td>
                                        <td>Estado</td>

                                        <td>Principal</td>
                                        <td width="150"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($principal as $cat0)
                                    <tr>
                                        <td>{{ $cat0->name }}</td>
                                        <td>{{ $cat0->price }}</td>
                                        <td>
                                            @if ($cat0->status == 'published')
                                                <i class="fas fa-globe-americas" style="color: green;"></i>
                                            @else
                                                <i class="fas fa-globe-americas" style="color: red;"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($cat0->principal == '1')
                                                <i class="fas fa-check" style="color: green;"></i>
                                            @else
                                                <i class="fas fa-times" style="color: red;"></i>
                                            @endif
                                        </td>



                                        <td>
                                            <div class="opts">

                                                    <a href="{{ url('/admin/promotion/edit/'.$cat0->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                    </a>


                                                @if (kvfj(Auth::user()->permissions, 'promotions_delete'))
                                                    <a href="{{ url('/admin/promotion/'.$cat0->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @foreach ($paquetes as $cat)
                                        <tr>
                                            <td>{{ $cat->name }}</td>
                                            <td>{{ $cat->price }}</td>
                                            <td>
                                                @if ($cat->status == 'published')
                                                    <i class="fas fa-globe-americas" style="color: green;"></i>
                                                @else
                                                    <i class="fas fa-globe-americas" style="color: red;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($cat->principal == '1')
                                                    <i class="fas fa-check" style="color: green;"></i>
                                                @else
                                                    <i class="fas fa-times" style="color: red;"></i>
                                                @endif
                                            </td>



                                            <td>
                                                <div class="opts">

                                                        <a href="{{ url('/admin/promotion/edit/'.$cat->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                        </a>


                                                    @if (kvfj(Auth::user()->permissions, 'promotions_delete'))
                                                        <a href="{{ url('/admin/promotion/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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

@stop


