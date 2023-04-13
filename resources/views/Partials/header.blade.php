<header>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <img src="{{asset('assets/img/logo/logo.png')}}" alt="">
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href={{ route('index') }}>Home</a></li>
                                            <li><a href={{ route('jobs.index') }}>Find a Job </a></li>
                                            <li><a href={{ route('about') }}>About</a></li>                                       
                                            <li><a href={{ route('contact') }}>Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    @guest
                                    <a href={{ route('register') }} class="btn head-btn1">Register</a>
                                    <a href={{ route('login') }} class="btn head-btn2">Login</a>
                                    @endguest
                                    
                                </div>
                                @auth
                                <div class = "row">
                                
                                    <a class="nav-link" href="{{ route('profile.view') }}">
                                    <span id="boot-icon" class="bi bi-person-circle" 
                                    style="font-size: 2rem; color: rgb(40, 57, 90);padding:0px;"></span>
                                  
                                    </a>
                                    <a  style="padding-top:18px;font-size:19px;color:rgb(40, 57, 90);" href="{{url('/signOut')}}">Sign out </a>

                                    </div> 
                                      @endauth
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>