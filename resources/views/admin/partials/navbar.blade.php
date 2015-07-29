<ul class="nav navbar-nav">
  <li><a href="{{ url('/') }}">Student Home</a></li>
    @if (Auth::check())
        <li @if (Request::is('student/create*')) class="active" @endif>
          <a href="{{ url('/student/create') }}">Create student</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="{{ url('/auth/login') }}">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
      </ul>
    </li>
  @endif
</ul>
