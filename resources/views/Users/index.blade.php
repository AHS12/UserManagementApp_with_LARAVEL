@extends('layouts/master')

@section('content')

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{session('message')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<b>Users</b>
<table id="datatable" class="table table-sm table-hover table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th scope="col">Picture</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Birthdate</th>
        </tr>
    </thead>
    <tbody>

        <ul>
            <tr>
                @foreach ($users as $user)
                <th>
                    <div><img height="100" width="100" src="{{ asset('/images/'.$user->image) }}" alt="no pic" srcset="">
                    </div>
                </th>
                <td>
                    <div><a href="/users/{{$user->id}}">{{$user->name}}</a></div>
                </td>
                <td>
                    <div>
                        <p>{{$user->email}}</p>
                    </div>
                </td>
                <td>
                    <div>
                        <p>{{$user->birthDate}}</p>
                    </div>
                </td>
                </div>
            </tr>
            @endforeach
        </ul>

    </tbody>
</table>

@endsection
