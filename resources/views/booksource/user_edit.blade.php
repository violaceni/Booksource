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
                <form method="POST" action="{{ route('booksource.user.update', $user->id) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-4">
                            <label for="name">{{ __('First Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" disabled autocomplete="email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-lg-4">
                            <label for="role">{{ __('Role') }}</label>
                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{$user->role}}" autocomplete="role">
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" value = "{{$user->password}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
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
                @if($user->id != Auth::user()->id)
                    <div class="modal-body">
                        {{ __('Do you want to delete this user?') }}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @else
                    <div class="modal-body">
                        {{ __('A profile record is related to this user. If you delete this user the profile will be lost.
                         Do you want to delete this user?') }}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
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
                url:"{{route('booksource.user.delete', $user->id)}}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id: {{$user->id}},
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