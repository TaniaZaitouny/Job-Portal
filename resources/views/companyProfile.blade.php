<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job board HTML-5 Template </title>
        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        
        @include('Partials.styles')
    
</head>
<body>

  @include('Partials.header')
 
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
      .logo {
     
        width: 120px;
        height: 120px;
        margin: 20px;
       
        object-fit: cover;
      }
      .cover {
        width: 100%;
        height: 300px;
        background-image: url('data:image/png;base64,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');
        background-size: cover;
        background-position: center;
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
 
  <body>
    <div class="card">
      <img class="logo" style="   position:absolute;top: 146px;" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="Company logo">
      <div class="cover" src="https://images.unsplash.com/photo-1557330803-dcf98fc9eac1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"></div>
      <div class="info">
        <h1 class="company-name">Company Name</h1>
        <h2 class="sub-title">Sub Title</h2>
        <p class="description">A little description about the company goes here.</p>
      </div>
    </div><br>
    <div class="about-us">
      <h2>About Us</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat faucibus purus, ac ultrices diam lacinia sit amet. Nam eu lorem nec sapien dignissim malesuada in quis felis. Maecenas vel vestibulum risus. Quisque non leo a quam consequat scelerisque. Nulla facilisi. Nulla ac sollicitudin elit. Vestibulum eu ultricies tellus. Fusce blandit volutpat dolor, eu venenatis libero tempor id. Sed at velit malesuada, aliquam tellus vel, scelerisque lorem.</p>
      <p>Nunc pulvinar justo vitae neque porttitor, at volutpat lacus sollicitudin. Praesent elementum accumsan augue, in mollis
    </p>
    </div>
    <div class="reviews ">
  <h2>Reviews</h2>
  <div class="review-card">
    <img src="https://via.placeholder.com/100x100.png" alt="Reviewer Avatar" />
    <div class="review-card-content">
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
      <p>- John Doe</p>
    </div>
  </div>
  <div class="review-card">
    <img src="https://via.placeholder.com/100x100.png" alt="Reviewer Avatar" />
    <div class="review-card-content">
      <p>"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
      <p>- Jane Doe</p>
    </div>
  </div>
</div>
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
</html>
    </body>
    </html>
