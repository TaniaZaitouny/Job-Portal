@extends('layouts.index')

@section('content')

<body>
    <script>
        function copyData() {
            document.getElementById('keyword').value = document.getElementById('search').value;
        }
    </script>
   
    <main>
        
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('assets/img/hero/about.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
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
                <div class="row">
                    <div class="col-xl-5 offset-md-2">
                        <!-- form -->
                        
                        <form action="{{route('jobs.search')}}" method="POST" class="search-box">
                            @csrf
                            <div class="input-form" style="width:100%">
                                <input type="text" placeholder="Job Title or keyword" id="search" name="search" oninput="copyData()" value="{{isset($search) ? $search : ''}}">
                                @if(isset($saved)) <input type="hidden" name="saved" value="true"> @endif
                            </div>
                            
                            </div>
                            <div class="search-form">
                                <input type="submit" class="btn head-btn1" style="height:70px" value="Find a Job">
                            </div>	
                        </form>
                        
                        <form name="search-form" action="{{route('search.save')}}" method="POST">
                            @csrf
                            <div class="search-form">
                                <input type="hidden" name="keyword" id="keyword"  value="{{isset($search) ? $search : ''}}">
                                <input type="submit" class="btn head-btn1" style="height:70px" value="Save Keyword">
                            </div>
                        </form>
                    </div>
                </div>
                <br/> <br/>
                <div class="row" style="margin:5px">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        
                        <form action="{{route('jobs.search')}}" method="POST">
                            @csrf 
                            <input type="hidden" name="search" value="{{isset($search) ? $search : ''}}">
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Category</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="category" >
                                        <option value="">All Categories</option>
                                       
                                        @foreach($categories as $current_category)
                                            <option value="{{$current_category->category}}" @if(isset($category) && $category == $current_category->category)selected @endif>{{$current_category->category}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                         
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <?php $types = ['full-time','part-time','freelance'];
                                    ?>
                                    @foreach($types as $type)
                                    <label class="container" >{{$type}}
                                        <input type="checkbox" name="employment[]" value={{$type}} @if(isset($employment) && in_array($type, $employment)) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    @endforeach
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                           
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Location</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="country">
                                       <option value="" selected="selected">Anywhere</option>
                                        @foreach($countries as $current_country)
                                            <option value="{{$current_country->country}}" @if(isset('country') && $country == $current_country->country)selected @endif>{{$current_country->country}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <br><br>
                        </div>
                     
                            
                            <div >
                                
                            <br>
                             <input type ="submit" name="filter" value="filter" class="btn">
                            </div>
                        </div>
                  
                    </form>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <?php $count = count($jobs);?>
                                            
                                            @if($count==1)
                                            <span>{{$count}} job found</span>
                                            @else
                                            <span>{{$count}} jobs found</span>
                                            @endif
                                            <!-- Select job items start -->
                                          
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                               
                                @forelse($jobs as $job)
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
            
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('jobs.show', ['job' => $job->id]) }}">
                                                <h4>{{$job->title }}</h4>
                                            </a>
                                            <ul>
                                                <li><a style="color:#808080" href="{{route('view.user',['id'=>$job->company_id])}}">Company Name</a></li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{$job->location}}</li>
                                                <li>{{$job->salary}}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('jobs.show', ['job' => $job->id]) }}">{{$job->employment}}</a>
                                      
                                    </div>
                                </div>
                                @empty
                                    <p> no jobs found </p>
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
                {{ $jobs->links() }}
            </ul>
        </nav>
        <!--Pagination End  -->
        
    </main>
    
</body>

@endsection