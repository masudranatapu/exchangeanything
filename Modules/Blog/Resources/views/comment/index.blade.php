@extends('layouts.backend.admin')

@section('title') 
    {{ __('post_list') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('category_list') }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th width="3%">{{ __('sl') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Body') }}</th>
                                    <th>{{ __('Comment Status') }}</th>
                                    <th width="10%">{{ __('actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comments as $key => $comment)
                                    <tr >
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $comment->email }}">{{ $comment->email }}</a>
                                        </td>
                                        <td>{{ Str::limit($comment->body, 60) }}</td>
                                        <td>
                                            <form action="{{ route('blog.comment.status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                <select name="status" class="form-control" onchange="this.form.submit()">
                                                    <option value="">Select One</option>
                                                    <option @if($comment->status == 1) selected @endif value="1">Approved</option>
                                                    <option @if($comment->status == 0) selected @endif value="0">Disapproved</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#replay_{{$key}}">
                                                Reply Comment
                                            </button>
                                            <button class="btn btn-success" data-toggle="modal" data-target="#edit_{{$key}}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('blog.comment.delete', $comment->id) }}" class="btn btn-danger mt-2" onclick="return confirm('Are you sure to delete this comment?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="replay_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Reply Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('blog.comment.replay') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{$comment->id }}" name="comment_id">
                                                        <input type="hidden" value="{{$comment->post_id }}" name="post_id">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Name">
                                                                @error('name') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email Address">
                                                                @error('email') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Reply Body</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="body" class="form-control" cols="30" rows="5" placeholder="Comment Replay"></textarea>
                                                                @error('body') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-success">Reply</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">View Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3> Commenter Name : {{ $comment->name }} </h3>
                                                    <h5></h5>
                                                    <h3> Email Address : <a href="mailto:{{ $comment->email }}">{{ $comment->email }}</a></h3>
                                                    <h5>
                                                        Comment Body
                                                    </h5>
                                                    <p>
                                                        {!! $comment->body !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <x-not-found word="Categoty"/>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <div class="d-flex justify-content-center">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection