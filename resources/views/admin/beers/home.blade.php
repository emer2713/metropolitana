@extends('admin.master')
@section('title', 'Cervezas')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/beers/all') }}">
            <i class="fas fa-beer"></i>
            Cervezas
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-beer"></i>
                    Cervezas
                </h2>
                <ul>


                    <li>
                        <a href="#">Filtrar <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li>
                                <a href="{{ url('/admin/beers/all') }}">
                                    <i class="fas fa-code-branch" style="color: black;"></i></i> Todas las cervezas
                                </a>
                            </li>
                            @foreach ($subclasificaciones as $subclasificacion )
                                <li>
                                    <a href="{{ url('/admin/beers/'.$subclasificacion->id) }}">
                                        <i class="fas fa-code-branch" style="color: {{ $subclasificacion->color }}"></i> {{ $subclasificacion->name }}
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                    </li>
                    @if (kvfj(Auth::user()->permissions, 'beers_add'))
                    <li>
                        <a href="{{ url('/admin/beer/add') }}">
                            <i class="fas fa-plus"></i> Agregar cerveza
                        </a>
                    </li>
                @endif

                </ul>
            </div>

            <div class="inside" style="max-height: 500px; overflow: auto;">

                <div class="form_search" id="form_search">

                    <ul>

                    </ul>

                </div>

                <table class="table table-striped mt16">
                    <thead>
                        <tr>
                            <td style="text-align: center;">Imagen</td>
                            <td style="text-align: center;">Nombre</td>
                            <td style="text-align: center;">Escuela</td>
                            <td>Estado</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beers as $new)
                            <tr>
                                <td style="text-align: center;"  width="65">
                                    <img src="{{ url('/media/'.$new->getTypes->file_path.'/'.$new->getTypes->file) }}" width="65">
                                </td>
                                <td style="text-align: center;">{{ $new->name }} </td>
                                <td style="text-align: center;">{{ $new->getSubclassification->name }}</td>
                                <td>
                                    @if ($new->status == 'published')
                                        <i class="fas fa-globe-americas" style="color: green;"></i>
                                    @else
                                        <i class="fas fa-globe-americas" style="color: red;"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <div class="opts">
                                        @if (kvfj(Auth::user()->permissions, 'beers_edit' ))
                                            @if ($new->deleted_at == null)
                                                <a href="{{ url('/admin/beer/'.$new->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                </a>
                                            @endif
                                        @endif
                                        @if (kvfj(Auth::user()->permissions, 'beers_delete'))
                                            @if ($new->deleted_at == null)
                                                <a href="{{ url('admin/beer/'.$new->id.'/delete') }}" >
                                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                                </a>
                                            @else
                                                <a href="#" data-action="restore" data-path="/admin/beer" data-object="{{ $new->id }}" data-toggle="tooltip" data-placement="top" title="Restaurar newo" class="btn-deleted">
                                                    <i class="fas fa-trash-restore" style="color: green;"></i>
                                                </a>
                                            @endif
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
@stop


