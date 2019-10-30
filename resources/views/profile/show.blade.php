@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            {{ $user->name }}
            @if (Auth::user()->id == $user->id)
            <br/>
            Reeeeeeeeeeeeeeee
            @endif
    </div>
</div>
@endsection
