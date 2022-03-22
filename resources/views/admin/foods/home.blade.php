@extends('admin.master')
@section('title', 'Alimentos')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/foods/all') }}">
            <i class="fas fa-hamburger"></i>
            Alimentos
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-hamburger"></i>
                    Alimentos
                </h2>
                <ul>


                    <li>
                        <a href="#">Filtrar <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li>
                                <a href="{{ url('/admin/foods/all') }}">
                                    <i class="fas fa-code-branch" style="color: black;"></i></i> Todas los Alimentos
                                </a>
                            </li>
                            @foreach ($subclasificaciones as $subclasificacion )
                                <li>
                                    <a href="{{ url('/admin/foods/'.$subclasificacion->id) }}">
                                        <i class="fas fa-code-branch" style="color: {{ $subclasificacion->color }}"></i> {{ $subclasificacion->name }}
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                    </li>
                    @if (kvfj(Auth::user()->permissions, 'foods_add'))
                    <li>
                        <a href="{{ url('/admin/food/add') }}">
                            <i class="fas fa-plus"></i> Agregar alimento
                        </a>
                    </li>
                @endif

                </ul>
            </div>

            <div class="inside" style="max-height: 400px; overflow: auto;">

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
                            <td style="text-align: center;">Precio</td>

                            <td>Estado</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($foods as $new)
                            <tr>
                                <td style="text-align: center;"  width="65">
                                    <img src="{{ url('/multimedia'.$new->file_path.'/'.$new->file) }}" width="65">
                                </td>
                                <td style="text-align: center;">{{ $new->name }} </td>
                                <td style="text-align: center;">{{ $new->getSubclassification->name }}</td>
                                <td style="text-align: center;">{{ $new->price }} </td>

                                <td>
                                    @if ($new->status == 'published')
                                        <i class="fas fa-globe-americas" style="color: green;"></i>
                                    @else
                                        <i class="fas fa-globe-americas" style="color: red;"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <div class="opts">
                                        @if (kvfj(Auth::user()->permissions, 'foods_edit' ))
                                            @if ($new->deleted_at == null)
                                                <a href="{{ url('/admin/food/'.$new->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                </a>
                                            @endif
                                        @endif
                                        @if (kvfj(Auth::user()->permissions, 'foods_delete'))
                                            @if ($new->deleted_at == null)
                                                <a href="#" data-action="delete" data-path="/admin/food" data-object="{{ $new->id }}" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted">
                                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                                </a>
                                            @else
                                                <a href="#" data-action="restore" data-path="/admin/food" data-object="{{ $new->id }}" data-toggle="tooltip" data-placement="top" title="Restaurar newo" class="btn-deleted">
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


