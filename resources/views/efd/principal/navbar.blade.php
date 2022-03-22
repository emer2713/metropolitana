<div class="col-12 nav justify-content-center align-items-center navbar">
    <div class="row justify-content-center align-items-center Height20" style="width: 100%; padding: 7px 8px 0 0;">

        <div  class="col-9 justify-content-center align-items-center Height100" >
            <div class="row justify-content-center align-items-center Height100">
            </div>
        </div>
        <div  class="col-1 justify-content-center align-items-center" style="display: none;">
            @if (count(session('cart')) != "0")
                <a id="truck" href="{{ route('cart-show') }}">
                    <i class="fas fa-truck I_m ico_bus"></i>
                </a>
                <div class="circle_item">
                    <p> {{ count(session('cart')) }}</p>
                </div>
            @else
                <a id="truck" href="{{ route('cart-show') }}">
                    <i class="fas fa-truck I_m ico_bus"></i>
                </a>
            @endif
        </div>
        <div  class="col-1 justify-content-center align-items-center">
        </div>
        @if(Auth::check())
        <div id="session"  class="col-1 justify-content-center align-items-center dropdown" style="list-style: none;">
            @include('efd.principal.sessionmob')
        </div>
        @endif
    </div>
    <div class="row justify-content-center align-items-center Height50">

        <a href="/">
            <div class="logo">

            </div>
        </a>
    </div>
    <div class="row  Height30">


        @foreach ($areas as $clasificacion )
            @if ($cartcoun == 1)
            <a  class="clasifications-menu" style="min-width: 100% !important;" href="{{ url('/'.$clasificacion->slug.'/'.$clasificacion->slug) }}">
                <div class="clasifications-menu-2 shadow" style="z-index: {{ $clasificacion->orden }};">

                    <p style="background-color: {{ $clasificacion->color }};">{{ $clasificacion->name }}</p>

                </div>
            </a>
            @endif
            @if ($cartcoun == 2)
            <a  class="clasifications-menu" style="min-width: 50% !important;" href="{{ url('/'.$clasificacion->slug.'/'.$clasificacion->slug) }}">
                <div class="clasifications-menu-2 shadow" style="z-index: {{ $clasificacion->orden }};">

                    <p style="background-color: {{ $clasificacion->color }};">{{ $clasificacion->name }}</p>

                </div>
            </a>
            @endif
            @if ($cartcoun == 3)
            <a  class="clasifications-menu" style="min-width: 33.33% !important;" href="{{ url('/'.$clasificacion->slug.'/'.$clasificacion->slug) }}">
                <div class="clasifications-menu-2 shadow" style="z-index: {{ $clasificacion->orden }};">

                    <p style="background-color: {{ $clasificacion->color }};">{{ $clasificacion->name }}</p>

                </div>
            </a>
            @endif

            @if ($cartcoun == 4)
            <a  class="clasifications-menu" href="{{ url('/'.$clasificacion->slug.'/'.$clasificacion->slug) }}">
                <div class="clasifications-menu-2 shadow" style="z-index: {{ $clasificacion->orden }};">

                    <p style="background-color: {{ $clasificacion->color }};">{{ $clasificacion->name }}</p>

                </div>
            </a>
            @endif

            @if ($cartcoun == 5)
            <a  class="clasifications-menu" style="min-width: 20% !important;" href="{{ url('/'.$clasificacion->slug.'/'.$clasificacion->slug) }}">
                <div class="clasifications-menu-2 shadow" style="z-index: {{ $clasificacion->orden }};">

                    <p style="background-color: {{ $clasificacion->color }};">{{ $clasificacion->name }}</p>

                </div>
            </a>
            @endif

        @endforeach

    </div>
</div>
