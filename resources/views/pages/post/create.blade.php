@extends('layouts.app')
@section('content')

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
    <section class="pt-0 pb-0">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Create Post</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="title" class="form-label">Enter Title of the Post <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title') }}" placeholder="Enter a title for the post">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="tag" class="form-label">Select Tags for the post. <span class="text-danger">*</span></label>
                                <select name="tags[]" multiple id="tag" class="multiselect-dropdown form-control @error('tags') is-invalid @enderror" required>
                                    @forelse($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label for="PostBox" class="form-label">Write Your Post Below <span class="text-danger">*</span></label>
                                <textarea name="description" required id="PostBox" class=" @error('description') is-invalid @enderror" placeholder="Kindly Write your Post Here.">{{ old('description') }}</textarea>
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label for="input-file-now" class="form-label">Upload Images <span class="text-danger">*</span></label>
                                <div class="file-upload-wrapper">
                                    <input type="file" required id="input-file-now" class="custom-file @error('image') is-invalid @enderror" accept="image/jpeg, image/bmp, image/png, image/jpg, image/svg" class="file-upload" name="image" />
                                    @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="" class="btn btn-secondary btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
