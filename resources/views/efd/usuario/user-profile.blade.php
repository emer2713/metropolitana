@extends('master')
@section('title', 'Perfil de Usuario')

@section('content')
    <div id="" class="row justify-content-center align-items-center Height100 P-mtop" style="padding-top: 6%; background-color:#70779129;">

        <div class="col-12 justify-content-center align-items-center Height10" style="padding: 0% 15%">
            <div class="row justify-content-center align-items-center Height100" >
                <div class="col-8 justify-content-left align-items-center Height100" style="padding: 0%">
                    <div class="row justify-content-left align-items-center Height100" >
                       <h3 class="Name-user">¡Hola  {{  Auth::user()->name }}!</h3>
                    </div>
                </div>
                <div class="col-4 justify-content-center align-items-center Height100" style="padding: 0%">
                    <div class="row justify-content-center align-items-center Height100" >
                        <a href="{{ route('user-edit', Auth::user()->id) }}">
                            <button class="btn btn-success" style="background-color: #707791; border-color: #707791;"> <i class="fas fa-edit" style="color: #fff;"></i> Editar Perfil</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 justify-content-center  Height90" style="padding: 1% 15%">

            <div class="row justify-content-center align-items-center Height10" >

                <div class="col-md-12 justify-content-left align-items-center Height100" style="padding: 0%">
                    <div class="row justify-content-left align-items-center Height100 User-cotizacion">
                        <h6 >Cotizaciones realizadas.</h6>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center Height90">

                <div class="col-md-12 justify-content-center  Height100" style="padding: 0%">
                    <div class="row justify-content-center  Height100 User-cotizacion-in" style="padding: 2px 30px 10px 30px;  overflow: auto;">

                        <div class="col-md-12 justify-content-center  Height100" style="padding: 0%; margin-top: 5px;">
                        @foreach ($proyectos as $proyecto)
                            @if ($proyecto->user_id == Auth::user()->id)
                                    <div class="row justify-content-center  Height10 User-cotizacion-in" style="padding: 0;">

                                        <div class="col-11  justify-content-left  Height100" style="padding: 0%">
                                            <div class="row justify-content-left  Height100 ">
                                            <p>{{ $proyecto->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-1 cjustify-content-center Height100" style="padding: 0%">
                                            <div class="row justify-content-center  Height100 ">
                                                <a target="_blank" href="{{ url('/multimedia/'.$proyecto->file_path.'/'.$proyecto->file) }}" class="us" data-toggle="tooltip" data-placement="top" title="Descargar">
                                                    <i class="fas fa-file-download" style="color: #707791;"></i>
                                                </a>
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
@stop


@section('scripts')
    <script>
        $(document).ready(function(){

            $("#intro").addClass("backgroud_1");
        });

    </script>


@endsection
