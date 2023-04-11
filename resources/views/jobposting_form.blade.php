@extends('layouts.index')

@section('content')
        <br/>
        <h2 class="ml-5"> Upload A New Job Posting </h2>
        <br/>
        <form class="needs-validation ml-5" novalidate method="POST" action="{{ isset($job) ? route('jobs.update', ['job' => $job->id]) : route('jobs.store') }}">
        @csrf
        @if (isset($job))
            @method('PUT')
        @endif
            <div class="col-md-7 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ isset($job) ? $job->title : '' }}">
                <div class="invalid-feedback">
                  Please provide a title.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required value="{{ isset($job) ? $job->location : '' }}">
                <div class="invalid-feedback">
                  Please provide a location.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="education">Description</label>
                <textarea class="form-control" id="desc" name="description" required>{{ isset($job) ? $job->description : '' }}</textarea>
                <div class="invalid-feedback">
                    Please fill in a description.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="work">Requirements</label>
                <textarea class="form-control" id="req" name="requirements" required>{{ isset($job) ? $job->requirements : '' }}</textarea>
                <div class="invalid-feedback">
                    Please fill in your requirements.
                </div>
            </div>
            <div class="col-md-7 mb-5">
                <label for="workspace">Job Workspace</label>
                <br/>
                <select name="workspace">
                    <option value="on-site" {{ isset($job) ? $job->workspace === "on-site" ? "selected" : '' : '' }}>On-site</option>
                    <option value="hybrid" {{ isset($job) ? $job->workspace === "hybrid" ? "selected" : '' : '' }}>Hybrid</option>
                    <option value="remote" {{ isset($job) ? $job->workspace === "remote" ? "selected" : '' : '' }}>Remote</option>
                </select>
                <div class="invalid-feedback">
                    Please fill in your job workspace type.
                </div>
                <br/>
            </div>
            <div class="col-md-7 mb-5">
                <label for="employment">Employment</label>
                <br/>
                <select name="employment">
                    <option value="full-time" {{ isset($job) ? $job->employment === "full-time" ? "selected" : '' : '' }}>Full-time</option>
                    <option value="part-time" {{ isset($job) ? $job->employment === "part-time" ? "selected" : '' : '' }}>Part-time</option>
                    <option value="freelance" {{ isset($job) ? $job->employment === "freelance" ? "selected" : '' : '' }}>Freelance</option>
                </select>
                <div class="invalid-feedback">
                    Please fill in your employment type.
                </div>
                <br/>
            </div>
            <div class="col-md-7 mb-5">
                <label for="category">Category</label>
                <br/>
                <select name="category">
                @php
                    $categories = ['Healthcare', 'Computer and Information Technology', 'Real Estate', 'Retail', 'Education', 'Entertaiment and Sports', 'Legal', 'Transportation', 'Social Services', 'Sales and Marketing', 'Management', 'Businness and Finance', 'Architecture and Engineering', 'Arts and Design', 'Construction'];
                    foreach ($categories as $category) {
                        print '<option value="'.$category.'"';
                        if(isset($job) && $job->category === $category) {
                            print ' selected';
                        }
                        print '>'.$category.'</option>';
                    }
                @endphp  
                </select>
                <div class="invalid-feedback">
                    Please fill in your job category.
                </div>
                <br/>
            </div>
            <div class="col-md-7 mb-3">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" required value="{{ isset($job) ? $job->salary : '' }}">
                <div class="invalid-feedback">
                    Please provide a salary.
                </div>
            </div>
            @csrf
            <button class="btn btn-primary" type="submit">Submit</button>
        
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