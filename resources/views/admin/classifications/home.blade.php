@extends('admin.master')
@section('title', 'Clasificaciones')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/classifications') }}">
            <i class="far fa-folder-open"></i>
            Clasificaciones
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">



            <div class="col-md-12" style="height: 490px;">
                <div class="container-fluid" style="height: 100%;">
                    <div class="panel shadow" style="height: 100%;">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-folder-open"></i>
                                Clasificaciones
                            </h2>
                        </div>

                        <div class="inside"style="height: 90%; overflow: auto;">
                            <div class="row" style="padding: 16px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Orden</td>
                                            <td>Color</td>
                                            <td>Estado</td>
                                            <td width="140"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clasi as $cat)
                                            <tr>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->orden }}</td>
                                                <td style="background: {{$cat->color}}"> </td>
                                                <td class=" text-center ">
                                                    @if ($cat->status == '1')
                                                        <i class="fas fa-globe-americas" style="color: green;"></i>
                                                    @else
                                                        <i class="fas fa-globe-americas" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="opts">
                                                        @if (kvfj(Auth::user()->permissions, 'classifications_edit'))
                                                            <a href="{{ url('/admin/classification/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                            </a>
                                                        @endif
                                                        @if (kvfj(Auth::user()->permissions, 'classifications_delete'))
                                                            <a href="{{ url('/admin/classification/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                                <i class="fas fa-trash-alt" style="color: red;"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@stop


