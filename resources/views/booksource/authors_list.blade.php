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
                <th scope="col">Author Name</th>
                <th scope="col">Author Age</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($authors) > 0)
                <div style="display: none">{{$count = 1}}</div>
                @foreach ($authors as $author)
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>{{$author->name}}</td>
                    <td>{{$author->age}}</td>
                    <td><a href="{{route('booksource.authors.edit', $author->id)}}">Edit</a></td> 
                </tr>     
                @endforeach
            </tbody>
          </table>
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
@endsection

