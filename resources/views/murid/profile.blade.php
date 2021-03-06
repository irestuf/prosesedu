@extends('layouts.master')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-lg-3 pr-1 pl-1 pb-0  ">
        @include('auth.profile')
        @include('layouts.listuser')
        </div>
        
        <div class="col-lg-6 pr-1 pl-1 pb-1 pt-0">
                    @if (session('status'))
                        <div class="alert alert-success mb-0 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                                        @if ($errors->any())
          @foreach ($errors->all() as $error)
    <div class="alert alert-danger mb-0 mt-1">
           {{ $error }}
    </div>
     @endforeach
@endif
           @include('layouts.profileform')
           @include('layouts.katasandi')
        </div>
        <div class="col-lg-3 pr-1 pl-1 pb-1">
        @include('layouts.nilai')
        </div>
    </div>
</div>   
           
