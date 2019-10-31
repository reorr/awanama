@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            {{ $user->name }}
            <br/>
            Bergabung sejak {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
            @if (Auth::user()->id == $user->id)
            <br/>
            <form action="{{ route('post.create') }}" method="POST">
            {{-- <form action=""> --}}
                @csrf
                <input name="userid" id="userid" type="hidden" value="{{ Auth::user()->id}}">
                <input name="content" id="content" type="textarea" placeholder="Apa yang sedang terjadi?">
                <button type="submit" class="btn btn-primary">Kirimkan</button>
            </form>
            @endif
            <br/>
            @foreach ($posts as $post)
            <div class="card">
                <p>{{ $post->content }}</p>
                <p>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
            </div>
            @endforeach
    </div>
</div>
@endsection
