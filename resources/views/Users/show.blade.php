@extends('layouts/master')

@section('content')

@if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                    <p>{{session('message')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if ($user->image)
                <div>
                    <img width="300" height="300" src="{{ asset('images/'.$user->image) }}" alt="" srcset="">
                </div>
                @endif

                <b>Name:</b> {{ $user->name }}<br>
                <b>Email:</b> {{$user->email}} <br>
                <b>Birth Date:</b> {{$user->birthDate}}

            </div>

@endsection
