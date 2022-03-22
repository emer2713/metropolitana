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

        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-boxes"></i>
                    Productos
                </h2>
                <ul>
                    @if (kvfj(Auth::user()->permissions, 'products_add'))
                        <li>
                            <a href="{{ url('/admin/product/add') }}">
                                <i class="fas fa-plus"></i> Agregar producto
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="#">Filtrar <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li>
                                <a href="{{ url('/admin/products/1') }}">
                                    <i class="fas fa-globe-americas" style="color: green;"></i> Públicados
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/products/0') }}">
                                    <i class="fas fa-globe-americas" style="color: blue;"></i> No públicados
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/products/trash') }}">
                                    <i class="fas fa-trash" style="color: red;"></i> Papelera
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/products/all') }}">
                                    <i class="fas fa-list-ul" style="color: orange;"></i> Todos
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" id="btn_search">
                            <i class="fas fa-search"></i> Buscar
                        </a>
                    </li>
                </ul>
            </div>

            <div class="inside">

                <div class="form_search" id="form_search">

                    <ul>
                        {!! Form::open(['url' => '/admin/product/search']) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda']) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::select('filter', ['0' => 'Nombre del prodcuto', '1' => 'Sku'], 0,['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::select('status',  ['0' => 'No públicados', '1' => 'Públicados'], 0,['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>



                        {!! Form::close() !!}
                    </ul>

                </div>

                <table class="table table-striped mt16">
                    <thead>
                        <tr>
                            <td style="text-align: center;">Imagen</td>
                            <td style="text-align: center;">Nombre</td>
                            <td style="text-align: center;">Categoria</td>
                            <td style="text-align: center;">Precio</td>
                            <td style="text-align: center;">Sku</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td style="text-align: center;"  width="65">
                                    <a href="{{ url('/multimedia/'.$product->file_path.'/'.$product->file) }}" data-fancybox="gallery">
                                        <img src="{{ url('/multimedia/'.$product->file_path.'/t_'.$product->file) }}" width="65">
                                    </a>
                                </td>
                                <td style="text-align: center;">{{ $product->name }} @if ($product->status == "0") <i class="fas fa-eraser" style="color: blue;" data-toggle="tooltip" data-placement="top" title="Sin publicar"></i>@endif</td>
                                <td style="text-align: center;">{{ $product->cat->name }}</td>
                                <td style="text-align: center;">{{ $product->price }}</td>
                                <td style="text-align: center;">{{ $product->sku }}</td>
                                <td style="text-align: center;">
                                    <div class="opts">
                                            @if (kvfj(Auth::user()->permissions, 'products_edit' ))
                                            @if ($product->deleted_at == null)
                                                <a href="{{ url('/admin/product/'.$product->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                </a>
                                            @endif
                                        @endif
                                        @if (kvfj(Auth::user()->permissions, 'products_delete'))
                                            @if ($product->deleted_at == null)
                                                <a href="#" data-action="delete" data-path="/admin/product" data-object="{{ $product->id }}" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted">
                                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                                </a>
                                            @else
                                                <a href="{{ url('/admin/product/'.$product->id.'/restore') }}" data-action="restore" data-path="/admin/product" data-object="{{ $product->id }}" data-toggle="tooltip" data-placement="top" title="Restaurar producto" class="btn-deleted">
                                                    <i class="fas fa-trash-restore" style="color: green;"></i>
                                                </a>
                                            @endif
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

@endsection
