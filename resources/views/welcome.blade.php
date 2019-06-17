@extends('layouts.master')
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1><i class="fa fa-camera-retro" aria-hidden="true"></i> The User Gallery</h1>
        <p>Here We can See All The Registered users of this site</p>
        <a href="https://bootsnipp.com/snippets/mMBqZ" class="btn btn-success active" target="_blank">Based on
            this bootsnipp</a>
    </div>

    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{session('message')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row fix">
        @foreach ($users as $user)

        {{-- <div class="col-lg-4 col-sm-6">
            <div class="thumbnail">
                <div class="card" style="width: 18rem;">
                    <img width="100" height="200" class="card-img-top" src="{{ asset('images/'.$user->image) }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">{{$user->email}}</p>
                        <a href="#" class="btn btn-primary">Show Details</a>
                    </div>
                </div>
            </div>
        </div> --}}



                <div class="col-md-4">
                   <div class="card mb-4">
                      <img class="card-img-top" width="200" height="350"
                      src="{{ asset('images/'.$user->image) }}" alt="Card image cap">
                      <div class="card-body">
                         <h5 class="card-title">{{$user->name}}</h5>
                         <p class="card-text">{{$user->email}}</p>
                      <a href="/users/{{$user->id}}" class="btn btn-outline-dark btn-sm">Show Details</a>
                      </div>
                   </div>
                </div>

        @endforeach
    </div>
</div>



{{-- <div class="box">
    <div class="container">
        <div class="row">

                @foreach ($users as $user)

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                <div class="box-part text-center">

                        <img width="200" height="300" class="card-img-top" src="{{ asset('images/'.$user->image) }}"
                        alt="Card image cap">

                    <div class="title">
                        <h4>{{$user->name}}</h4>
                    </div>

                    <div class="text">
                            {{$user->email}}
                    </div>

                    <a href="#">Learn More</a>

                </div>
            </div>

            @endforeach

        </div>
    </div>
</div> --}}

@endsection
