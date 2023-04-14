@extends('layouts.index')

@section('content')

<body>
   
    <main>
        
        <script>
            let certificate_index = 0;
            function add_certificate_row() {
                var certificate_container = document.getElementById("certificates");
                var new_row = document.createElement("div");
                
                new_row.innerHTML = `<input type="text" name="certificate[${certificate_index}]" class="form-control"><br/>`;
                certificate_container.appendChild(new_row);
                certificate_index += 1;
            }
        </script>
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
                        <form action="{{route('applicants.filter', ['post' => $post->id])}}" method = "POST">
                            @csrf
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Applicant Certificates</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                        
                                            <script> certificate_index += 1; </script>
                                            <div class="form-group" id="certificates">
                                                <label class="text-muted">Certificates</label>
                                                @if (isset($certificates))
                                                    @foreach ($certificates as $index => $certificate)
                                                    <script> certificate_index += 1; </script>
                                                    <div>
                                                        <input type="text" name="certificate[{{$index}}]" class="form-control" value="{{$certificate}}"><br/>
                                                    </div>
                                                    @endforeach
                                                @else 
                                                    <div>
                                                        <input type="text" name="certificate[0]" class="form-control"><br/>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                        
                                            <button type="button" id="add_certificate" class="btn btn-light" onclick="add_certificate_row()">Add Row</button>
                                </div>
                         
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Applicant Experience</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="experience" >
                                            <option value="">Years of Experience</option>
                                                @for($i = 1; $i <= 25; $i += 1) 
                                                    <option @if(isset($experience) && $experience == $i) selected @endif value="{{$i}}">{{$i}} @if($i == 1) year @else years @endif </option>
                                                @endfor
                                            ?>
                                        
                                        </select>
                                    </div>
                                </div>
                                <!-- select-Categories End -->
                            
                                <br/>
                                <!-- single two -->
                                <div class="single-listing">
                                <div class="small-section-tittle2">
                                        <h4>Applicant Location</h4>
                                </div>
                                    <!-- Select job items start -->
                                    <div class="select-job-items2">
                                        <select name="country">
                                        <option value="" selected="selected">Anywhere</option>
                                            @foreach($countries as $current_country)
                                                <option value="{{$current_country->country}}" @if(isset($country) && $country == $current_country->country)selected @endif>{{$current_country->country}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <br><br>
                                </div>
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
                                                <a href="{{route('view.user', ['user' => $applicant['id']])}}">
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
                                            <a href="{{route('view.user', ['user' => $applicant['id']])}}">See Profile</a>
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