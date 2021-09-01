@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to Bookma!</h1>
                <a href="{{ route('signup.get')}}">sign up now!!</a>
            </div>
        </div>
    @endif
@endsection