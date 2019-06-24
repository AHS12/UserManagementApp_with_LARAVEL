@extends('layouts.master')

@section('content')



@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
    <p>{{session('message')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">

            <h1> @if (auth()->user()->hasrole('administrator'))
                <i class="fas fa-users-cog"></i>
                @elseif(auth()->user()->hasrole('user'))
                <i class="fas fa-users"></i>
                @else
                <i class="fas fa-user-lock"></i>
                @endif
                {{ Auth::user()->name }}
            </h1>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <div class="text-center">
                <img height="300" width="300" id="avatar" src="{{ asset('images/'.Auth::user()->image) }}"
                    class="avatar img-circle img-thumbnail" alt="avatar">

                <div class="col-md-4 col-form-label">
                    <script type="text/javascript">
                        var loadFile = function (event) {
                            var output = document.getElementById('avatar');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            //for canceling the hide from remove preview
                            $("#avatar").show();
                        };

                        function removePreview() {
                            $("#avatar").hide();
                            $("#image").val('');
                        }

                    </script>

                    <style>
                        div.hidden {
                            display: none
                        }
                    </style>
                    <div id="imageButton" class="hidden">
                    <form action="update-image/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                            <input class="btn " type="file" id="image" name="image" onchange="loadFile(event)">
                            <button class="btn btn-outline-danger" type="button" onclick="removePreview()">Remove
                                Preview</button> <br>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                            class="far fa-check-circle"></i> Update Image</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            </hr><br>


            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>






        </div>
        <!--/col-3-->
        <script type="text/javascript">
            function showImage() {
                $("div#imageButton").removeClass("hidden");
            }
            function hideImage(){
                $("div#imageButton").addClass("hidden");
            }

        </script>
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a class="btn btn-outline-success" data-toggle="tab" onclick="hideImage()"
                        href="#home">Home</a></li>
                <li><a class="btn btn-outline-warning" data-toggle="tab" onclick="showImage()"
                        href="#settings">Settings</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    placeholder="{{ Auth::user()->name }}" title="your first name"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>



                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="{{auth()->user()->email}}" title="your email."
                                    value="{{auth()->user()->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="date">
                                    <h4>Birth Date</h4>
                                </label>
                                <input type="datetime" class="form-control" id="date"
                                    placeholder="{{Auth::user()->birthDate}}" title="Your birthDate"
                                    value="{{Auth::user()->birthDate}}" readonly>
                            </div>
                        </div>

                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->

                <!--/tab-pane-->
                <div class="tab-pane" id="settings">


                    <hr>
                    <form class="form" action="/users/{{auth()->user()->id}}" method="POST" id="update">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Name</h4>
                                </label>
                                <input type="text" class="form-control" name="name" id="first_name"
                                    placeholder="first name" title="enter your first name if any."
                                    value="{{Auth::user()->name}}" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="{{auth()->user()->email}}" title="your email."
                                    value="{{auth()->user()->email}}" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="birthDate">
                                    <h4>Birthday</h4>
                                </label>
                                <input type="text" class="form-control datetimepicker-input" id="birthDate"
                                    name="birthDate" data-toggle="datetimepicker" data-target="#birthDate"
                                    autocomplete="off" value="{{Auth::user()->birthDate}}" required />
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#birthDate').datetimepicker({
                                        format: 'yy/mm/dd'
                                    });
                                });

                            </script>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                        class="far fa-check-circle"></i> Save</button>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        @include('errors')
                    </div>
                </div>
            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->
@endsection
