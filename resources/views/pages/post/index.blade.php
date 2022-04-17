@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container d-flex justify-content-center">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">List Of Post</h3>
                <a href="{{ route('posts.create') }}" class="btn btn-secondary"  >Create Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-3 mb-3">
                    <table  class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col" width="50px">#</th>
                            <th scope="col">Title</th>
                            <th scope="col" >Author</th>
                            <th scope="col" >Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $key=>$post)
                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{$post->Author->name}}</td>
                                 <td><img src="{{ storage_path('/posts/'.$post->image) }}" height="50px" width="50px"></td>
                                <td><a class="btn btn-sm text-white btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form{{$key}}').submit();">Delete</a><form id="delete-form{{$key}}" method="post" action="{{ route('posts.destroy', Crypt::encrypt($post['id'])) }}" class="d-none">@csrf {{ method_field('DELETE') }}</form></td>
                                <td><a class="btn btn-sm text-white btn-info" href="{{ route('posts.edit',Crypt::encrypt($post->id)) }}" >Edit</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger ">No Records Available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex ">
{{--                        {!! $posts->links() !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

