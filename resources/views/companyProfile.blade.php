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
      .reviews {
        margin: 20px auto;
        max-width: 1000px;
  margin-top: 50px;
}

.review-card {
  display: inline-block;
  width: 45%;
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  vertical-align: top;
  box-sizing: border-box;
}

.review-card img {
  display: block;
  width: 50px;
  height: 50px;
  margin-right: 10px;
  border-radius: 50%;
  object-fit: cover;
  object-position: center;
}

.review-card-content {
  display: inline-block;
  width: calc(100% - 60px);
  vertical-align: top;
}

    </style>

    
     
      
      <div class="about-us" style=" max-width: 1000px;">
       <br><br>
       <div class="text-right ">
       <a href="{{route('company.edit')}}" class="btn head-btn1">Edit Profile</a>
       <a href="{{route('posts.show')}}" class="btn head-btn1">View Posts</a>
        </div>
        <div  class="text-left ">
        <h1 class="company-name">{{$company->company_name}}</h1>
        <p class="description">{{$company->description}}</p>
      </div>
    </div>
  <br>
    <div class="about-us">
      <h2>About Us</h2>
     <p> {{$company->about_us}}
    </p>
    </div>
    <div class="reviews ">
  <h2>Reviews</h2>
  
  <div class="review-card">
    <div class="review-card-content">
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
      <p>- John Doe</p>
    </div>
  </div>
 


    <div class="divider"></div>
      
    
          @if(Auth::user()->role=='regular')
          <form action="" method="POST">
          @csrf
            <div class="col-md-3 mb-3 align-center">
                <label for="text"><h5>Leave a review</h5></label>
                <textarea class="form-control"  name="review" hint="Enter Your Review" style="width:500px;height:100px;"> </textarea>
                <br>
                <input type="submit" value="Add Review" style="background: #fb246a; border:none;color:white;height:45px;width:150px"/>
            </div>
            </div>
            </form>
          @endif
<br>
<div class="contact">
<h2>Contact</h2>
<ul>
<li><span>Website:</span> {{$company->website}}</li>
<li><span>Email:</span> {{Auth::user()->email}}</li>

</ul>
</div>

  </body>
@endsection
