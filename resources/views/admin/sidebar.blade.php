<div class="sidebar shadow">

    <div class="section-top">
        <div class="logo">
            <a href="/">
                <img src="{{ url('media/imagenes/logo.png') }}" alt="" class="img-fluid">
            </a>
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="email">
                {{ Auth::user()->email }}
            </div>
        </div>
    </div>

    <div class="main" style="height: 100%; overflow: auto;" >
        <ul>
                @if (kvfj(Auth::user()->permissions, 'dashboard'))
                <li>
                    <a href="{{ url('/admin') }}" class="lk-dashboard">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'user_list'))
                <li>
                    <a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-users_edit lk-users_permissions">
                        <i class="fas fa-user-friends"></i>
                        Usuarios
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'classifications'))
                <li>
                    <a href="{{ url('/admin/classifications') }}" class="lk-classifications lk-classifications_add lk-classifications_edit lk-classifications_search">
                        <i class="fas fa-folder"></i>
                        Clasificaciones
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'subclassifications'))
                <li>
                    <a href="{{ url('/admin/subclassifications') }}" class="lk-subclassifications lk-subclassifications_add lk-subclassifications_edit lk-subclassifications_search">
                        <i class="fas fa-code-branch"></i>
                        Subclasificaciones
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'carousels'))
                <li>
                    <a href="{{ url('/admin/carousels') }}" class="lk-carousels lk-carousels_add lk-carousels_edit lk-carousels_search">
                        <i class="far fa-object-group"></i>
                        Carousel home
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'beers'))
                <li>
                    <a href="{{ url('admin/beers/all') }}" class="lk-beers lk-beers_add lk-beers_edit lk-beers_search lk-product_gallegy_add dropdown-item">
                        <i class="fas fa-beer"></i>
                        Cervezas

                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'foods'))
                <li>
                    <a href="{{ url('admin/foods/all') }}" class="lk-foods lk-foods_add lk-foods_edit lk-foods_search lk-product_gallegy_add dropdown-item">
                        <i class="fas fa-hamburger"></i>
                        Alimentos

                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'promotions'))
                <li>
                    <a href="{{ url('admin/promotions') }}" class="lk-promotions lk-promotions_add lk-promotions_edit lk-promotions_search lk-product_gallegy_add dropdown-item">
                        <i class="fas fa-tags"></i>
                         Paquetes

                     </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'drinks'))
                <li>
                    <a href="{{ url('admin/drinks') }}" class="lk-drinks lk-drinks_add lk-drinks_edit lk-drinks_search lk-product_gallegy_add dropdown-item">
                        <i class="fas fa-glass-cheers"></i>
                        Mas Bebidas

                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'multimedia_'))
                <li>
                    <a href="{{ url('/admin/multimedia') }}" class="lk-multimedia lk-multimedia_add lk-multimedia_edit lk-multimedia_search">
                        <i class="far fa-file-image"></i>
                        Multimedia
                    </a>
                </li>
                @endif
                
        </ul>
    </div>

</div>
