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
    <div class="row"> 
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Book Title</th>
                <th scope="col">Published date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($books) > 0)
                <div style="display: none">{{$count = 1}}</div>
                @foreach ($books as $book)
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>{{$book->name}}</td>
                    <td>{{$book->release_date}}</td>
                    <td><a href="{{route('booksource.books.edit', $book->id)}}">Edit</a></td> 
                </tr>     
                @endforeach
            </tbody>
          </table>
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

