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
                    <h2>Create a New Post</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter the title" required autofocus>
                        </div>

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" style="min-height: 450px;" placeholder="Write your blog..." required>{{ old('body') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Add Image</label>
                            <input type="file" name="image" class="form-control-file" required>
                        </div>

                        <div class="form-group">
                            <input type="text" id="category" name="category" value="{{ old('category') }}" class="form-control" placeholder="Category" required autofocus>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
