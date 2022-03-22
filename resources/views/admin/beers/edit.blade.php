@extends('admin.master')
@section('title', 'Editar Cerveza')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/beers/all') }}">
            <i class="fas fa-beer"></i>
            Cervezas
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/beers/'.$product->id.'/add/') }}">
            <i class="fas fa-plus"></i>
            Editar cerveza {{ $product->name  }}
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
                            Editar cerveza
                        </h2>
                    </div>
                    <div class="inside">

                        @if (kvfj(Auth::user()->permissions, 'beers_add'))

                            {!! Form::open(['url' => '/admin/beer/'.$product->id.'/edit', 'files' => true]) !!}

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-6 col-12">

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

                                        {!! Form::label('type','Tipo de cerveza:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-holly-berry"></i>
                                                </span>
                                            </div>
                                            {{ Form::select('type', $types, $product->type_id, ['class'=>'form-control']) }}
                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-6 col-12">

                                        {!! Form::label('style','Estilo:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-percent"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('style', $product->style, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-3 col-12">

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

                                    <div class="col-md-3 col-12">

                                        {!! Form::label('alcohol','% de alcohol:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-percent"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('alcohol', $product->alcohol, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="padding: 16px;">

                                    <div class="col-md-4 col-12">

                                        {!! Form::label('malts','Maltas:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-seedling"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('malts', $product->malts, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-12">

                                        {!! Form::label('fermentation','Fermentación:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-industry"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('fermentation', $product->fermentation, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>
                                    <div class="col-md-4 ">

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

                                </div>
                                <div class="row" style="padding: 16px;">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            {{ Form::label('foods','Lo sugerido:') }}
                                            <div>
                                                <tr>

                                                    @foreach($dishes as  $brand)
                                                        <label class="container col-sm-3">{!! $brand->name !!}
                                                            <input type="checkbox" class="brand_id" id="brand_id" name="foods[]"
                                                            value="{{@(!empty($brand->id) ? $brand->id : "")}}"
                                                                @foreach($foods0 as $_sel0)
                                                                    {{($brand->id == $_sel0->food_id ? "checked='checked'": '')}}
                                                                @endforeach
                                                            />
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    @endforeach

                                                </tr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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


@section('scripts')


<script type="text/javascript">
    function check() {

      var testing = document.getElementsByClassName('check_box');
      for (int i=0; i< testing.length; i++) {
         console.log(testing[i].value);
      }
    }
  </script>
@endsection
