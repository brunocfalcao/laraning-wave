<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                Admin Features
            </li>
            @if(Route::has('terminal.index'))
            <li class="nav-item">
                <a href="{{ route('terminal.index') }}" class="nav-link" target="_new"><i class="icon-drop"></i> Terminal</a>
            </li>
            @endif
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-video-camera"></i> Videos</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wave.videos.index') }}"><i class="fa fa-cogs"></i> Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wave.videos_publish.create') }}"><i class="fa fa-cogs"></i> Publish</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-list-ul"></i> Series</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wave.series.index') }}"><i class="fa fa-cogs"></i> Manage</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
