<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            @isset($menu_master)
                @foreach ($menu_master as $menu)
                    @if($menu->subMenu->isNotEmpty())  
                    <li class="dropdown {{ Request::is($menu->url.'/*') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="{{ $menu->icon ?? 'far fa-square' }}"></i>
                            <span>{{ $menu->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($menu->subMenu as $submenu)
                                <li class="{{ Request::is($submenu->url) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url($submenu->url) }}">
                                        <i class="{{ $submenu->icon ?? 'far fa-circle' }}"></i>
                                        <span>{{ $submenu->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                                           
                    @else
                        <!-- Menu tanpa dropdown -->
                        <li class="{{ Request::is($menu->url) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url($menu->url) }}">
                                <i class="{{ $menu->icon ?? 'far fa-square' }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endisset
        </ul>
    </aside>
</div>
