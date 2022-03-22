@extends('master')
@section('title', 'detalles de consulta')
@section('content')

    <div id="" class="row justify-content-center align-items-center Height100" style="    padding-top: 6%;">

        @if (Session::has('message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('typealert') }}" style="display: none;">
                    {{ Session::get('message') }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <script>
                        $('.alert').slideDown();
                        setTimeout(function() {
                            $('.alert').slideUp();
                        }, 3000);
                    </script>
                </div>
            </div>
        @endif

        <div id="detalle-car-m" class="col-12 justify-content-center align-items-center Height100" style="">
            <form method="post" action="{{ route('cart-finish') }}" style="height: 100%; width: 100%;" id="theForm">
                {{ csrf_field() }}
                <div class="row justify-content-center align-items-center Height20 P-f-m" style="padding: 0 58px 0 80px;">

                    <div class="col-md-8 col-12 Height30" style="margin-bottom: 10px; padding: 0;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-3 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('name','Nombre de proyecto:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <input tabindex="1" required name="name" type="text" value="" id="name" style="height: 100%; width: 100%; border: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                    <div id="d-m-n" class="col-md-4 col-12 Height30" style="padding: 0;">
                    </div>

                    <div class="col-md-8 col-12 Height30" style="padding: 0; margin-bottom: 10px;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-3 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%; width: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('house','Casa productora:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <input tabindex="1"  name="house" type="text" value="" id="house" style="height: 100%; width: 100%; border: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 Height30" style="padding: 0;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-3 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('Nombre:','Nombre:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <input tabindex="1" disabled name="Correo" type="text" value="{{  Auth::user()->name. " " .Auth::user()->lastname }}" " style="height: 100%; width: 100%; border: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-12 Height30" style="padding: 0; margin-bottom: 10px;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-2 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%; width: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('loca','Locación:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <input tabindex="1"  name="loca" type="text" value="" id="loca" style="height: 100%; width: 100%; border: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 Height30" style="padding: 0;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-3 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('Correo:','Correo:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <input tabindex="1" disabled name="Correo" type="text" value="{{  Auth::user()->email }}" " style="height: 100%; width: 100%; border: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 Height30" style="padding: 0; margin-bottom: 10px;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-md-6 col-5 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%; width: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('date-init','Inicio de rodaje:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-7 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <div class="input-group date EFD-date">
                                    <input  name="date-init" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 Height30" style="padding: 0; margin-bottom: 10px;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-md-6 col-5  Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%; width: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('date-finish','Fin de rodaje:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-7  Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <div class="input-group date EFD-date">
                                    <input required name="date-finish" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 Height30" style="padding: 0;">
                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                            <div class="col-3 Height100" style="margin-bottom: 10px; padding: 0;">
                                <div class="input-group" style="height: 100%;">
                                    <div class="input-group-prepend" style="height: 100%; width: 100%;">
                                        <span class="input-group-text dp-wth" style="width: 100%;">
                                            {!! Form::label('Telefono:','Telefono:', ['class' => 'pd-cot', 'style' => 'width: 100%; font-size: 0.9rem;']) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 Height100" style="margin-bottom: 10px; padding: 0 20px 0 0;">
                                <input tabindex="1" disabled name="Telefono" type="text" value="{{  Auth::user()->phone }}" " style="height: 100%; width: 100%; border: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                </div>

                <div id="" class="row Height70 D-c-f" style="overflow: auto; margin-top: 60px; padding: 0 77px;" >


                    <div id="" class="row " style="overflow: auto; height: 80%;width: 100%;" >
                        <div  class="col-12  Height10" style="padding: 0;">
                            <div class="row  Height100" style="background-color: #c3cbe3;">
                                <div  class="col-6 justify-content-center align-items-center Height100" style="">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p style="font-size: 0.7rem; text-align: left; margin-bottom: 0 !important; width: 100%; font-family: 'Montserrat-Bold'; color: #000048;">PRODUCTO</p>
                                    </div>
                                </div>
                                <div  class="col-3 justify-content-center align-items-center Height100" style="">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p style="font-size: 0.7rem; font-family: 'Montserrat-Bold'; margin-bottom: 0 !important; color: #000048;">Cantidad</p>
                                    </div>
                                </div>
                                <div  class="col-3 justify-content-center align-items-center Height100" style="">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p style="font-size: 0.7rem; font-family: 'Montserrat-Bold'; color:  #000048; margin-bottom: 0 !important;">Días</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-12  CARRO_ D-m-fin" style="">
                            @foreach ($cart as $item)
                            <div class="row H-d-m" style="height: 8%;">

                                    <div  class="col-6  Height100" style="padding: 0;">
                                        <div class="row  justify-content-center align-items-center Height100" style="    color: #707791; font-size: 0.8rem;">
                                            @if (substr($item->sku, 0, 2) == "P-")
                                                @foreach ($names as $name)
                                                    @if ($item->id == $name->product_id)
                                                       <p>{{ $name->name }}</p>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if (substr($item->sku, 0, 2) == "K-")
                                               <p>{{ $item->name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div  class="col-3 justify-content-center align-items-center Height100" style="">
                                        <div class="row justify-content-center align-items-center  Height100">
                                            <p style="width: 100%; text-align: center; font-size: 0.8rem; margin-left: 35px;">{{ $item->day }}</p>

                                        </div>
                                    </div>
                                    <div  class="col-3 justify-content-center align-items-center Height100" style="">
                                        <div class="row justify-content-center align-items-center  Height100">
                                            <p style="width: 100%; text-align: center; font-size: 0.8rem; margin-left: 5px;">{{ $item->quantity }}</p>

                                        </div>
                                    </div>

                            </div>
                            @endforeach
                        </div>


                    </div>

                </div>

                <div i="" class="row justify-content-center align-items-center Height5_2" style="position: fixed; bottom: 6%; width: 100%;">
                    <p>
                        <a href="{{ route('cart-show') }}" class="btn btn-primary" style="background-color: #707791; border-color: #707791;">
                            <i class="fa fa-chevron-circle-left"></i> Regresar
                        </a>

                        <input id="send" type="button" value="Enviar" class="btn btn-primary" style="background-color: #707791; border-color: #707791;">

                    </p>
                </div>

            </form>
        </div>

    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#intro").addClass("backgroud_1");
        });
    </script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/Mfinish.js') }}"></script>


@endsection
