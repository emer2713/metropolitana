@extends('admin.master')
@section('title', 'Editar producto')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products') }}">
            <i class="fas fa-boxes"></i>
            Productos
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/product/edit ') }}">
            <i class="far fa-folder-open"></i>
            Editar producto
        </a>
    </li>

@endsection

@section('content')


    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Editar Producto
                                </h2>
                            </div>
                        <div class="inside"  >


                                {!! Form::open(['url' => '/admin/product/'.$cat->id.'/edit']) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12">

                                            {!! Form::label('sku','Sku:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-barcode"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('sku', $cat->sku, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt16">

                                            {!! Form::label('status ','Estado:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            {!! Form::select('status', [ '0' => 'Borrador', '1' => 'Publicado'], $cat->status, ['class' => 'custom-select']) !!}
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
            </div>
            <div class="col-md-4">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Nombres de producto
                                </h2>
                            </div>
                            <div class="inside">
                                @foreach ($names as $name)
                                    <p>{{ $name->name }}</p>
                                    <a href="{{ url('name/delete/'.$name->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                    </a>
                                @endforeach
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt16">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Agregar nombre a producto
                                </h2>
                            </div>
                        <div class="inside">


                                {!! Form::open(['url' => 'product/name/'.$cat->id]) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12">

                                            {!! Form::label('name','Nombre:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-barcode"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt16">

                                            {!! Form::label('almacen ','Idioma:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            {!! Form::select('almacen', ['0' => 'USA',    '1' => 'Mx',  '2' => 'Col', '3' => 'Esp','4' => 'Ale'], 1, ['class' => 'custom-select']) !!}
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
            </div>
        </div>

    </div>

@stop

@section('scripts')

    <script src="{{ asset('/libs/ckeditor/ckeditor.js') }}"></script>

@endsection
