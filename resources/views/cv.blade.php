<!DOCTYPE html>
<html>
    <header>

   @include('Partials.styles')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.9.95/css/materialdesignicons.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />



</header>
<body>

  @include('Partials.header')

<br> <br> <div class="row">
               
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
                                    <input id="frist-name" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="middle-name" class="text-muted">Middle Name</label>
                                    <input id="middle-name" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="surname-name" class="text-muted">Surname</label>
                                    <input id="surname-name" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="date-of-birth" class="text-muted">Date Of Birth</label>
                                    <input id="date-of-birth" type="text" class="form-control resume" placeholder="13-02-1999">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="General" class="text-muted" >General</label>
                                    <div class="form-button">
                                        <select class="nice-select">
                                            <option data-display="General">General</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="marital-status" class="text-muted">Marital Status</label>
                                    <div class="form-button">
                                        <select class="nice-select">
                                            <option data-display="Status">Status</option>
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
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
                                    <label for="citys" class="text-muted">City</label>
                                    <div class="form-button">
                                        <select class="nice-select">
                                            <option data-display="City">City</option>
                                            <option value="1">Abilene</option>
                                            <option value="2">Babbitt</option>
                                            <option value="3">Cape Coral</option>
                                            <option value="4">Dallas</option>
                                            <option value="5">Eloy</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="state" class="text-muted">State</label>
                                    <div class="form-button">
                                        <select class="nice-select">
                                            <option data-display="State">State</option>
                                            <option value="1">Alabama</option>
                                            <option value="3">Hawaii</option>
                                            <option value="4">Maine</option>
                                            <option value="5">Oregon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="country" class="text-muted">Country</label>
                                    <div class="form-button">
                                        <select class="nice-select">
                                            <option data-display="Country">Country</option>
                                            <option value="1">Alabama</option>
                                            <option value="2">Delaware</option>
                                            <option value="3">Iowa</option>
                                            <option value="4">Missouri</option>
                                            <option value="5">New York</option>
                                            <option value="6">Utah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="phone" class="text-muted">Phone</label>
                                    <input id="phone" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="e-mail" class="text-muted">E-mail</label>
                                    <input id="e-mail" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group app-label">
                                    <label for="website" class="text-muted">Website</label>
                                    <input id="website" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group app-label">
                                    <label for="address">Address</label>
                                    <textarea id="address" rows="4" class="form-control resume" placeholder=""></textarea>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <label for="graduation" class="text-muted">Graduation</label>
                                    <input id="graduation" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <label for="university/college" class="text-muted">University/College</label>
                                    <input id="university/college" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group app-label">
                                    <label for="degree/certification" class="text-muted">Degree/Certification</label>
                                    <input id="degree/certification" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group app-label">
                                            <label for="level" class="text-muted">Level</label>
                                            <div class="form-button">
                                                <select class="nice-select">
                                                    <option data-display="Select">Select</option>
                                                    <option value="1">Level-1</option>
                                                    <option value="2">Level-2</option>
                                                    <option value="3">Level-3</option>
                                                    <option value="4">Level-4</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group app-label">
                                            <label for="course-title" class="text-muted">Course Title</label>
                                            <input id="course-title" type="text" class="form-control resume" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group app-label">
                                    <label for="addition-information" class="text-muted">Addition Information</label>
                                    <textarea id="addition-information" rows="4" class="form-control resume" placeholder=""></textarea>
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
            <h3 class="mt-5" style="color:#28395a">Work Experience</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="job-detail mt-2 p-4">
                <div class="custom-form">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <label for="company-name" class="text-muted">Company Name</label>
                                    <input id="company-name" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <label for="job-position" class="text-muted">Job Position</label>
                                    <input id="job-position" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group app-label">
                                    <label for="location" class="text-muted">Location</label>
                                    <div class="form-button">
                                        <select class="nice-select">
                                            <option data-display="Search">Search</option>
                                            <option value="1">New York</option>
                                            <option value="2">Los Angeles</option>
                                            <option value="3">Chicago</option>
                                            <option value="4">Houston</option>
                                            <option value="5">Indiana</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group app-label">
                                            <label for="date-from" class="text-muted">Date From</label>
                                            <input id="date-from" type="text" class="form-control resume" placeholder="01-Jan-2018">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group app-label">
                                            <label for="date-to" class="text-muted">Date To</label>
                                            <input id="date-to" type="text" class="form-control resume" placeholder="31-March-2019">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group app-label">
                                    <label for="addition-information-1" class="text-muted">Addition Information</label>
                                    <textarea id="addition-information-1" rows="4" class="form-control resume" placeholder=""></textarea>
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
            <h3 class="mt-5" style="color:#28395a">Skills</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="job-detail mt-2 p-4">
                <div class="custom-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group app-label">
                                    <label for="skills" class="text-muted">Skills</label>
                                    <input id="skills" type="text" class="form-control resume" placeholder="HTML, CSS, PHP, javascript, ...">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group app-label">
                                    <label for="skill proficiency" class="text-muted">Skill proficiency</label>
                                    <input id="skill proficiency" type="text" class="form-control resume" placeholder="75%">
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
            <div class="text-center">
                <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom mt-5" value="Submit Resume">
            
            </div>
        </div>
    </div>
    <br>
</div>





</body>
</html>