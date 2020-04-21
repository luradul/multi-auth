@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as a regular user!
                </div>
            </div>
            @can('has-monthly-access')
                <div class="btn btn-success btn-lg">
                    You have access as monthly subscriber!
                </div>
            @elsecan('has-yearly-access')
                <div class="btn btn-warning btn-lg">
                    You have access as yearly subscriber!
                </div>
            @elsecan('has-premium-access')
                <div class="btn btn-primary btn-lg">
                    You have access as premium subscriber!
                </div>
            @else
                <div class="btn btn-info btn-lg">
                    You don't have subscription!
                </div>
            @endcan
        </div>

    </div>
</div>
@endsection
