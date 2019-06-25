@extends('layouts/admin')
@section('content')

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{session('message')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h2>Create a Mail</h2>

<hr>

<div>

    <form id="createMail" action="/emails" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="country">Select User:</label>
                <select id="user" name="user_id" class="form-control" style="width:250px" required>
                    <option value="">--- Select User ---</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group">
            <label for="title">Email Title</label>
            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" id="title"
                name="title" placeholder="Email title" value="{{old('title')}}" required>
        </div>

        <div class="form-group">
            <label for="body">Email Description</label>
            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : '' }}" id="body"
                name="body" rows="3" placeholder="Email Discription" required>{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Send Email</button>
        </div>
        @include('errors')

    </form>
</div>



@endsection
