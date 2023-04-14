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
                                <h2>{{ $post->title }}</h2>
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
                                       
                                        @foreach($categories as $category)
                                            <option value="{{$category->category}}" @if(session('category')==$category->category)selected @endif>{{$category->category}}</option>
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
                                        <input type="checkbox" name="employment[]" value={{$type}}>
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
                                        @foreach($countries as $country)
                                            <option value="{{$country->country}}" @if(session('country')==$country->country)selected @endif>{{$country->country}}</option>
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
                                <!-- single-job-content -->
                               
                                @forelse($applicants as $applicant)
                                    <div class="single-job-items mb-30">
                                        <div class="job-items">
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>{{ $applicant['first_name'] }} {{ $applicant['last_name'] }}</h4>
                                                </a>
                                                <ul>
                                                    @if ($applicant['experience'] == 1)
                                                        <li>{{ $applicant['experience'] }} year of experience</li>
                                                    @else
                                                        <li>{{ $applicant['experience'] }} years of experience</li>
                                                    @endif
                                                    <li><i class="fas fa-map-marker-alt"></i>{{ $applicant['country'] }}</li>
                                                    @if ($post->employment === 'freelance')
                                                        <li> {{ $applicant['bid'] }}</li>
                                                    @endif
                                                    
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="items-link items-link2 f-right">
                                            <a href="#">See Profile</a>
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
        
    </main>
   
	
        
</body>

@endsection