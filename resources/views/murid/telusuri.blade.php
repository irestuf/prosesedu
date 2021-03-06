@extends('layouts.master')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-lg-3 pr-1 pl-1 pb-0  ">
        @include('layouts.profile')
        @include('layouts.listuser')
        </div>
        
        <div class="col-lg-6 pr-1 pl-1 pb-1 pt-0">
                    @if (session('status'))
                        <div class="alert alert-success mb-0">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="my-1 p-3 bg-white rounded shadow"> 
           <!-- search box container ends  -->
@include('murid.caritutor')
                    <div  id="result-tutor"></div>
                    <br>
                    <div id="list-tutor">
@foreach($user->tutors as $tutor)
<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="{{$tutor->gravatar}}" width="40" height="40" alt="Generic placeholder image">
  <div class="media-body">
    <a href="{{url('/tutor/'.$tutor->username.'')}}"><p class="mt-0 mb-0">{{$tutor->name}}</p></a>
    <small class="mt-0 ">{{$tutor->username}} | {{$tutor->created_at->diffForHumans()}} |{{$tutor->role}}</small>
    </div>
</div>
<hr>
@endforeach
</div>
</div>
        </div>
        <div class="col-lg-3 pr-1 pl-1 pb-1">
        @include('layouts.nilai')
        </div>
    </div>
</div>   
    @endsection