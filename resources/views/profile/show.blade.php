@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            {{ $user->name }}
            <br/>
            Bergabung sejak {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
        </div>
        <div class="col">
            @if(is_null(Auth::user()))
            @elseif (Auth::user()->id == $user->id)
            <br/>
            <form action="{{ route('post.create') }}" method="POST">
            {{-- <form action=""> --}}
                @csrf
                <input name="userid" id="userid" type="hidden" value="{{ Auth::user()->id}}">
                <input name="content" id="content" type="textarea" placeholder="Apa yang sedang terjadi?">
                <button type="submit" class="btn btn-primary">Kirimkan</button>
            </form>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <p>{{  $user->name }}</p>
                        <p>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                        <p>{{ $post->content }}</p>
                        {{-- <p class="card-text">Tanggal Mulai: {{ $project['tanggal_mulai'] }}.</p>
                        <p class="card-text">Tanggal Mulai: {{ $project['tanggal_target'] }}.</p> --}}
                    </div>
                    <div class="card-button">
                        @if(is_null(Auth::user()))
                        @elseif (Auth::user()->id == $user->id)
                        <a href="/post/delete/{{ $post->id }}">Hapus</a>
                        <a href="/posts/delete/{{ $post->id }}">Edit</a>
                        @endif
                        <a href="/posts/delete/{{ $post->id }}">Komentar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        @endsection
