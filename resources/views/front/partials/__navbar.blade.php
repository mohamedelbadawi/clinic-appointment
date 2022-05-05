<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="index-2.html" class="navbar-brand logo">
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index-2.html" class="menu-logo">
                    <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li  class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'appointments.index' ? 'active' : '' }}">
                    <a href="{{route('appointments.index')}}">Appointments</a>
                </li>
               
                <li class="{{ Route::currentRouteName() == 'doctors' ? 'active' : '' }}">
                    <a href="{{route('doctors')}}">Doctors</a>
                </li>
               
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +1 315 369 5943</p>
                </div>
            </li>
            @guest

                <li class="nav-item">
                    <a class="nav-link header-login" href="{{route('login')}}">login / Signup </a>
                </li>
            @endguest
            @auth
            <li class="nav-item">
                <a class="nav-link header-login" href="{{route('appointments.index')}}">{{auth()->user()->name}}</a>
            </li>
            <form action="{{route('logout')}}" method="post">
                @csrf
            <button class="btn" type="submit">Logout</button>
            </form>
            @endauth


        </ul>
    </nav>
</header>
