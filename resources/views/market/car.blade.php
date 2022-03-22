@extends('master')
@section('title', 'carro')
@section('content')

    <div id="" class="row  Height100 P-mtop"  style="    padding: 6% 10% 0 10%;">

        <div  class="col-12  Height90" style="">

            <div class="row justify-content-center align-items-center Height10">
                @if (Auth::check())

                    <h2 class="Product_Sho" style="text-align: left; width: 100%; text-transform: capitalize;" >Hola {{ Auth::user()->name }}</h2>

                @else

                    <h2 class="Product_Sho" style="text-align: left; width: 100%;">Hola</h2>

                @endif

            </div>

            @if (count($cart))

                <div id="" class="row " style="overflow: auto; height: 80%;" >
                    <div  class="col-12 " style="padding: 0; height: 8%;">
                        <div class="row  Height100 BOLD_" style="background-color: #c3cbe3; color: #fff;">
                            <div  class="col-6 justify-content-center align-items-center Height100" style="">
                                <div class="row justify-content-center align-items-center Height100">
                                    <p style="font-size: 0.7rem; text-align: left; width: 100%; margin: 0; font-family: 'Montserrat-Bold'; color: #000048;">PRODUCTO</p>
                                </div>
                            </div>
                            <div  class="col-2 justify-content-center align-items-center Height100" style="">
                                <div class="row justify-content-center align-items-center Height100">
                                    <p style="margin: 0;  font-family: 'Montserrat-Bold'; color: #000048;font-size: 0.7rem; ">Cantidad</p>
                                </div>
                            </div>
                            <div  class="col-2 justify-content-center align-items-center Height100" style="">
                                <div class="row justify-content-center align-items-center Height100">
                                    <p style="margin: 0; font-family: 'Montserrat-Bold'; color: #000048;font-size: 0.7rem;">Días</p>
                                </div>
                            </div>
                            <div  class="col-2 justify-content-center align-items-center Height100" style="">
                                <div class="row justify-content-center align-items-center Height100">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="col-12  CARRO_" style="">
                        @foreach ($cart as $item)
                        <div class="row  Height8 C-m-in">

                                <div  class="col-6  Height100" style="padding: 0;">
                                    <div class="row  Height100" style="color: #707791; font-size: 0.8rem;">
                                        @if (substr($item->sku, 0, 2) == "P-")
                                            @foreach ($names as $name)
                                                @if ($name->product_id == $item->id)
                                                   <p style="width: 100%;">{{ $name->name }}</p>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (substr($item->sku, 0, 2) == "K-")
                                            <p style="width: 100%;">{{ $item->name }}</p>
                                        @endif
                                    </div>
                                </div>


                                <div  class="col-2 justify-content-center align-items-center Height100  P-c-m" style="padding:0 6.5%;">
                                    <div class="row  justify-content-center align-items-center Height100">
                                        <input class="" type="number" value="{{ $item->day }}" min="1" max="1000" step="1" class="numb" />
                                    </div>
                                </div>
                                <div  class="col-2 justify-content-center align-items-center Height100 P-c-m" style="padding:0 6.5%;">
                                    <div class="row justify-content-center align-items-center  Height100">
                                        <input class="" type="number" value="{{ $item->quantity }}" min="1" max="1000" step="1" class="numb" />
                                    </div>
                                </div>
                                <div  class="col-2 justify-content-center align-items-center Height100  P-c-m " style="padding: 4px 0 0 0;">
                                    <div class="row justify-content-center align-items-center  Height100 Pd-m" >
                                        <a href="{{ route('cart-delete', $item->sku) }}" style="width: 100%;">

                                            <i class="far fa-trash-alt delete-m" style="font-size: 0.9rem; text-align: center; width: 100%;  right: 4px; position: relative;">

                                            </i>
                                        </a>

                                    </div>
                                </div>

                        </div>
                        @endforeach
                    </div>


                </div>

                <div i="" class="row justify-content-center align-items-center Height5_2">
                    <p>
                        <a href="{{ url('/') }}" class="btn btn-primary" style="background-color: #707791; border-color: #707791;">
                            <i class="fa fa-chevron-circle-left"></i> Continuar Navegando
                        </a>

                        <a href="{{ route('order-detail') }}" class="btn btn-primary" style="background-color: #707791; border-color: #707791;">
                            Finalizar <i class="fa fa-chevron-circle-right"></i>
                        </a>
                    </p>
                </div>
            @else
                <div class="row justify-content-center align-items-center Height85">
                    <h2 class="Product_Sho" style="text-align: center;">No hay productos agregados. </h2>
                </div>
            @endif


            <div id="" class="row justify-content-center align-items-center " style=" height: 5%; background: #fff;">
                <div class="col-lg-3 justify-content-center align-items-center Height100">
                    <div id="" class="row justify-content-center align-items-center Height100" style="background: ;">
                        <p class="T_C">Términos y Condiciones</p>
                    </div>
                </div>
                <div class="col-lg-9 justify-content-center align-items-center Height100">
                    <div id="" class="row justify-content-center align-items-center Height100" style="background: ;">

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
@section('scripts')




@endsection
