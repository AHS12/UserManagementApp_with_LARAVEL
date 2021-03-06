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

<b>Users</b>
<table id="dataTable" class="table table-sm table-hover table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th scope="col">Picture</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Role</th>
            <th scope="col">Badge</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <ul>
            <tr>
                @foreach ($users as $user)
                <td>{{ $loop->iteration }}</td>
                <th>
                    <div><img height="100" width="100" src="{{ asset('/images/'.$user->image) }}" alt="no pic"
                            srcset="">
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

                <td>
                    <div>
                        @foreach ($user->roles as $role)
                        <p> <strong> {{$role->name}}</strong></p>
                        @endforeach
                    </div>
                </td>
                <td>
                    @if ($user->hasrole('administrator'))
                    <i class="fas fa-users-cog"></i>
                    @elseif($user->hasrole('user'))
                    <p><i class="fas fa-users"></i></p>
                    @else
                    <i class="fas fa-user-lock"></i>
                    @endif
                </td>
                <td>
                    {{-- <button class="btn btn-circle btn-facebook">edit</button> --}}
                    @if ($user->hasrole('administrator'))
                    <form action="demote-user/{{$user->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-success">Make User(Demote)</button>
                    </form>

                    @elseif ($user->hasrole('user'))
                    <form action="updateUser-admin/{{$user->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger">Make Admin</button>
                    </form>

                    @else
                    <form action="updateUser-user/{{$user->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-success">Make User</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </ul>

    </tbody>
</table>

@endsection
