@extends('backend.layouts.admin_master')
  
@section('title')
My Profile
@endsection
  
@section('content')   
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block" src="{{asset(Auth::user()->profile_photo_path)}}" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">Name :{{Auth::user()->name}}</h5>
                                <div class="location text-sm-center">
                                    <i class="fa fa-envelope"></i>Email : {{Auth::user()->email}} </div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="#">
                                    <i class="fa fa-facebook pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest pr-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('admin.edit.profile')}}" class="btn btn-success">
                            <strong class="card-title mb-3">Edit Profile</strong>
                        
                        </a>
                        </div>
                    </div>
                </div>
            </div>
  
            @include('backend.body.footer')
@endsection
