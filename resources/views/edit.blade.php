<!--import main file  -->
@extends('layout.app')


@section('title','Student: Register')

@section('content')

<!-- this is for all error message -->

@if($errors->any())

    @foreach($errors->all() as $error)

            <div class="alert alert-danger ">
                {{  $error }}
            </div>
    @endforeach

@endif

<!-- this is for success message -->
@if($message=Session::get('success'))

        <div class="alert alert-success">
            {{ $message }}
        </div>
@endif

<!-- this is for error message -->

@if($error=Session::get('error'))

        <div class="alert alert-danger">
            {{ $error }}
        </div>
@endif
<a href="/student" class='btn btn-primary mb-3'>Back</a>
<div class="row">
    <!-- student detail form -->
    <div class="col-md-5  border p-3">
        <h3 class="text-center">Student </h3>
        <form action="{{ route('student.update', $student->id) }}" method='post' >
        @csrf
        @method("PATCH")
            <div class="form-group">
                
                <label for="name">Full Name</label>
                <input type="text" name="name" value="{{ $student->name }}"  id="class" class="form-control">
            
            </div>
            <br />
            <div class="form-group">
               
                <label for="class">Standered</label>
                <input type="text" name="class"   value="{{ $student->class }}" id="class" class="form-control">
            
            </div>
            <br />
            <div class="form-group">
                
                <label for="email">Email</label>
                <input type="text" name="email" id="email"  value="{{ $student->email }}" class="form-control">
            
            </div>
            <br />
            <div class="form-group">
            
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone"  value="{{ $student->phone }}" class="form-control">
            
            </div>

            <div class="form-group">
            
                <button type='submit' id='submit'  class="btn btn-primary" >
                Edit
                </button>
            </div>
        </form>
    </div>
    <!-- student  profile form -->
    <div class="col-md-1"></div>
    
    <div class="col-md-5 border p-3">
    <h3 class="text-center">Profile</h3>        
        <form action="{{ route('update_profile', $student->id) }}" id='profile_form' method='Post' enctype="multipart/form-data">
        @csrf
        @method("PATCH")
            
            <div class="form-group mt-2">
                
                <label for="image">Select Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label for="image" class="custom-file-label">
                         choose image or keep old image</label>
                    </div>
                    
                    <input type="hidden" name="old_image" value="{{ $student_profile->image }}">
                    <!-- this preview of old image -->
                    <div class='mt-2'>{{ $student_profile->image }} </div>

                    <img src="{{ URL::to('/') }}/images/{{ $student_profile->image }}" alt="{{ $student->name }}'s image" class='img-thumbnail' width='60'>
            </div>
            <br />
            <!-- here we use user_id which is coming from student form  and this is  use in update function to validate  
                jo batata he ki pahle student form submit karan he fir bad me profile form
             -->
            <input type="hidden" id='user_id' name="user_id" 
            value="{{ $student->id }}">
            <div class="form-group">
            
                <label for="hobbies">Hobbies</label>
                <input type="text" name="hobbies"  value="{{ $student_profile->hobbies }}" id="hobbies" class="form-control">
            
            </div>
            <br />
            <div class="form-group">
                
                <label for="dob">Dob</label>
                <input type="date"  name="dob" id="dob" class="form-control">

            </div>
            <br />
            <div class="form-group">
            
                <button type='submit' class="btn btn-primary" >
                Save
                </button>
            </div>
        </form>
    </div>
</div>


@endsection('content')
