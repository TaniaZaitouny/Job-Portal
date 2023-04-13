<!DOCTYPE html>
<html>
    <header>

    @include('Partials.styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.9.95/css/materialdesignicons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

</header>
<body>
<script>

    let education_index = 0;
    let skill_index = 0;
    let work_index = 0;

    function add_education_row() {
        var education_container = document.getElementById("education_container");
        var new_row = document.createElement("div");
        new_row.innerHTML = `<div class="row">
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="certificate" class="text-muted">Degree/Certificate</label>
                    <input id="certificate" type="text" name="education[${education_index}][certificate_name]" class="form-control resume" required>
                    <div class="invalid-feedback">
                        Please provide a title.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="year" class="text-muted">Year</label>
                    <input id="year" type="text" name="education[${education_index}][year]" class="form-control resume" required>
                    <div class="invalid-feedback">
                        Please provide a title.
                    </div>
                </div>
            </div>
        </div>`;
        education_container.appendChild(new_row);
        education_index += 1;
    }

    function add_work_row() {
        var work_container = document.getElementById("work_container");
        var new_row = document.createElement("div");
        new_row.innerHTML = `<div class="row">
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="company-name" class="text-muted">Company Name</label>
                    <input id="company-name" type="text" name="work[${work_index}][company_name]" class="form-control resume" required>
                    <div class="invalid-feedback">
                        Please provide a title.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="job-position" class="text-muted">Job Position</label>
                    <input id="job-position" type="text" name="work[${work_index}][position]" class="form-control resume" required>
                    <div class="invalid-feedback">
                        Please provide a title.
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group app-label">
                            <label for="date-from" class="text-muted">Year From</label>
                            <input id="date-from" type="text" name="work[${work_index}][start_year]" class="form-control resume" required>
                            <div class="invalid-feedback">
                                Please provide a title.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group app-label">
                            <label for="date-to" class="text-muted">Year To</label>
                            <input id="date-to" type="text" name="work[${work_index}][end_year]" class="form-control resume" required>
                            <div class="invalid-feedback">
                                Please provide a title.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        work_container.appendChild(new_row);
        work_index += 1;
    }
    
    function add_skill_row() {
        var skill_container = document.getElementById("skill_container");
        var new_row = document.createElement("div");
        new_row.innerHTML = `<div class="row">
            <div class="col-lg-12">
                <div class="form-group app-label">
                    <label for="skill" class="text-muted">Skill</label>
                    <input id="add_skill" type="text" name="skill[${skill_index}][skill]" class="form-control resume" required>
                    <div class="invalid-feedback">
                        Please provide a title.
                    </div>
                </div>
        </div>`;
        skill_container.appendChild(new_row);
        skill_index += 1;
    }
</script>


  @include('Partials.header')

<br> <br> 
<form method="POST" action="{{route('cv.add')}}" class="needs-validation" novalidate>
@csrf

@if(isset($cv))
    @method('PUT')
@endif

    <div class="row">           
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="color:#28395a">General Information</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="job-detail mt-2 p-4">
                        <div class="custom-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="frist-name" class="text-muted">First Name</label>
                                        <input id="frist-name" type="text" name="first_name" class="form-control resume" value="{{ isset($cv) ? $cv->first_name : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="middle-name" class="text-muted">Middle Name</label>
                                        <input id="middle-name" type="text" name="middle_name" class="form-control resume" value="{{ isset($cv) ? $cv->middle_name : '' }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="surname-name" class="text-muted">Last Name</label>
                                        <input id="surname-name" type="text" name="last_name" class="form-control resume" value="{{ isset($cv) ? $cv->last_name : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="date-of-birth" class="text-muted">Date Of Birth</label>
                                        <input id="date-of-birth" type="text" name="birthday" class="form-control resume" value="{{ isset($cv) ? $cv->birthday : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="General" class="text-muted" >Gender</label>
                                        <div class="form-button">
                                            <select class="nice-select" name="gender">
                                                <option value="male" {{ isset($cv) ? $cv->gender == "male" ? "selected" : '' : '' }}>Male</option>
                                                <option value="female" {{ isset($cv) ? $cv->gender == "female" ? "selected" : '' : '' }}>Female</option>
                                                <option value="other" {{ isset($cv) ? $cv->gender == "other" ? "selected" : '' : '' }}>Other</option>
                                                <option value="prefer not to specify" {{ isset($cv) ? $cv->gender == "prefer not to specify" ? "selected" : '' : "selected" }}>Prefer not to specify</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="years-of-experience" class="text-muted">Years of Experience</label>
                                        <input id="years-of-experience" type="text" name="experience" class="form-control resume" value="{{ isset($cv) ? $cv->experience : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mt-5" style="color:#28395a">Contact Information</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="job-detail mt-2 p-4">
                        <div class="custom-form">                         
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="country" class="text-muted">Country</label>
                                        <input id="country" type="text" name="country" class="form-control resume" value="{{ isset($cv) ? $cv->country : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="state" class="text-muted">State</label>
                                        <input id="state" type="text" name="state" class="form-control resume" value="{{ isset($cv) ? $cv->state : '' }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="city" class="text-muted">City</label>
                                        <input id="city" type="text" name="city" class="form-control resume" value="{{ isset($cv) ? $cv->city : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label for="phone" class="text-muted">Phone</label>
                                        <input id="phone" type="text" name="phone" class="form-control resume" value="{{ isset($cv) ? $cv->phone : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group app-label">
                                        <label for="address" class="text-muted">Address</label>
                                        <input id="address" type="text" name="address" class="form-control resume" value="{{ isset($cv) ? $cv->address : '' }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a title.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mt-5" style="color:#28395a">Education Details</h3>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="job-detail mt-2 p-4">
                        <div class="custom-form">
                            <div id="education_container">
                            @if (isset($cv))
                                @foreach ($cv->education as $index => $education)
                                    <script> education_index += 1; </script>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label for="certificate" class="text-muted">Degree/Certificate</label>
                                                <input id="certificate" name="education[{{$index}}][certificate_name]" type="text" class="form-control resume" value="{{$education->certificate_name}}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a title.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label for="year" class="text-muted">Year</label>
                                                <input id="year" type="text" name="education[{{$index}}][year]" class="form-control resume" value="{{$education->year}}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a title.
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                @endforeach
                            @else
                                <script> education_index += 1; </script>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group app-label">
                                            <label for="certificate" class="text-muted">Degree/Certificate</label>
                                            <input id="certificate" type="text" name="education[0][certificate_name]" class="form-control resume" required>
                                            <div class="invalid-feedback">
                                                Please provide a title.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group app-label">
                                            <label for="year" class="text-muted">Year</label>
                                            <input id="year" type="text" name="education[0][year]" class="form-control resume" required>
                                            <div class="invalid-feedback">
                                                Please provide a title.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" id="add_education" class="btn btn-light" onclick="add_education_row()">Add Row</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mt-5" style="color:#28395a">Work Experience</h3>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail mt-2 p-4">
                            <div class="custom-form"> 
                                <div id="work_container">
                                    @if (isset($cv))
                                        @foreach ($cv->work as $index => $work)
                                            <script> work_index += 1; </script>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label for="company-name" class="text-muted">Company Name</label>
                                                        <input id="company-name" type="text" name="work[{{$index}}][company_name]" class="form-control resume" value="{{$work->company_name}}" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a title.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label for="job-position" class="text-muted">Job Position</label>
                                                        <input id="job-position" type="text" name="work[{{$index}}][position]" class="form-control resume" value="{{$work->position}}" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a title.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label for="date-from" class="text-muted">Year From</label>
                                                                <input id="date-from" type="text" name="work[{{$index}}][start_year]" class="form-control resume" value="{{$work->start_year}}" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a title.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label for="date-to" class="text-muted">Year To</label>
                                                                <input id="date-to" type="text" name="work[{{$index}}][end_year]" class="form-control resume" value="{{$work->end_year}}" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a title.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        @endforeach
                                    @else 
                                        <script> work_index += 1; </script>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label for="company-name" class="text-muted">Company Name</label>
                                                    <input id="company-name" type="text" name="work[0][company_name]" class="form-control resume" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a title.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label for="job-position" class="text-muted">Job Position</label>
                                                    <input id="job-position" type="text" name="work[0][position]" class="form-control resume" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a title.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group app-label">
                                                            <label for="date-from" class="text-muted">Year From</label>
                                                            <input id="date-from" type="text" name="work[0][start_year]" class="form-control resume" required>
                                                            <div class="invalid-feedback">
                                                                Please provide a title.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group app-label">
                                                            <label for="date-to" class="text-muted">Year To</label>
                                                            <input id="date-to" type="text" name="work[0][end_year]" class="form-control resume" required>
                                                            <div class="invalid-feedback">
                                                                Please provide a title.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    @endif
                                </div>  
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" id="add_work" onclick="add_work_row()" class="btn btn-light">Add Row</button>
                                    </div>
                                </div>                     
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mt-5" style="color:#28395a">Skills</h3>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="job-detail mt-2 p-4">
                        <div class="custom-form">
                            <div id="skill_container">
                                @if (isset($cv))
                                    @foreach ($cv->skill as $index => $skill)
                                        <script> skill_index += 1; </script>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group app-label">
                                                    <label for="skill" class="text-muted">Skill</label>
                                                    <input id="skill" type="text" name="skill[{{$index}}][skill]" class="form-control resume" value="{{$skill}}" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a title.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <script> skill_index += 1; </script>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group app-label">
                                                <label for="skill" class="text-muted">Skill</label>
                                                <input id="skill" type="text" name="skill[0][skill]" class="form-control resume" required>
                                                <div class="invalid-feedback">
                                                    Please provide a title.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" id="add_skill" class="btn btn-light" onclick="add_skill_row()">Add Row</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom mt-5" value="Submit">
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</form>

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
</html>