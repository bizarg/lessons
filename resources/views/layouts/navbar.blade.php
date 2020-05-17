<div class="navbar navbar-left">
  <!-- Left Side Of Navbar -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a href="{{ route('articles.index') }}">Articles</a>
    </li>
    @if(Auth::user())
      <li class="nav-item">
        <a href="{{ route('notifications.index') }}">Notifications <span
                  class="badge badge-info notify-counter">{{ Auth::user() ? Auth::user()->unreadNotifications()->count() : '' }}</span></a>
      </li>
    @endif
  </ul>

  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
      @endif
    @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    @endguest
  </ul>
</div>
