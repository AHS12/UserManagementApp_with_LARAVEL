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


<b>Sent Emails</b>
<table id="dataTable" class="table table-sm table-hover table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">body</th>
            <th scope="col">Sent To</th>
            <th scope="col">Sent By</th>
            <th scope="col">Sent Time</th>
        </tr>
    </thead>
    <tbody>

        <ul>
            <tr>
                @foreach ($emails as $email)
                <th>
                    <div>
                        <p>{{$email->title}}</p>
                    </div>
                </th>

                <td>
                    <div>
                        <p>{{$email->body}}</p>
                    </div>
                </td>
                <td>
                    <div>
                        <p>
                            {{$email->user->name}} <br>
                            {{$email->user->email}}

                            {{-- The Classic Way
                            @php
                            $user = App\User::findOrFail($email->user_id);
                            @endphp
                            {{$user->name }} <br>
                            {{$user->email}} --}}
                        </p>
                    </div>
                </td>

                <td>
                    <div>
                        <p>
                            {{-- Snice i didnt use forign key as admin_id --}}
                            @php
                            $admin = App\User::findOrFail($email->admin_id);
                            @endphp
                            {{$admin->name}} <br>
                            {{$admin->email}}
                        </p>
                    </div>
                </td>
                <td>
                    <div>
                        <p>{{$email->created_at}}</p>
                    </div>
                </td>

            </tr>
            @endforeach
        </ul>

    </tbody>
</table>
@endsection
