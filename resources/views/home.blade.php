@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="welcome-title">
                        Welcome to Booksource {{Auth::user()->name}}
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 10px"></div>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('booksource.index') }}">
                        <div class="card dashboard-card">
                            <div class="card-body dashboard-card-body tx-center">
                                <i data-feather="clock" class="tx-warning-f mg-b-15"></i>
                                <h6 class="tx-rubik tx-uppercase tx-warning-f mg-b-0">{{ __('Show Authors & Books') }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @if(Auth::user()->role == 'admin')
                    <div class="col-md-3">
                        <a href="{{ route('booksource.insert') }}">
                            <div class="card dashboard-card">
                                <div class="card-body dashboard-card-body tx-center">
                                    <i data-feather="clock" class="tx-warning-f mg-b-15"></i>
                                    <h6 class="tx-rubik tx-uppercase tx-warning-f mg-b-0">{{ __('Add Authors & Books') }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('booksource.users') }}">
                            <div class="card dashboard-card">
                                <div class="card-body dashboard-card-body tx-center">
                                    <i data-feather="clock" class="tx-warning-f mg-b-15"></i>
                                    <h6 class="tx-rubik tx-uppercase tx-warning-f mg-b-0">{{ __('Show All Users') }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('booksource.user.add') }}">
                            <div class="card dashboard-card">
                                <div class="card-body dashboard-card-body tx-center">
                                    <h6 class="tx-rubik tx-uppercase tx-warning-f mg-b-0">{{ __('Add New User') }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
