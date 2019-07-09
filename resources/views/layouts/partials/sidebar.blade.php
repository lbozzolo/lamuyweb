<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="{{ Request::is('usuarios*') ? 'active' : '' }} nav-item">
            <a href="{!! route('users.index') !!}" class="nav-link">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span >Usuarios</span>
            </a>
        </li>

        <li class="{{ Request::is('ediciones*') ? 'active' : '' }} nav-item">
            <a href="{!! route('editions.index') !!}" class="nav-link">
                <i class="mdi mdi-receipt menu-icon"></i>
                <span class="menu-title">Ediciones</span>
            </a>
        </li>

        <li class="{{ Request::is('avisos*') ? 'active' : '' }} nav-item">
            <a href="{!! route('advertisments.index') !!}" class="nav-link">
                <i class="mdi mdi-star menu-icon"></i>
                <span class="menu-title">Avisos</span>
            </a>
        </li>

        <li class="{{ Request::is('galería*') ? 'active' : '' }} nav-item">
            <a href="{!! route('galleries.index') !!}" class="nav-link">
                <i class="mdi mdi-image-album menu-icon"></i>
                <span class="menu-title">Galerías</span>
            </a>
        </li>

        {{--<li class="{{ Request::is('albums*') ? 'active' : '' }} nav-item">--}}
            {{--<a href="{!! route('albums.index') !!}" class="nav-link">--}}
                {{--<i class="mdi mdi-folder menu-icon"></i>--}}
                {{--<span class="menu-title">Albums</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        <li class="{{ Request::is('noticias*') ? 'active' : '' }} nav-item">
            <a href="{!! route('noticias.index') !!}" class="nav-link">
                <i class="mdi mdi-newspaper menu-icon"></i>
                <span class="menu-title">Noticias</span>
            </a>
        </li>

        <li class="{{ Request::is('imagenes*') ? 'active' : '' }} nav-item">
            <a href="{!! route('medias.index') !!}" class="nav-link">
                <i class="mdi mdi-image menu-icon"></i>
                <span class="menu-title">Media</span>
            </a>
        </li>

        <li class="{{ Request::is('categories') ? 'active' : '' }} nav-item">
            <a href="{!! route('categories.index') !!}" class="nav-link">
                <i class="mdi mdi-cloud-tags menu-icon"></i>
                <span class="menu-title">Categorias</span>
            </a>
        </li>

        <li class="{{ Request::is('sliders*') ? 'active' : '' }} nav-item">
            <a href="{!! route('sliders.index') !!}" class="nav-link">
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
                <span class="menu-title">Sliders</span>
            </a>
        </li>

    </ul>
</nav>