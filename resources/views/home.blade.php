@extends('layouts.index')

@section('content')

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
  
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-5">
                                <!-- form -->
                                
                                <form action="{{route('jobs.search')}}" method="post" class="search-box">
                               @csrf
                                    <div class="input-form" style="width:100%">
                                        <input type="text" placeholder="Job Tittle or keyword" name="search">
                                    </div>
                                    
                                    </div>
                                    <div class="search-form">
                                        <input type="submit" class="btn head-btn1" style="height:70px" value="Find a Job">
                                    </div>	
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>FEATURED TOURS Packages</span>
                            <h2>Browse Top Categories </h2>
                        </div>
                    </div>
                </div>
                
                <div class="row d-flex justify-contnet-center">
                  @php
                  $categories = array_slice($categories, 0, 6);
                  @endphp
                  @forelse($categories as $category=>$value)
                    <div class="col-md-4 mb-4">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                            <img src="{{ asset('assets/img/category_icons/'.$category.'.png') }}" alt="Icon">
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{route('jobs.category',['name' => $category])}}">{{$category}}</a></h5>
                                <span>{{$value}}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h2>No Categories </h2>
                    @endforelse
                
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="/jobs" class="border-btn2">Browse All Sectors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
        @if(Auth::check() && Auth::user()->role=='person' )
         <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            <a href="{{ url('/cv')}} " class="border-btn2 border-btn4">Upload your cv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
         
       
        
       
        
        
       
 

    </main>
    
        
		
        
    </body>



@endsection