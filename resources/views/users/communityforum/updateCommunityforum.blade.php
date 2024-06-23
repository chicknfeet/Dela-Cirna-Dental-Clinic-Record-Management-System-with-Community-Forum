@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Update Post</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('updatedCommunityforum', $communityforum->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" class="form-control" id="post" name="post" placeholder="What's on your mind?" value="{{ old('post', $communityforum->post) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('communityforum') }}" class="btn btn-info mt-3">Cancel</a>
    </div>
@endsection

@section('title')
    Update Post
@endsection