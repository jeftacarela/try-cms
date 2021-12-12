@extends('layouts.master')
@section('content')

    <div class="content-page">
        {{-- message --}}
        {!! Toastr::message() !!}
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-7">
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard</h4>
                                <h3 class="greeting">Welcome {{ $id->name }}!</h3>
                            </div>
                        </div>
                        <div class="row align-items-right">
                            <div class="col">
                                <div class="float-right d-none d-md-block">
                                    @if ($id->role == 'C')
                                        <button type="submit" class="btn btn-sm btn-success waves-effect waves-light mt-5 mr-1">
                                            <a href="#" class="mr-3 ml-3" data-toggle="modal" data-target="#add_user" style="font-size: 14px">Add User</a>
                                        </button>
                                    @endif
                                    <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light mt-5 mr-2">
                                        <a href="#" class="mr-3 ml-3" data-toggle="modal" data-target="#add_article" style="font-size: 14px">New Article</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- message --}}
            {!! Toastr::message() !!}
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif

                {{-- Start Content --}}
                <div class="row">
                @if ($id->role == 'C')
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center p-1">
                                    <div class="col-lg-10">
                                        <h5 class="font-14">Total Article</h5>
                                        <h6 class="text-danger header-title pt-1 mb-0" style="font-size: 16px">{{ $jumlahArticle }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center p-1">
                                    <div class="col-lg-10">
                                        <h5 class="font-14">Total Users</h5>
                                        <h6 class="text-danger header-title pt-1 mb-0" style="font-size: 16px">{{ $jumlahUser }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center p-1">
                                <div class="col-lg-10">
                                    <h5 class="font-14">My Article</h5>
                                    <h6 class="text-danger header-title pt-1 mb-0" style="font-size: 16px">{{ $myArticle }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Your Article</h4>
                                <ol class="activity-feed mb-0 pl-3">
                                    @foreach ($article as $item)
                                    @if ($item->user_id == $id->id)
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            {{-- <a href="{{ url('admin/task/detail/'.$item->id) }}" class="text-muted mb-1">{{ $item->created_at }}</a> --}}
                                            <a href="{{ url('admin/task/me/') }}" class="text-muted mb-1">{{ $item->created_at }}</a>
                                            <p> by: <b class="text-primary"> {{ $item->user->name }}</b></p>
                                            <p class="font-15 mt-0 mb-0">{{ $item->name }} <b class="">{{ Str::limit($item->article, 75, ' ') }}
                                                <a href="#" class="text-primary" data-toggle="modal" data-id="'$item->id'" data-target="#article">more...</a>
                                            </b></p>
                                            <br>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/watch?v=eh8manMzXlk" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Read {{ $jumlahArticle }} Articles</h4>
                                <ol class="activity-feed mb-0 pl-3">
                                    @foreach ($article as $item)
                                    {{-- @if ($item->user_id == $id->id) --}}
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            {{-- <a href="{{ url('admin/task/detail/'.$item->id) }}" class="text-muted mb-1">{{ $item->created_at }}</a> --}}
                                            <a href="{{ url('admin/task/show/') }}" class="text-muted mb-1">{{ $item->created_at }} </a>
                                            <p> by: <b class="text-primary"> {{ $item->user->name }}</b></p>                                            
                                            <p class="font-15 mt-0 mb-0">
                                                <b class=""> {{ Str::limit($item->article, 200, ' ') }}
                                                <a href="#" class="text-primary" data-toggle="modal" data-id="'$item->id'" data-target="#article">more...</a>
                                            </p>
                                            <br>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/watch?v=eh8manMzXlk" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- @endif --}}
                                    @endforeach
                                </ol>
                            </div>
                        </div> 
                    </div>    
                </div>
            </div>
            <!-- container-fluid -->
        </div>
    </div>

    <!-- Show Article Modal -->
    <div id="article" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title header-title">Read Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm6">
                            <label for="name" class="col-form-label">By: </label>{{ $item->user->name }}
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-12"> 
                            <div class="form-group">
                                <label for="article" class="col-form-label">Article</label>
                                <p>{{ $item->article }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-8"> 
                            <div class="form-group">
                                <label>Video URL</label>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $item->video}}" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Show Article Modal -->

    <!-- Add Article Modal -->
    <div id="add_article" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title header-title">Create New Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save-article') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row"> 
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label for="article" class="col-form-label">Article</label>
                                    <textarea required class="form-control @error('article') is-invalid @enderror" type="text" id="article" name="article" value="{{ old('article') }}" placeholder="Write here..."
                                        oninvalid="this.setCustomValidity('Please Enter article')" oninput="setCustomValidity('')"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-4"> 
                                <label>Client Name</label>
                                <select class="form-control" name="user_id" id="user_id">
                                    <option selected disabled>Write by:</option>
                                    @if ($id->role == 'C')
                                        @foreach ($user as $orang)
                                            <option value="{{ $orang->id }}">{{ $orang->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-8"> 
                                <div class="form-group">
                                    <label>Video URL</label>
                                    <input required class="form-control @error('video_url') is-invalid @enderror" type="text" id="video_url" name="video_url" value="{{ old('video_url') }}" placeholder="Only Token, e.g. https://www.youtube.com/embed/[watch?v=eh8manMzXlk]"
                                        oninvalid="this.setCustomValidity('Please Enter valid Webiste URL')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit Article</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Article Modal -->

    <!-- Add User Modal -->
    <div id="add_user" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title header-title">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row"> 
                            <div class="col-sm-8"> 
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Full Name</label>
                                    <input required class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Full Name"
                                        oninvalid="this.setCustomValidity('Please Enter valid Name')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                            <div class="col-sm-4"> 
                                <label>Role Name</label>
                                <select required class="form-control" name="role_name" id="role_name">
                                    <option selected disabled value=""> -- Select Role --</option>
                                        <option value="C">Admin</option>
                                        <option value="B">Team Member</option>
                                        <option value="A">Client</option>
                                </select>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-8"> 
                                <div class="form-group">
                                    <label for="email" class="col-form-label example-email-input">Email</label>
                                    <input required class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Example: example@gmail.com"
                                    oninvalid="this.setCustomValidity('Please Enter valid Email')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input required title="8 characters minimum" class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Enter Password" pattern=".{8,}">
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-form-label">Password Confirmation</label>
                                    <input required class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Repeat Password"
                                        oninvalid="this.setCustomValidity('Please Enter valid Password')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit New User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add User Modal -->


@endsection