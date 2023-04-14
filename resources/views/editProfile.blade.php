@extends('layouts.index')
@section('content')

<br/>
        <h2 class="ml-5"> Edit Profile </h2>
        <br/>
        <form class="needs-validation ml-5" novalidate method="POST" action="{{route('company.save')}}">
        @csrf
            <div class="col-md-7 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}">
                <div class="invalid-feedback">
                  Please provide a Name.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="desctiption">Description</label>
                <input type="text"  class="form-control" id="description" name="description" value="{{ old('description')?? '' }}" > 
            </div>
            <div class="col-md-7 mb-3">
                <label for="about_us">About us</label>
                <textarea style="height:200px" class="form-control" id="about_us" name="about_us">{{ old('about_us') ?? '' }}</textarea>
            </div>
            <div class="col-md-7 mb-3">
                <label for="Website">Website</label>
                <input type="text"  class="form-control" id="website" name="website" value="{{ old('website')?? '' }}"> 
            </div>
            <div>
            <button class="btn btn-primary" type="submit">Submit</button>
</div><br><br>
</form>



@endsection
