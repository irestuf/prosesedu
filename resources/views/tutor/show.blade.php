@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('murid.menu')
            <br>
            
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img class="mr-3" src="{{ $user->gravatar }}"  width="50" alt="Generic placeholder image">
                    @include('tutor.rating')
                    {{$user->name}}
                    <br>
                    {{$user->role}}
                    <br>
                    {{$user->profile->note }}
                    
                    
                   
                    
                <br>    
@foreach($user->murids as $murid)
<div class="media">
  <img class="mr-3" src="{{ $murid->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('murid.profile',  $murid->username)}}" ><h5 class="mt-0">{{ $murid->name }}</h5></a>
    {{ $murid->email }} | {{$murid->created_at->diffForHumans()}} | {{ $murid->role }}
    </div>
    <a href="{{route('unfollow', $murid->id)}}"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
</div>
<hr>
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection