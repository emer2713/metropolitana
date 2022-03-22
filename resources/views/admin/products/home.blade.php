@extends('admin.master')
@section('title', 'Productos')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products') }}">
            <i class="fas fa-boxes"></i>
            Productos
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
                                    Agregar Producto
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'products_add'))

                                {!! Form::open(['url' => '/admin/product/add']) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12">

                                            {!! Form::label('sku','Sku:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-barcode"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('sku', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>                                    

                                    </div>

                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                                {!! Form::close() !!}

                            @endif

                        </div>

                        <div class="col-md-12">
                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda', 'required', 'id' => 'productoproducto']) !!}
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-8">

                <div class="container-fluid">
                    <div class="panel shadow">

                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-boxes"></i>
                                Productos
                            </h2>
                        </div>

                        <div class="inside" style="overflow: auto; max-height: 410px;">
                            <div class="row" style="padding: 16px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td width="240">Nombre Mx</td>
                                            <td>Sku</td>
                                            <td>Estado</td>
                                            <td width="140"></td>
                                        </tr>
                                    </thead>
                                    <tbody  >
                                                      
                <div id="buscador_productoproducto" style="width: 100%;"></div>
                                        @foreach ($cats as $cat)
                                            <tr>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->sku_product }}</td>
                                                <td>
                                                    @if ($cat->status == '1')
                                                        <i class="fas fa-globe-americas" style="color: green;"></i>
                                                    @else
                                                        <i class="fas fa-globe-americas" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="opts">
                                                        @if (kvfj(Auth::user()->permissions, 'products_edit'))
                                                            <a href="{{ url('/admin/product/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                            </a>
                                                        @endif
                                                        @if (kvfj(Auth::user()->permissions, 'products_delete'))
                                                            <a href="{{ url('/admin/product/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
