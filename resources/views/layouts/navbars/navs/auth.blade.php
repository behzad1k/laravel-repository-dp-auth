<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ $titlePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form d-flex my-4 my-lg-0">
        <div class="input-group no-border align-items-center">
        <input type="text" value="" class="form-control ml-2" placeholder="جستجو ..." style="border-radius: 12px; background-color: #eee">
        <button type="submit" class="btn btn-round btn-just-icon" style="background-color: #eee">
          <i class="material-icons" style="color: black;">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      <ul class="navbar-nav row">
        <!-- <li class="nav-item">
          <a class="nav-link nav-link-btn ml-2" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>
            <p class="d-lg-none d-md-block">
              {{ __('Stats') }}
            </p>
          </a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-btn ml-2" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification">5</span>
            <p class="d-lg-none d-md-block">
              {{ __('نوتیفیکیشن') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-left dropdown-menu-nav" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">{{ __('Mike John responded to your email') }}</a>
            <a class="dropdown-item" href="#">{{ __('You have 5 new tasks') }}</a>
            <a class="dropdown-item" href="#">{{ __('You\'re now friend with Andrew') }}</a>
            <a class="dropdown-item" href="#">{{ __('Another Notification') }}</a>
            <a class="dropdown-item" href="#">{{ __('Another One') }}</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-btn ml-2" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('اکانت من') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-left dropdown-menu-nav" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="#">{{ __('تنظیمات') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('خروج') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
