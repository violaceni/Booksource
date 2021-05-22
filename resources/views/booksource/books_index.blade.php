@extends('layouts.app')
@section('content')
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
        @if(count($books) > 0)
            @foreach($books as $book)
                <div class="card books">
                    <div class="card-header author">{{$book->name}}</div>
                    <div class="card-body text">
                        <div> Published date:  {{$book->release_date}}</div>
                    </div>
                </div>
            @endforeach
        
    </div>
    <div class="row">
        <div class="col-md-8">
            {{$books->links()}}
            @else
                <p>No authors found</p>
            @endif
        </div>
    </div>
</div>
@endsection
