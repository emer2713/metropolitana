@extends('admin.master')
@section('title', 'Más Bebidas')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/drinks') }}">
            <i class="fas fa-glass-cheers"></i>
            Más Bebidas
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
                                    Agregar Bebida
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'drinks_add'))

                                {!! Form::open(['url' => '/admin/drink/add', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12 col-12">

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

                                            {!! Form::label('subclassification','Subclasificación:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-school"></i>

                                                    </span>
                                                </div>
                                                <select class="custom-select" id="subclassification" name="subclassification">
                                                    @foreach ($subclasificaciones as $key => $subclasifica)
                                                        <option id="{{ $subclasifica->id }}" name="{{ $subclasifica->id }}" value="{{ $subclasifica->id }}">{{ $subclasifica->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-12 col-12">

                                            {!! Form::label('alcohol','Alcohol:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-percent"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('alcohol', null, [ 'class' => 'form-control']) !!}
                                            </div>
    
                                        </div>

                                        <div class="col-md-12 col-12">

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
                            <i class="fas fa-cocktail"></i>
                            Bebidas
                        </h2>
                    </div>
                    <div class="inside" style="    max-height: 458px;     overflow: auto;">
                        <div class="row" style="padding: 16px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Subclasificación</td>
                                        <td>Alchol %</td>
                                        <td>Precio</td>
                                        <td>Estado</td>

                                        <td width="150"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drinks as $cat)
                                        <tr>
                                            <td>{{ $cat->name }}</td>
                                            <td>{{ $cat->getSubclassification->name }}</td>
                                            <td>{{ $cat->alcohol }}</td>
                                            <td>{{ $cat->price }}</td>
                                            <td>
                                                @if ($cat->status == 'published')
                                                    <i class="fas fa-globe-americas" style="color: green;"></i>
                                                @else
                                                    <i class="fas fa-globe-americas" style="color: red;"></i>
                                                @endif
                                            </td>

                                            
                                            <td>
                                                <div class="opts">
                                                    @if (kvfj(Auth::user()->permissions, 'drinks_edit' ))
                                                    @if ($new->deleted_at == null)
                                                        <a href="{{ url('/admin/drink/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                                    @if (kvfj(Auth::user()->permissions, 'drinks_delete'))
                                                        <a href="{{ url('/admin/drink/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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


