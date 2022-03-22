@extends('master')
@section('title', 'Alimentos')

@section('content')
<div id="Beers" class="row justify-content-center align-items-center " style="height: auto;">


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
                                    <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia'.$filmografia->file_path.'/'.$filmografia->file) }}">
                                </div>
                                <div class="col-12 Height20" style="padding: 0; text-align: center;">
                                    <img style="width: 100%; height: 100%;" src="{{ asset('media/imagenes/b.png') }}" >
                                </div>
                            </div>

                            <!--Modal-->
                            <div class="modal fade " id="exampleModalCenter_{{$filmografia->sku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                    <div class="modal-content modal_especificaciones shadow" style="height: 400px !important;">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                            </button>

                                        </div>

                                        <div class="modal-body" style="max-height: 90%;">
                                            <div id="content-body-modal" class="row justify-content-center align-items-center" style="height: 470px; padding:0 15px; width: 100%">

                                                <div class="col-12 Height90" style="padding: 0;">
                                                    <div class="poste row"  type="button"  data-toggle="modal" data-target="#exampleModalCenter" style=" max-width: 100% !important;">

                                                        <div class="col-12 Height60" style=" padding: 0; text-align: center;">
                                                            <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia/'.$filmografia->file_path.'/'.$filmografia->file) }}">
                                                        </div>
                                                        <div class="col-12 Height20" style=" padding: 0;">
                                                            <p style="text-align: center; color: black; font-size: calc(1rem + 0.7vw); height: 100%;">{{$filmografia->name}}</p>
                                                        </div>
                                                        <div class="col-12 Height20 Desc-beer" style=" padding: 0;">
                                                            <div class="row justify-content-center align-items-center Height100"s>
                                                                {!!  html_entity_decode($filmografia->description, ENT_QUOTES | ENT_XML1, 'UTF-8')  !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 justify-content-center align-items-center Height10" style="padding:0%;">
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

    @endforeach


</div>
@endsection

@section('scripts')



@endsection

