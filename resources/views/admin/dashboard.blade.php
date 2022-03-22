@extends('admin.master')
@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">
        @if (kvfj(Auth::user()->permissions, 'dashboard_small_stats'))
            <div class="panel shadow">

                <div class="header">
                    <h2 class="title">
                        <i class="fas fa-chart-bar"></i>
                        Estadísticas
                    </h2>
                </div>

            </div>

            <div class="row mt16">

                <div class="col-md-3 d-flex">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-users">
                                        Usuarios resgistrados
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $users }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="container-fluid ">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-globe">
                                        Subcategorias(escuelas y otros) listadas
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $subclasificaciones }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        @endif
    </div>

@endsection
