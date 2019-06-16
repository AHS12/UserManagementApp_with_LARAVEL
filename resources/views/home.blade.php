@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
                @endif --}}


                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                    <p>{{session('message')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <b>Name:</b> {{ Auth::user()->name }} <br>
                <b>Email:</b> {{auth()->user()->email}} <br>
                <b>Birth Date:</b> {{Auth::user()->birthDate}}

            </div>

        </div>
    </div>
</div>



</div>
@endsection
