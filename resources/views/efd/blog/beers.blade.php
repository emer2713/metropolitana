@extends('master')
@section('title', 'Cervezas')

@section('content')
    <div id="Beers" class="row justify-content-center align-items-center " style="height: auto;">

        @if ($tp > 0)
            @foreach($subclasificaciones as $year)

                <div class="col-12" style="padding: 0; margin-top: 2%; height: 200px;">
                    <div class="row Height20 E-t" style="padding: 0; background: {{$year->color}};">
                        <span class="span">
                            <img src="{{ asset('media/imagenes/e.png') }}" alt="">
                        </span>
                        <p class="year">{{$year->name}} </p>
                    </div>
                    <div id="more-sould-modal" class="Height80 C-c" style=" overflow-x: auto;   display: inline-flex; width:100%;    text-align: center;">

                        @foreach ($cervezas as $filmografia)
                                @if ($filmografia->subclassification_id == $year->id)

                                    <div class="poste"  type="button"  data-toggle="modal" data-target="#exampleModalCenter_{{$filmografia->sku}}" style="background-color: {{$year->color}}">
                                        <div class="col-12 Height20" style="padding: 0;">
                                            <p style="text-align: center; color: #fff;">{{$filmografia->name}}</p>
                                        </div>
                                        <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                            <img style="height: 100%;" class="Cerveza-B" src="{{ url('/media/'.$filmografia->getTypes->file_path.'/'.$filmografia->getTypes->file) }}">
                                        </div>
                                        <div class="col-12 Height20" style="padding: 0; text-align: center;">
                                            <img style="width: 100%; height: 100%;" src="{{ asset('media/imagenes/b.png') }}" >
                                        </div>
                                    </div>

                                    <!--Modal-->
                                    <div class="modal fade " id="exampleModalCenter_{{$filmografia->sku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content modal_especificaciones shadow" style="height: 600px;">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                                    </button>

                                                </div>

                                                <div class="modal-body" style="max-height: 85%;">
                                                    <div id="content-body-modal" class="row justify-content-center align-items-center" style="height: 100%; padding:0 15px; width: 100%">

                                                        <div class="col-12 Height40" style="padding: 0;">
                                                            <div class="poste row"  type="button"  data-toggle="modal" data-target="#exampleModalCenter" style=" max-width: 100% !important;">

                                                                <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                                                    <img style="height: 100%;" class="Cerveza-B" src="{{ url('/media/'.$filmografia->getTypes->file_path.'/'.$filmografia->getTypes->file) }}">
                                                                </div>
                                                                <div class="col-12 Height10 mb-2" style=" padding: 0;">
                                                                    <p style="text-align: center; color: black;  font-size: calc(1rem + 1vw) !important;">{{$filmografia->name}}</p>
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

                                                        <div class="col-12 justify-content-center align-items-center" style="padding:0% 5px;">
                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-5  Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>Estilo</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: left; font-size: calc(0.4rem + 1vw);">{{ $filmografia->style }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-5  Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>Fermentación</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: left; font-size: calc(0.4rem + 1vw);">{{ $filmografia->fermentation }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-5  Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>% de alcohol</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: left; font-size: calc(0.4rem + 1vw);">{{ $filmografia->alcohol }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-center align-items-center Height25">
                                                                <div class="col-5 Height100" style="padding:0%;">
                                                                    <div class="row  Height100">
                                                                        <p>ingrediente</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7  Height100" style="padding:0%;">
                                                                    <div class="row  Height100" style="display: flex;">
                                                                        <p style="width: 100%; text-align: left; font-size: calc(0.4rem + 1vw);">{{ $filmografia->malts }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>



                                                        <div class="col-lg-12 justify-content-center align-items-center Height30" style=" white-space: nowrap; padding:0%;">
                                                            <div class="row justify-content-center align-items-center Height20">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Acompañar con...</h5>
                                                            </div>
                                                            <div id="more-sould-modal" class="row justify-content-center align-items-center" style="     height: 85%;    overflow-x: auto;   display: block;     text-align: center;">
                                                                @foreach ($sugeridos as $filmografia0)
                                                                    @if ($filmografia->id == $filmografia0->beer_id)

                                                                        <div class="poste"  type="button"  data-toggle="modal" data-target="#exampleModalCenter_{{$filmografia0->sku}}_{{ $filmografia0->subclassification_id }}" style="display: inline-block; background-color: {{$year->color}}">
                                                                            <div class="col-12 Height20" style="padding: 0;">
                                                                                <p style="text-align: center; color: #fff;">{{$filmografia0->name}}</p>
                                                                            </div>
                                                                            <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                                                                <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
                                                                            </div>
                                                                            <div class="col-12 Height20" style="padding: 0; text-align: center;">
                                                                                <img style="width: 100%; " src="{{ asset('media/imagenes/b.png') }}" >
                                                                            </div>
                                                                        </div>

                                                                        <!--Modal 2-->
                                                                        <div class="modal fade " id="exampleModalCenter_{{$filmografia0->sku}}_{{ $filmografia0->subclassification_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document" >
                                                                                <div class="modal-content modal_especificaciones shadow" style="height: 455px !important;">

                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                                                                        </button>

                                                                                    </div>

                                                                                    <div class="modal-body" style="max-height: 400px;">
                                                                                        <div id="content-body-modal" class="justify-content-center align-items-center" style=" padding:0 15px; width: 100%">

                                                                                            <div class="col-12 Height80" style="padding: 0;">
                                                                                                <div class="poste row"  type="button"  data-toggle="modal" data-target="#exampleModalCenter" style=" max-width: 100% !important;">

                                                                                                    <div class="col-12 Height70" style=" padding: 0; text-align: center;">
                                                                                                        <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia/'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
                                                                                                    </div>
                                                                                                    <div class="col-12" style=" padding: 0;">
                                                                                                        <p style="text-align: center; color: black;  font-size: calc(1rem + 0.7vw); height: 100%;"">{{$filmografia0->name}}</p>
                                                                                                    </div>
                                                                                                    <div class="col-12 Desc-beer" style=" padding: 0;">
                                                                                                        <div class="row justify-content-center align-items-center Height100"s>
                                                                                                            {!!  html_entity_decode($filmografia0->description, ENT_QUOTES | ENT_XML1, 'UTF-8')  !!}
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-12 justify-content-center align-items-center Height20" style="padding:0%;">
                                                                                                <div class="row justify-content-center align-items-center Height100">
                                                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">${{ $filmografia->price }}</h5>
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

            @endforeach
        @endif

    </div>
@endsection

@section('scripts')



@endsection

