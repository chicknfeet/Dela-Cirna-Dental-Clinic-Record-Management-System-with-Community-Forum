@extends('layout.app')

@section('content')

    <div class="container">
        <h2>Community Forum</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('communityforum.create') }}" class="btn btn-primary">Post</a>
        <table class="row">
            <tbody>
                @foreach ($communityforums as $communityforum)
                    <tr>
                        <td>{{ $communityforum->post }}</td>
                        <td>
                            <a href="{{ route('createComment', $communityforum->id) }}" class="btn btn-warning">Comment</a>
                            <a href="{{ route('updateCommunityforum', $communityforum->id) }}" class="btn btn-warning">Update</a>
                            <form method="post" action="{{ route('deleteCommunityforum', $communityforum->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection

@section('title')
Community Forum
@endsection
