@extends('layouts.index')

@section('content')
        <br/>
        <h2 class="ml-5"> Upload A New Job Posting </h2>
        <br/>
        <form class="needs-validation ml-5" novalidate method="POST" action="">
            <div class="col-md-7 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
                <div class="invalid-feedback">
                  Please provide a title.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="education">Description</label>
                <textarea class="form-control" id="desc" name="description" required>
                </textarea>
                <div class="invalid-feedback">
                    Please fill in a description.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="work">Requirements</label>
                <textarea class="form-control" id="req" name="requirements" required>
                </textarea>
                <div class="invalid-feedback">
                    Please fill in your requirements.
                </div>
            </div>
            <div class="col-md-7 mb-5">
                <label for="workspace">Job Workspace</label>
                <br/>
                <select>
                    <option value="on-site" name="workspace">On-site</option>
                    <option value="hybrid" name="workspace">Hybrid</option>
                    <option value="remote" name="workspace">Remote</option>
                </select>
                <div class="invalid-feedback">
                    Please fill in your job workspace type.
                </div>
                <br/>
            </div>
            <div class="col-md-7 mb-5">
                <label for="employment">Employment</label>
                <br/>
                <select>
                    <option value="full-time" name="employment">Full-time</option>
                    <option value="part-time" name="employment">Part-time</option>
                    <option value="freelance" name="employment">Freelance</option>
                </select>
                <div class="invalid-feedback">
                    Please fill in your employment type.
                </div>
                <br/>
            </div>
            <div class="col-md-7 mb-5">
                <label for="category">Category</label>
                <br/>
                <select>
                    
                </select>
                <div class="invalid-feedback">
                    Please fill in your job category.
                </div>
                <br/>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        <br/>
        
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
@endsection