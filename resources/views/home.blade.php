@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @auth
                <div class="col-md-8 text-center mb-5">
                    <github-token-form />
                </div>

                <div class="col-md-8 text-center mb-5">
                    <github-stars />
                </div>
            @else
                <div class="col-md-2">
                    <a href="{{ route('login') }}" class="btn btn-primary px-5 mt-5">Login</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
