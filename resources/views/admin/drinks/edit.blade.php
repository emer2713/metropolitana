@extends('admin.master')
@section('title', 'Editar Bébida')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/drinks') }}">
            <i class="fas fa-glass-cheers"></i>
            Bébidas
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/drink/'.$cat -> id.'/edit') }}">
            <i class="fas fa-cocktail"></i>
            {{ $cat->name }}
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Editar Bébida
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'drinks_edit'))

                                {!! Form::open(['url' => '/admin/drink/'.$cat->id.'/edit', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-3 col-12 ">

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

                                        <div class="col-md-5 col-12 ">

                                            {!! Form::label('name','Nombre:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('name', $cat->name, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>

                                        
                                     

                                        <div class="col-md-4 col-12">

                                            {!! Form::label('subclassification','Subclasificación:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-school"></i>
                                                    </span>
                                                </div>
                                                {{ Form::select('subclassification', $subclasi, $cat->subclassification_id, ['class'=>'form-control']) }}

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-12">

                                            {!! Form::label('alcohol','Alcohol:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-percent"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('alcohol', $cat->alcohol, [ 'class' => 'form-control']) !!}
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

                                 


                                        <div class="col-md-4 col-12">

                                            {!! Form::label('status','Estado:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </span>
                                                </div>
                                                {!! Form::select('status', [ 'draft' => 'Borrador', 'published' => 'Publicado'], $cat->status, ['class' => 'custom-select']) !!}

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

        

    </div>

@stop


