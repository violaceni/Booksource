@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
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
    <form method="POST" action="{{ route('booksource.store') }}">
        {{ csrf_field() }}
        <div class="col-sm-12 center">
            {{-- <div class="form-title">Author Details</div> --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">{{__('Author Full Name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" required placeholder=" Author Full Name">
                    </div>
                    <div class="col-sm-3">
                        <label for="age">{{__('Age')}}</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age')}}" required placeholder="Author Age">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <label for="address">{{__('Full Address')}}</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address')}}" required placeholder=" Author Full Address">
                    </div>
                </div>
            </div>
            {{-- <div class="form-title">Book Details</div> --}}
            <div class="form-group">   
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">{{__('Book Title')}}</label>
                        <input type="text" class="form-control" id="name" name="book_name" value="{{ old('book_name')}}"  placeholder=" Book Title">
                    </div>
                    <div class="col-sm-3">
                        <label for="release_date">{{__('Release Date')}}</label>
                        <input type="date" class="form-control" id="name" name="release_date" value="{{ old('release_date')}}"  placeholder=" Book Release Date">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary save-button">{{__('Save record')}}</button>
        </div>
    </form>
</div>
@endsection