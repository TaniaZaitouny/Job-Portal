@extends('layouts.index')
@section('content')
<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('assets/img/logo/logo.png' )}}" alt="">
                </div>
            </div>
        </div>
    </div>
<main>

<!-- Hero Area Start-->
<div class="slider-area ">
<div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('assets/img/hero/about.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="hero-cap text-center">
                    <h2>{{$job->title}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Hero Area End -->
<!-- job post company Start -->
<div class="job-post-company pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Left Content -->
            <div class="col-xl-7 col-lg-8">
                <!-- job single -->
                <div class="single-job-items mb-50">
                    <div class="job-items">
                
                        <div class="job-tittle">
                         
                                <h4>{{$job->title}}</h4>
                          
                            <ul>
                                <li><a style="color:#808080" href="{{route('view.company',['id'=>$job->company_id])}}">Company Name</a></li>
                                <li><i class="fas fa-map-marker-alt"></i>{{$job->location}}</li>
                                <li>{{$job->salary}}$</li>
                            </ul>
                        </div>
                    </div>
                </div>
                  <!-- job single End -->
               
                <div class="job-post-details">
                    <div class="post-details1 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Description</h4>
                        </div>
                        <p>{{$job->description}}</p>
                    </div>
                    <div class="post-details2  mb-50">
                         <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Required Knowledge, Skills, and Abilities</h4>
                        </div>
                        <?php 
                        $arr = explode(',',$job->requirements);
                        $date = substr($job->created_at,0,10);
                        ?>
                       <ul>
                        @foreach($arr as $requirement)
                           <li>{{$requirement}}</li>
                        @endforeach
                       </ul>
                    </div>
                    
                </div>

            </div>
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                
              
                 <br/>
                 <div class="apply-btn2">
                    <form method="POST" action="{{ route('jobs.save', ['job' => $job->id]) }}">
                    </div>
                    <ul>
                        <li>Posted date : <span>{{$date}}</span></li>
                        <li>Location : <span>{{$job->location}}</span></li>
                        <li>Job nature : <span>{{$job->employment}}</span></li>
                        <li>Salary :  <span>{{$job->salary *12}}$ yearly</span></li>
                    </ul>
                    <br/>
                    <form class="needs-validation" novalidate action="{{route('jobs.apply', ['job' => $job->id])}}" method="POST">
                        @csrf
                        @if ($job->employment === 'freelance')
                            <label for="bid" class="text-muted">Bid:</label>
                            <input type="text" class="form-control" name="bid" id="bid" required>
                            <div class="invalid-feedback">
                                Please provide a title.
                              </div>
                            <br/>
                        @endif
                        <div class="row">
                        <div class="apply-btn2">
                            <button type="submit" class="btn">Apply Now</a>
                        </div>
                    </form>
                    <br/>
                    <div class="apply-btn2">
                        <form method="POST" action="{{ route('jobs.save', ['job' => $job->id]) }}">
                            @csrf
                            <button type="submit" class="btn">{{$job->isSaved() ? 'Unsave Job' : 'Save Job'}}</button>
                        </form>
                    </div>
                       </div>
               </div>
               
            </div>
        </div>
    </div>
</div>
<!-- job post company End -->

</main>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
@endsection