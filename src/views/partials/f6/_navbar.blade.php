<div class="top-bar">
    <div class="top-bar-title">
    <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon dark" type="button" data-toggle></button>
    </span>
        <strong>{{ $sitename or "Laravel" }}</strong>
    </div>
    <div id="responsive-menu">
        <div class="top-bar-right">
            <ul class="menu">
                @if (\Auth::check())
                    <li><a>{{ \Auth::user()->name }}</a></li>
                @endif
                @yield('navigation')
            </ul>
        </div>
    </div>
</div>