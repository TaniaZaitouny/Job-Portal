@extends('layouts.index')

@section('content')

<body>



 
    <style>
      /* Card styles */
      .card {
        margin: 20px auto;
        display: flex;
        flex-wrap: wrap;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        max-width: 1100px;
      }
      
      .info {
        width: 30%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      .company-name {
        font-size: 36px;
        margin: 0 0 10px 0;
      }
      .sub-title {
        font-size: 24px;
        margin: 0 0 10px 0;
      }
      .description {
        font-size: 16px;
        margin: 0;
      }
      /* About us section styles */
      .about-us {
        margin: 20px auto;
        max-width: 1000px;
        text-align: justify;
      }
      .about-us h2 {
        font-size: 24px;
        margin: 0 0 20px 0;
      }
      .about-us p {
        font-size: 16px;
        margin: 0 0 20px 0;
      }
      .contact {
        margin: 20px auto;
        max-width: 1000px;
        text-align: justify;
      }
      .contact h2 {
        font-size: 24px;
        margin: 0 0 20px 0;
      }
      .contact ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      .contact li {
        font-size: 16px;
        margin-bottom: 10px;
      }
      .contact li span {
        font-weight: bold;
      }
      /* Divider styles */
      .divider {
        margin: 20px auto;
        max-width: 800px;
        border-top: 1px solid #ccc;
      }
 

.experience-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
      padding: 20px;
        margin-bottom: 20px;
        max-width: 1000px;
        margin :20px auto;
      }
      
      .experience-card h3 {
        margin-top: 0px;
      }

    </style>
   <br>
    @if($information)

    <div class="about-us">
    <div class="text-right ">
       <a href="{{route('cv.index')}}" class="btn head-btn1">Edit Profile</a>
     </div>
    <h2>
       {{ $information->first_name }} 
       {{$information->last_name}}
 </h2>
    </div> 
  <br>
  
  <div>
      <h4 class="contact">Education</h4>
        <ul class="list-group experience-card">
         
        @foreach($education as $certificate)
      
          <li>
            
            <h6>{{$certificate->certificate_name}}   -{{$certificate->year}}</h6>
         
          </li>
          @endforeach
         
        </ul>
    </div>
    
    <div>
      <h4 class="contact">Experience</h4>
        <ul class="list-group experience-card">
          <li>
            @foreach($work as $experience)
            <h5>{{$experience->position}}</h5>
            <p>at {{$experience->company_name}} </p>
          </li>
            @endforeach
        </ul>
    </div><br>
    <div>
      <h4 class="contact">Skills</h4>
        <ol class="list-group experience-card">
          <li>
            @foreach($skill as $skill)
            <h5>{{$skill->skill}}</h5>
          
          </li>
            @endforeach
        </ol>
    </div><br>
    <div class="divider"></div>
      <div class="contact">
        <h2>Contact</h2>
          <ol>
           
            <li><span>Email:</span> {{Auth::user()->email}}</li>
            <li><span>Phone:</span> {{$contact->phone}}</li>
          </ol>
      </div>
 
   @else 
   <div class="about-us"> <h2>update your profile!</h2><br><br><br><br><br><br>
   <div class="text-right ">
       <a href="{{route('cv.index')}}" class="btn head-btn1">Edit Profile</a>
     </div> </div>
   @endif
  </body>

@endsection
