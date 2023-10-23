@extends('master')
@section('title', 'Promociones')

@section('content')
    @if ($cp > 0)
    <div class="row justify-content-center align-items-center Height40 mt-1">
        <div class="col-md-8 col-12  justify-content-center align-items-center Height100" style="display: flex; padding: 0; ">
            @foreach ($principal as $filmografia )
                <img class="h-100 w-100"  src="{{ url('/multimedia/'.$filmografia->file_path.'/'.$filmografia->file) }}">
            @endforeach
        </div>
    </div>
    @endif

    <div class="row  justify-content-center  Height60 mt-1" style="max-height: 60%;    overflow: auto; padding: 10px;">

        @foreach ($promotions as $filmografia0 )
            <div class="poste d-flex justify-content-center w-100 h-100"  type="button"  data-toggle="modal" data-target="#exampleModalCenter_{{$filmografia0->sku}}" style="background-color: {{$year->color}}">

                <div class="col-md-3 col-6 justify-content-center align-items-center Height60" style="display: flex; padding: 0; ">
                    <img class="h-100 w-100"  src="{{ url('/multimedia/'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
                </div>

            </div>

            <!--Modal-->
            <div class="modal fade " id="exampleModalCenter_{{$filmografia0->sku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <div class="poste row "  type="button"  data-toggle="modal" data-target="#exampleModalCenter" style=" max-width: 100% !important;">

                                        <div class="col-12" style=" padding: 0; text-align: center; height: 250px;">
                                            <img style="height: 100%;  background-size: 100% auto;" class="Cerveza-B" src="{{ url('/multimedia/'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
                                        </div>
                                        <div class="col-12 Height20" style=" padding: 0; ">
                                            <p style="text-align: center; color: black; font-size: calc(1rem + 0.7vw); height: 100%;">{{$filmografia0->name}}</p>
                                        </div>
                                        <div class="col-12 Height20 Desc-beer" style=" padding: 0;">
                                            <div class="row justify-content-center align-items-center Height100"s>
                                                {!!  html_entity_decode($filmografia0->description, ENT_QUOTES | ENT_XML1, 'UTF-8')  !!}
                                            </div>
                                        </div>

                                        <div class="col-12 justify-content-center align-items-center Height10" style="padding:0%;">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">${{ $filmografia0->price }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('scripts')



@endsection

