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
            <div class="media align-items-stretch justify-content-center">
                <form method="POST" action="{{ route('booksource.books.update', $book->id) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">{{ __('Book title') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$book->name}}" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="release_date">{{ __('E-Mail Address') }}</label>
                            <input id="release_date" type="date" class="form-control @error('release_date') is-invalid @enderror" name="release_date" value="{{$book->release_date}}" autocomplete="release_date">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div>
                                <input type="submit" class="btn btn-primary btn-sm wd-100p wd-sm-30p mg-t-40" value="{{ __('Save') }}">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <form method="DELETE" >
                                <button type="button"  id="delete"  onclick="window.location='{{url('#')}}'"  class="btn btn-primary btn-sm wd-100p wd-sm-30p mg-t-40">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {{ __('Do you want to delete this book?') }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="yes" >YES</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
      
        $("#delete").click(function(){
            $('#exampleModal').modal('show');
        });
        $("#yes").click(function(){ 
            $.ajax({
                url:"{{route('booksource.books.delete', $book->id)}}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id: {{$book->id}},
                },
                method: 'POST',
                success:function(response){
                    $('#exampleModal').modal('hide'); 
                   
                    window.location.href ='{{route('booksource.users')}}';
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
@endsection