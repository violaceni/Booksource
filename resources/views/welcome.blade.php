@extends('layouts.app')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="welcome-title">
                    Booksource
                </div>
                <div class="button-row">
                    <div class="buttons">
                        <button type="button" class="btn btn-success btn-lg" onclick="window.location='{{ route('booksource.index') }}'"><b>Show Data</b></a></button>
                        <button type="button" class="btn btn-success btn-lg" onclick="window.location='{{ route('booksource.insert') }}'"><b>Add Data</b></a></button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
