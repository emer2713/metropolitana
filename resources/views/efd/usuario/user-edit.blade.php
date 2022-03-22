@extends('master')
@section('title', 'Editar Usuario')

@section('content')

    <div id="" class="row  Height100" style="padding-top: 5%;">

        <div class="col-md-12">
            <div class="row Height100">

                @if (Session::has('message'))
                <!--Alert errors-->
                    <div class="container" style="z-index: 99; position: fixed; top: 5%; height: 15%; width: 90%;">
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
                        </div>
                    </div>

                @endif

                <div class="col-md-4" style="padding: 0 7px 60px 17px;">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-user-astronaut"></i>
                                Editar avatar
                            </h2>
                        </div>
                        <div class="inside">
                            <div class="edit_avatar">
                            {!! Form::open(['url' => '/account/avatar/edit','id' => 'form_avatar_change', 'files' => true]) !!}
                                <a href="#" id="btn_avatar_edit" onclick="avatar()">
                                    <div class="overlay" id="avatar_change_overlay"><i class="fas fa-camera"></i></div>
                                    @if (is_null(Auth::user()->avatar))

                                        <img src="{{ asset('media/iconos/contacto.png') }}" alt="">

                                    @else

                                        <img src="{{ asset('multimedia/avatar/'.Auth::user()->id.'/'.Auth::user()->avatar ) }}" alt="">

                                    @endif
                                </a>
                                {!! Form::file('avatar', ['id' => 'input_file_avatar', 'accept' => 'image/*', 'class' => 'form-control']) !!}
                            {!! Form::close() !!}
                        </div>
                        </div>
                    </div>

                    <div class="panel shadow mt50">
                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-fingerprint"></i>
                                Cambiar contraseña
                            </h2>
                        </div>
                        <div class="inside">
                            {!! Form::open(['url' => '/account/password/edit']) !!}
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::label('apassword','Cotraseña actual:') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-keyboard"></i>
                                            </span>
                                        </div>
                                        {!! Form::password('apassword', [ 'class' => 'form-control']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row mt16">
                                <div class="col-md-12">

                                    {!! Form::label('password','Nueva contraseña:') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-keyboard"></i>
                                            </span>
                                        </div>
                                        {!! Form::password('password', [ 'class' => 'form-control']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row mt16">
                                <div class="col-md-12">

                                    {!! Form::label('cpassword','Repetir contraseña:') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-keyboard"></i>
                                            </span>
                                        </div>
                                        {!! Form::password('cpassword', [ 'class' => 'form-control']) !!}
                                    </div>

                                </div>

                            </div>
                            <div class="row mt16">
                                <div class="col-md-12">
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'style'=>'background-color: #707791; border-color: #707791;']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-address-card"></i>
                                Editar información
                            </h2>
                        </div>
                        <div class="inside">
                            {!! Form::open(['url' => '/account/info/edit']) !!}

                                <div class="row">
                                    <div class="col-md-4">

                                        {!! Form::label('name','Nombre:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('name', Auth::user()->name , [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        {!! Form::label('lastname','Apellidos:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('lastname', Auth::user()->lastname , [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        {!! Form::label('email','Correo:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('email', Auth::user()->email , [ 'class' => 'form-control', 'disabled']) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt16">
                                    <div class="col-md-4">

                                        {!! Form::label('phone','Teléfono:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-keyboard"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('phone', Auth::user()->phone , [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        {!! Form::label('phone','Genero:') !!}
                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    {{ Form::select('gender', ['0' => 'Sin especificar', '1' => 'Mujer', '2' => 'Hombre'], Auth::user()->gender , ['class'=>'form-control']) }}
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt16">
                                    <div class="col-md-12">
                                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'style'=>'background-color: #707791; border-color: #707791;']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
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
     <script>
        $('.alert').slideDown();
        setTimeout(function() {
            $('.alert').slideUp();
        }, 5000);
    </script>
    <script src="{{ asset('js/user.js') }}"></script>

@endsection
