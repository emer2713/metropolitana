@foreach ($extras as $proyecto)

<h4>{{ $proyecto->id }}</h4>
<p>{{ $proyecto->name }}</p>
<a href="{{ url('/multimedia/'.$proyecto->file_path.'/'.$proyecto->file) }}">Descargar Cotización</a>
@endforeach
