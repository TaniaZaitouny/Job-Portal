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
    
    <div class="about-us">
    <h2>name</h2>
    </div>
  <br>
  
  <div>
      <h4 class="contact">Experience</h4>
        <ul class="list-group experience-card">
          <li>
            <h5>Job Title 1</h5>
            <p>Description of Job 1</p>
          </li>
          <li>
            <h5>Job Title 1</h5>
            <p>Description of Job 1</p>
          </li>
          <li>
            <h5>Job Title 1</h5>
            <p>Description of Job 1</p>
          </li>
        </ul>
    </div>
    
    <div>
      <h4 class="contact">Skills</h4>
        <ul class="list-group experience-card">
          <li>
            <h5>Job Title 1</h5>
            <p>Description of Job 1</p>
          </li>
          <li>
            <h5>Job Title 1</h5>
            <p>Description of Job 1</p>
          </li>
          <li>
            <h5>Job Title 1</h5>
            <p>Description of Job 1</p>
          </li>
        </ul>
    </div><br>
    <div class="divider"></div>
      <div class="contact">
        <h2>Contact</h2>
          <ul>
            <li><span>Website:</span> www.example.com</li>
            <li><span>Email:</span> info@example.com</li>
            <li><span>Phone:</span> (123) 456-7890</li>
          </ul>
      </div>
   
  </body>
@endsection
