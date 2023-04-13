@extends('layouts.index')

@section('content')

<body>
   
    <main>
        
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('assets/img/hero/about.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Your Posts</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row" style="margin:5px">
                    <!-- Right content -->
                    
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <?php $count = count($posts);?>
                                            
                                            @if($count === 1)
                                                <span>{{$count}} post found</span>
                                            @else
                                                <span>{{$count}} posts found</span>
                                            @endif
                                            <!-- Select job items start -->
                                          
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                               
                                @forelse($posts as $post)
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
            
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('applicants.show', ['post' => $post->id]) }}">
                                                <h4>{{$post->title }}</h4>
                                            </a>
                                            <ul>
                                                <li>Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{$post->location}}</li>
                                                <li>{{$post->salary}}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('applicants.show', ['post' => $post->id]) }}">{{$post->employment}}</a>
                                      
                                    </div>
                                </div>
                                @empty
                                    <p> No jobs found </p>
                                @endforelse
                                <!-- single-job-content -->
                               
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
     
      
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
             {{ $posts->links() }}
             </ul>
        </nav>
        <!--Pagination End  -->
        
    </main>
   
	
        
    </body>

@endsection