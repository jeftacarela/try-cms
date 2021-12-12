
@extends('layouts.master')
@section('content')
    
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li>
                                    <li class="breadcrumb-item"><a class="active" href="{{ url('admin/project/show') }}">Project</a></li>
                                </ol>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-2 ml-3 header-title">Project Datatable</h4>
                                </p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th hidden>ID</th>
                                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Project">Article</th>
                                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Team Assignee">Writer</th>
                                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Team Assignee">Video</th>
                                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Type of Project">Create</th>
                                            <th data-bs-toggle="tooltip" data-bs-placement="top" title="Action for each project" class="text-center">Modify</th>
                                        </tr>    
                                    </thead>

                                    <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td class="no">{{ ++$key }}</td>
                                            <td hidden class="id">{{ $item->id }}</td>
                                            <td class="article">{{ Str::limit($item->article, 30, '...') }}</td>
                                            <td class="user">{{ $item->user->name }}</td>
                                            <td class="video"><div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" width="20px" src="{{ $item->video }}" allowfullscreen></iframe>
                                            </div></td>
                                            <td class="project_type">{{ $item->created_at }}</td>
                                            <td class="text-center">
                                                <a href="#" class="articleUpdate text-warning" data-toggle="modal" data-id="'$item->id'" data-target="#edit_article">Edit</a>
                                                <a href="{{ url('/article/delete/'.$item->id) }}" class="text-danger" onclick="return confirm('Are you sure to want to delete it?')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <div class="col-12 d-flex mb-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                            <a href="#" data-toggle="modal" data-target="#add_article">New Article</a>
                                        </button>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end page-title -->
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    <!-- content --> 

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
                                    @foreach ($orang as $orang)
                                        <option value="{{ $orang->id }}">{{ $orang->name }}</option>
                                    @endforeach
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

    <!-- Edit Project Modal -->
    <div id="edit_article" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title header-title">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-article') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <div class="row"> 
                            <div class="col-sm-8"> 
                                <div class="form-group">
                                    <label for="article" class="col-form-label">Article</label>
                                    <input class="form-control" type="text" id="e_article" name="article" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-4"> 
                                <label>Client Name</label>
                                <select class="form-control" name="user_id" id="user_id">
                                    <option selected disabled>Write by:</option>
                                    @foreach ($data as $orang)
                                        <option value="{{ $orang->user->id }}">{{ $orang->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Video (only token)</label>
                                    <input class="form-control" type="text" id="e_video" name="video" value="{{ old('video') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Edit Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Project Modal -->

    <script>
        $(document).ready( function() {
            $('table#datatable').DataTable({
                "searching": true,
                "paging":true,
                "ordering":true,
                "columnDefs":[{
                    "targets":[5], 
                    "orderable":false,
                }]
            });
        });
    </script>

@endsection
