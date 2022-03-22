@extends('master')

@section('title', 'Verificación de email.')

@section('content')
    <div class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
        <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">
            <div  class="col-12  Height100 Box-m" style="">
                <div id="verification" class="box box_login shadow">

                    <div class="header">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/media/imagenes/logo.png') }}">
                        </a>
                    </div>

                    <div class="inside">

                        {!! Form::open(['url' => '/verification']) !!}

                            <label style="text-align: left !important; width: 100%;" for="code"style="margin-top: 10px;">Codigo de verificación:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                </div>
                                {!! Form::text('code', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            {!! Form::submit('Verificar mi email', ['class' => 'btn btn-info mt16']) !!}

                        {!! Form::close() !!}

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

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
