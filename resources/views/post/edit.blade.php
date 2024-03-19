@extends('layouts.main')

@section('content')
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Post</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="form-control" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control" style="min-height: 450px;" required>{{ old('body', $post->body) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category" value="{{ old('category', $post->category) }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Update Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="form-group mt-2">
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
