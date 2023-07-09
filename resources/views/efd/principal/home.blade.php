@extends('master')
@section('title', 'inicio')

@section('content')
    <div class="row justify-content-center align-items-center " style="height: auto;">

        <section id="Slider-H" data-index="Slider" class="col-12 justify-content-center align-items-center p-0">
            <div class="row justify-content-center align-items-center Height100" style="width: 100%" >
                <div id="carouselExampleIndicators" class="carousel slide Height100 w-100" data-ride="carousel">

                    <ol class="carousel-indicators">

                        @for($i = 0; $i < sizeof($carrousels); $i++)
                            @if($i == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                            @endif
                        @endfor

                    </ol>

                    <div class="carousel-inner Height100">

                        @for($i = 0; $i < sizeof($carrousels); $i++)
                            @if($i == 0)

                                <div class="carousel-item active Height100">

                                    <img src=" {{ url('/multimedia/'.$carrousels[$i]->file_path.'/'.$carrousels[$i]->file) }}" class="d-block w-100 Height100" alt="..." s>

                                </div>

                            @else
                                <div class="carousel-item Height100">

                                    <img src=" {{ url('/multimedia/'.$carrousels[$i]->file_path.'/'.$carrousels[$i]->file) }}" class="d-block w-100 Height100" alt="..." s>

                                </div>
                            @endif
                        @endfor

                    </div>

                </div>
            </div>
        </section>

        <section id="Promotions-H" class="col-12 justify-content-center align-items-center p-0">

            <div class="row justify-content-center align-items-center Height20" style="padding: 0; ">
                <p class="year">Promociones</p>
            </div>

            <div class="row justify-content-center align-items-center Height80" style="padding: 0; ">

                <div id="more-sould-modal" class="Height80 C-c justify-content-center " style=" overflow-x: auto;   display: inline-flex; width:100%;    text-align: center;     height: 100%;">

                    @foreach ($promotions as $filmografia)
                        <div class="Height100">

                            <div class="col-12 Height100" style=" padding: 0; text-align: center;">
                                <img style="height: 100%;" class="Cerveza-B" src="{{ url('/multimedia/'.$filmografia->file_path.'/'.$filmografia->file_icon) }}">
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>

        </section>
    </div>
@endsection

@section('scripts')



@endsection

