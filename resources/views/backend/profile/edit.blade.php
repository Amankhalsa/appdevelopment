@extends('backend.layouts.admin_master')
  
@section('title')
Edit Profile
@endsection
  
@section('content')   
<div class="row">
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Edit/Update Profile</strong> 
                </div>
        <div class="card-body card-block">
            <form action="{{route('admin.update.profile')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="hf-name" name="name"  value="{{$edit_profile->name}}" class="form-control">
                        <span class="help-block">Please enter your Name</span>
                        @error('name')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="hf-email" name="email"value="{{$edit_profile->email}}" class="form-control">
                        <span class="help-block">Please enter your email</span>
                        @error('email')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-profile_image" class=" form-control-label">Profile image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="profile_photo_path"  class="form-control" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        <span class="help-block">Please select your Profile</span>
                        @error('profile_photo_path')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                    </div>

                    <div class="col-12 col-md-9">
                     
                        
                       <img src="{{(!empty($edit_profile->profile_photo_path)) 
                        ? asset($edit_profile->profile_photo_path):url('backend/images/no_image.jpg')}}" alt=""  style="border-radius:50%; width:150px;" id="output">
                    </div>
                </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Update profile
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </form>
    </div>

</div>
</div>
            @include('backend.body.footer')
@endsection
