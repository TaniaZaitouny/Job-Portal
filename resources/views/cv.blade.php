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

    function add_education_row() {
        var education_container = document.getElementById("education_container");
        var new_row = document.createElement("div");
        new_row.innerHTML = `<div class="row">
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="certificate" class="text-muted">Degree/Certificate</label>
                    <input id="certificate" type="text" class="form-control resume">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="year" class="text-muted">Year</label>
                    <input id="year" type="text" class="form-control resume">
                </div>
            </div>
        </div>`;
        education_container.appendChild(new_row);
    }

    function add_skill_row() {
        var skill_container = document.getElementById("skill_container");
        var new_row = document.createElement("div");
        new_row.innerHTML = `<div class="row">
            <div class="col-lg-12">
                <div class="form-group app-label">
                    <label for="skill" class="text-muted">Skill</label>
                    <input id="add_skill" type="text" class="form-control resume">
                </div>
        </div>`;
        skill_container.appendChild(new_row);
    }

    function add_work_row() {
        var work_container = document.getElementById("work_container");
        var new_row = document.createElement("div");
        new_row.innerHTML = `<div class="row">
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="company-name" class="text-muted">Company Name</label>
                    <input id="company-name" type="text" class="form-control resume">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group app-label">
                    <label for="job-position" class="text-muted">Job Position</label>
                    <input id="job-position" type="text" class="form-control resume">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group app-label">
                            <label for="date-from" class="text-muted">Year From</label>
                            <input id="date-from" type="text" class="form-control resume">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group app-label">
                            <label for="date-to" class="text-muted">Year To</label>
                            <input id="date-to" type="text" class="form-control resume">
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        work_container.appendChild(new_row);
    }
</script>


  @include('Partials.header')

<br> <br> 
<form method="POST" action="">
@csrf
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
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="frist-name" class="text-muted">First Name</label>
                                            <input id="frist-name" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="middle-name" class="text-muted">Middle Name</label>
                                            <input id="middle-name" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="surname-name" class="text-muted">Last Name</label>
                                            <input id="surname-name" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="date-of-birth" class="text-muted">Date Of Birth</label>
                                            <input id="date-of-birth" type="text" class="form-control resume" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="General" class="text-muted" >Gender</label>
                                            <div class="form-button">
                                                <select class="nice-select">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                    <option value="Prefer not to specify" selected>Prefer not to specify</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="country" class="text-muted">Country</label>
                                            <input id="country" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="state" class="text-muted">State</label>
                                            <input id="state" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="city" class="text-muted">City</label>
                                            <input id="city" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group app-label">
                                            <label for="phone" class="text-muted">Phone</label>
                                            <input id="phone" type="text" class="form-control resume">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group app-label">
                                            <label for="address" class="text-muted">Address</label>
                                            <input id="address" type="text" class="form-control resume">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                            <form>
                                <div id="education_container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label for="certificate" class="text-muted">Degree/Certificate</label>
                                                <input id="certificate" type="text" class="form-control resume">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label for="year" class="text-muted">Year</label>
                                                <input id="year" type="text" class="form-control resume">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" id="add_education" class="btn btn-light" onclick="add_education_row()">Add Row</button>
                                    </div>
                                </div>
                            </form>
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
                                <form>
                                    <div id="work_container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label for="company-name" class="text-muted">Company Name</label>
                                                    <input id="company-name" type="text" class="form-control resume">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label for="job-position" class="text-muted">Job Position</label>
                                                    <input id="job-position" type="text" class="form-control resume">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group app-label">
                                                            <label for="date-from" class="text-muted">Year From</label>
                                                            <input id="date-from" type="text" class="form-control resume">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group app-label">
                                                            <label for="date-to" class="text-muted">Year To</label>
                                                            <input id="date-to" type="text" class="form-control resume">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" id="add_work" onclick="add_work_row()" class="btn btn-light">Add Row</button>
                                        </div>
                                    </div>                     
                                </form>
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
                            <form>
                                <div id="skill_container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group app-label">
                                                <label for="skill" class="text-muted">Skill</label>
                                                <input id="skill" type="text" class="form-control resume">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" id="add_skill" class="btn btn-light" onclick="add_skill_row()">Add Row</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom mt-5" value="Submit Resume">
                    
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</form>
</body>
</html>