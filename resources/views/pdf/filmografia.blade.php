
<!doctype html>
<html lang="es"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/pdf.css">
        
       <title>Listado de filmografia</title>
</head><body>
<p class="EFD_Logo_pdf"></p>
<h1 class="page-header text-center">Listado de Films</h1>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Año</th>
            <th>Films</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>
                <ul>
                    @foreach ($filmografias as $filmografia)
                        @if ($filmografia->year_id == $product->id)

                            <li>{{$filmografia->name}}</li>

                        @endif
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body></html>