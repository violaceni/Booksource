@extends('layouts.app')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('booksource.main') }}"><i class="fas fa-arrow-left"></i> Back</a>
</nav>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card-columns">
        @if(count($authors) > 0)
            @foreach($authors as $author)
                <div class="card authors">
                    {{-- <div class="card-header"> --}}
                    <div class="card-header author">{{$author->name}}</div>
                    {{-- </div> --}}
                    <div class="card-body text">
                    @foreach($author->books as $book)
                        <h5 class="card-title">{{$book->name}}</h5>
                    @endforeach
                    </div>
                </div>
            @endforeach
    </div>
    <div class="row">
        <div class="col-md-8">
            {{$authors->links()}}
            @else
                <p>No authors found</p>
            @endif
        </div>
    </div>
</div>
