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
                <form method="POST" action="{{ route('booksource.authors.update', $author->id) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">{{ __('Author Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$author->name}}" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="release_date">{{ __('E-Mail Address') }}</label>
                            <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{$author->age}}" autocomplete="age">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">{{ __('Author Address') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$author->address}}" required autocomplete="address" autofocus>
                            @error('address')
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
                url:"{{route('booksource.authors.delete', $author->id)}}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id: {{$author->id}},
                },
                method: 'POST',
                success:function(response){
                    $('#exampleModal').modal('hide'); 
                   
                    window.location.href ='{{route('booksource.authors')}}';
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