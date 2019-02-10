@extends('layouts.CommentLayout')

@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Profile Edit</h4>
                </div>
                <form action="{{route('profile_update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Name</label>  <input type="text" class="form-control" value="{{Auth::user()->name}}" id="name" name="name">
                    </div>

                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            <input type="file" class="form-control" id="name" name="image">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="submit" name="submit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> {{ config('app.name', 'Laravel') }}</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li class="active"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else



                <li  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> </span> {{ Auth::user()->name }} </a>
                    <ul class="dropdown-menu">
                        <li>   <a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                        <li><a data-toggle="modal" data-target="#myModal">Edit Profile</a></li>

                    </ul>

                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="card container text-center">
    <div class="row">
        <div class="col-sm-3 well">
            <div class="well">

                <h4>{{ Auth::user()->name }}</h4>

                @if(!empty(Auth::user()->image))
                    <img src="{{url('uploads/'.Auth::user()->image)}}" class="img-circle" height="100" width="100" title="{{Auth::user()->name}}" alt="{{Auth::user()->name}}">
                @else
                    <img src="{{url('uploads/noprofile.png')}}" class="img-circle" height="100" width="100" title="No Image" alt="No Image">
                @endif

           </div>
            <div class="well">
            <h4>Friends</h4>
                <div class="row">
                    @foreach($Users as $user)
                    <div class="col-md-3 col-sm-3 col-xs-3" style="padding: 2px;" ><a href='{{url("friend/$user->id")}}'>
                            @if(!empty($user->image))
                            <img src="{{url('uploads/'.$user->image)}}" class=" image-thumbnail " height="61" width="56" title="{{$user->name}}" alt="{{$user->name}}">
                        @else
                                <img src="{{url('uploads/noprofile.png')}}" class=" image-thumbnail " height="61" width="56" title="{{$user->name}}" alt="{{$user->name}}">
                        @endif
                        </a></div>

                  @endforeach
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding: 2px"><img src="{{url('image/friend.jpg')}}" class="image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding:2px"><img src="{{url('image/friend.jpg')}}" class=" image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding:  2px"><img src="{{url('image/friend.jpg')}}" class="image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}

                    {{--<div class="col-md-3 col-sm-3 col-xs-3" style="padding:2px"><img src="{{url('image/friend.jpg')}}" class=" image-thumbnail image-responsive"  width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding:  2px"><img src="{{url('image/friend.jpg')}}" class="image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding:2px"><img src="{{url('image/friend.jpg')}}" class=" image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding:2px"><img src="{{url('image/friend.jpg')}}" class="image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}

                    {{--<div class="col-md-3 col-sm-3 col-xs-3" style="padding:2px"><img src="{{url('image/friend.jpg')}}" class=" image-thumbnail image-responsive"  width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding:2px"><img src="{{url('image/friend.jpg')}}" class="image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding: 2px"><img src="{{url('image/friend.jpg')}}" class=" image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"  style="padding: 2px"><img src="{{url('image/friend.jpg')}}" class="image-thumbnail  image-responsive" width="100%" alt="Avatar"></div>--}}

                </div>
                <p class="text-right"><a href="#">See All</a></p>
            </div>

        </div>
        <div class="col-sm-7">

            <div class="row" style="margin-bottom: 5%">
                <div class="col-sm-12" >
                    <form action="{{route('status')}}" method="Post">
                        @csrf
                            <textarea name="status" id="" class="form-control"  placeholder="Status"></textarea>
                            <button type="submit" class="btn btn-default btn-sm pull-right" style="margin-top: 3px">
                               Post
                            </button>
                    </form>
                </div>
            </div>

@foreach($statuses as $status)
            <div class="row text-left">
                <div class="col-md-12">

                        <div class="well">
                            <p>{{$status->status}}</p>
                            <p class="text-right" style="margin-bottom: 0px"><a  data-toggle="collapse" data-target="#demo{{$status->id}}" class="badge badge-info">Comment</a></p>
                        </div>
                    <div id="demo{{$status->id}}" class="collapse">
                        <div class="col-md-2"></div>
                        <div class="col-sm-10 " >
                            <form action="{{route('comment')}}" method="Post">
                                @csrf
                            <textarea name="Comment" id="" class="form-control" placeholder="Write Your Comment"></textarea>
                                <input type="hidden" name="StatusId" value="{{$status->id}}">
                            <button type="submit" class="btn btn-default btn-sm pull-right" style="margin-top: 3px;margin-bottom: 10px">
                               Submit
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($comments as $comment)
                @if($comment->StatusId == $status->id)
            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-sm-2 "  style="padding-right: 0px">

                    <p>{{$comment->name}}</p>

                  @if(!empty($comment->image))
                        <img src="{{url('uploads/'.$comment->image)}}" class="img-circle" height="40" width="40"  title="{{$comment->name}}" alt="{{$comment->name}}">
                    @else
                        <img src="{{url('uploads/profile.png')}}" class="img-circle" height="40" width="40"  title="No Image" alt="No Image">
                    @endif




                </div>
                <div class="col-sm-8" style="padding-left: 0px">
                    <div class="well">
                        <p>{{$comment->Comment}}</p>
                    </div>
                </div>
            </div>
                    @endif
                @endforeach
            @endforeach

        </div>
        <div class="col-sm-2 well">
            <div class="thumbnail">
                <p>Upcoming Events:</p>
                <img src="{{url('image/event.jpg')}}" alt="Paris" width="400" height="300">
                <p><strong>Dawn</strong></p>
                <p>Sun. 10 February 2019</p>
                <button class="btn btn-primary">Info</button>
            </div>
            <div class="thumbnail">
                <img src="{{url('image/ads.jpg')}}" alt="Paris" width="400" height="300">
            </div>
            <div class="thumbnail">
                 <img src="{{url('image/ad2.jpg')}}" alt="Paris" width="400" height="300">
            </div>
        </div>
    </div>
</div>
@endsection
