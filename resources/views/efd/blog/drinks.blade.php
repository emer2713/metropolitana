@extends('master')
@section('title', 'Más bebidas')

@section('content')
    <div class="row justify-content-center align-items-center " style="height: auto; margin-top: 80px;">


        <div class="col-12 justify-content-center align-items-center Height100" >

        @foreach($subclasificaciones as $year)
            <div id="items-drinks" data-object="{{ $year->slug }}" class="row items-drinks">
                <div class="col-12 justify-content-center align-items-center Height100 " style="padding: 0; margin-top: 2%; ">
                    
                    <p class="year">{{$year->name}} </p>

                </div>


            </div>
            <div id="{{$year->slug}}" class="row {{$year->slug}} listdrinks" style=" position: absolute; width: 55%; right: 12px; top:0; display:none;">

                <div class="col-12 justify-content-center align-items-center Height100" style="padding: 0; ">
                    <div class="row justify-content-center align-items-center " style="height: auto; ">
                        <div class="col-12 justify-content-center align-items-center Height100 card-panel shadow" style="padding: 0; ">
                            <p class="t-card shadow">{{$year->name}} </p>
                            @foreach ($cervezas as $filmografia)
                                @if ($filmografia->subclassification_id == $year->id)
                                    <div class="row justify-content-center align-items-center p-drinks">

                                        <div class="col-8 Height20" style="padding: 0;">
                                            <p style="text-align: left;">{{$filmografia->name}}</p>
                                        </div>
                                        <div class="col-4 Height20" style="padding: 0;">
                                            <p style="text-align: center;">${{$filmografia->price}}.00</p>
                                        </div>
                                    </div>
                                    <!--Modal-->
                                    <div class="modal fade " id="exampleModalCenter_{{$filmografia->sku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content modal_especificaciones shadow" style="height: 490px;">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                                    </button>

                                                </div>

                                                <div class="modal-body" style="max-height: 700px;">
                                                    <div id="content-body-modal" class="row justify-content-center align-items-center" style="height: 470px; padding:0 15px; width: 100%">

                                                        <div class="col-12 Height40" style="padding: 0;">
                                                            <div class="poste row"  type="button"  data-toggle="modal" data-target="#exampleModalCenter" style=" max-width: 100% !important;">

                                                                <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                                                    <img style="height: 100%;" class="Cerveza-B" src="{{ url('/media/'.$filmografia->getTypes->file_path.'/'.$filmografia->getTypes->file) }}">
                                                                </div>
                                                                <div class="col-12 Height10" style=" padding: 0;">
                                                                    <p style="text-align: center; color: black;">{{$filmografia->name}}</p>
                                                                </div>
                                                                <div class="col-12 Height30 Desc-beer" style=" padding: 0;">
                                                                    <div class="row justify-content-center align-items-center Height100 P-m" >
                                                                        {!!  html_entity_decode($filmografia->description, ENT_QUOTES | ENT_XML1, 'UTF-8')  !!}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12 justify-content-center align-items-center Height5" style="padding:0%;">
                                                            <div class="row justify-content-center align-items-center Height100">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">${{ $filmografia->price }}</h5>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 justify-content-center align-items-center" style="padding:0% 55px;">
                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>Estilo</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: right;">{{ $filmografia->style }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>Fermentación</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: right;">{{ $filmografia->fermentation }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>% de alcohol</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: right;">{{ $filmografia->alcohol }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-6 Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>ingrediente</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: right;">{{ $filmografia->malts }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding:0%;">
                                                            <div class="row justify-content-center align-items-center Height100">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar</h5>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 justify-content-center align-items-center Height25" style=" white-space: nowrap; padding:0%;">
                                                            <div class="row justify-content-center align-items-center Height20">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Acompañar con...</h5>
                                                            </div>
                                                            <div id="more-sould-modal" class="row justify-content-center align-items-center Height80" style="     overflow-x: auto;   display: block;     text-align: center;">
                                                                @foreach ($sugeridos as $filmografia0)
                                                                    @if ($filmografia0->beer_id == $filmografia->id)
                                                                        <div class="poste"  type="button"  data-toggle="modal" data-target="#exampleModalCenter_{{$filmografia0->sku}}" style="display: inline-block; background-color: {{$year->color}}">
                                                                            <div class="col-12 Height20" style="padding: 0;">
                                                                                <p style="text-align: center; color: #fff;">{{$filmografia0->name}}</p>
                                                                            </div>
                                                                            <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                                                                <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia/'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
                                                                            </div>
                                                                            <div class="col-12 Height20" style="padding: 0; text-align: center;">
                                                                                <img style="width: 100%; " src="{{ asset('media/imagenes/b.png') }}" >
                                                                            </div>
                                                                        </div>

                                                                        <!--Modal 2-->
                                                                        <div class="modal fade " id="exampleModalCenter_{{$filmografia0->sku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document" >
                                                                                <div class="modal-content modal_especificaciones shadow" style="height: 490px;">

                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                                                                        </button>

                                                                                    </div>

                                                                                    <div class="modal-body">
                                                                                        <div id="content-body-modal" class="row justify-content-center align-items-center" style="height: 470px; padding:0 15px; width: 100%">

                                                                                            <div class="col-12 Height40" style="padding: 0;">
                                                                                                <div class="poste row"  type="button"  data-toggle="modal" data-target="#exampleModalCenter" style=" max-width: 100% !important;">

                                                                                                    <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                                                                                        <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia/'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
                                                                                                    </div>
                                                                                                    <div class="col-12 Height10" style=" padding: 0;">
                                                                                                        <p style="text-align: center; color: black;">{{$filmografia0->name}}</p>
                                                                                                    </div>
                                                                                                    <div class="col-12 Height30 Desc-beer" style=" padding: 0;">
                                                                                                        <div class="row justify-content-center align-items-center Height100"s>
                                                                                                            {!!  html_entity_decode($filmografia0->description, ENT_QUOTES | ENT_XML1, 'UTF-8')  !!}
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-12 justify-content-center align-items-center Height5" style="padding:0%;">
                                                                                                <div class="row justify-content-center align-items-center Height100">
                                                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">${{ $filmografia->price }}</h5>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding:0%;">
                                                                                                <div class="row justify-content-center align-items-center Height100">
                                                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Agregar</h5>
                                                                                                </div>
                                                                                            </div>



                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
	$('.items-drinks').click(function(){
        
        if(!$(this).hasClass('activado-drinks'))
        {   
            var object = this.getAttribute('data-object');
            console.log(object);
            $('.items-drinks').removeClass('activado-drinks');
            $('.listdrinks').removeClass('display-drinks');
            $(this).addClass('activado-drinks');
            $('.' + object).addClass('display-drinks');
           
        }else{
            $('.items-drinks').removeClass('activado-drinks');
            $('.listdrinks').removeClass('display-drinks');
   
            
        }

    });


});
</script>


@endsection

