@extends('layouts.main')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Your Blogs</h4>
                </div>

                <div class="card-body">
                    @isset($post)
                        @forelse($post as $blog)
                            <div class="post-author d-flex my-5">
                                <div class="author-img">
                                    <img src="{{ asset('storage/image/' . $blog->image) }}" alt="post-image" class="avatar avatar-100 photo" style="max-width: 100px; max-height: 100px;">

                                </div>
                
                                <div class="author-content pl-4">
                                    <h4 class="mb-3">
                                        <a href="{{ route('post.show', ['id' => $blog->id]) }}" title="" rel="author" class="text-capitalize">{{ $blog->title }}</a>
                                    </h4>
                                    <span class="date-comm font-sm text-capitalize text-color">
                                        <i class="ti-time mr-2"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}
                                    </span>
                                    <p>{{ \Illuminate\Support\Str::limit($blog->body, 150, '...') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('post.destroy', $blog->id) }}" method="post" class="mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
            
                                <a href="{{ route('post.edit', $blog->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                            </div>
                        @empty
                            <p>{{ $user->name }} hasn't created any blogs yet, <a href="{{ route('post.create') }}">create now</a></p>
                        @endforelse
                    @else
                        <p>{{ $user->name }} hasn't created any blogs yet, <a href="{{ route('post.create') }}">create now</a></p>
                    @endisset
                </div>
                
            </div>
        </div>

        <div class="col-md-4">
            <div class="card clickable-card" onclick="window.location='{{ route('profile.edit', $user->id) }}';">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
        
                <div class="card-body text-center">
                    <div class="sidebar-widget about mb-5 text-center p-3">
                        <div class="about-author">
                            @if($user->photo)
                            <img src="{{ asset('storage/photos/'.$user->photo) }}" class="img-thumbnail rounded-circle" style="object-fit: cover; width: 150px; height: 150px;">
                            @else
                                <img src="{{ asset('images/profile.jfif') }}" class="img-thumbnail rounded-circle">
                            @endif
                        </div>
                        <h4 class="mb-0 mt-4">{{ $user->name }}</h4>
                        <p>{{ $user->tag }}</p>
                        <p>{{ $user->aboutme }}</p>
                    </div>
                    @if($user->phone || $user->email)
                        <div class="row justify-content-center align-items-center">
                            @if($user->phone)
                                <div class="text-right ml-5 mr-2">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="text-left mr-5">
                                    <span class="mb-0">{{ $user->phone }}</span>
                                </div>
                            @endif
        
                            @if($user->email)
                                <div class="text-right mr-2">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="text-left mr-2">
                                    <span class="mb-0">{{ $user->email }}</span>
                                </div>
                            @endif
                        </div>
                    @else
                        <p>Please complete your profile to add contact information. <a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a></p>
                    @endif
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
