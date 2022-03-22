@extends('master')
@section('title', 'Promociones')

@section('content')
    @if ($cp > 0)
    <div class="row justify-content-center align-items-center Height40 mt-1">
        <div class="col-md-8 col-12  justify-content-center align-items-center Height100" style="display: flex; padding: 0; ">
            @foreach ($principal as $filmografia )
                <img class="h-100 w-100"  src="{{ url('/multimedia/'.$filmografia->file_path.'/'.$filmografia->file) }}">
            @endforeach
        </div>
    </div>
    @endif

    <div class="row  Height60 mt-1" style="max-height: 60%;    overflow: auto;">

        @foreach ($promotions as $filmografia0 )
            <div class="col-md-3 col-6 justify-content-center align-items-center Height40" style="display: flex; padding: 0; ">
                <img class="h-100 w-100"  src="{{ url('/multimedia/'.$filmografia0->file_path.'/'.$filmografia0->file) }}">
            </div>
        @endforeach

    </div>
@endsection

@section('scripts')



@endsection

