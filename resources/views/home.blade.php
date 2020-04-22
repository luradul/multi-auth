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

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Ime i Prezime</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Vase ime..."
                                >
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email"
                                           class="form-control"
                                           id="email"
                                           name="email"
                                           placeholder="Email adresa..."
                                    >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message">
                                    Poruka</label>
                                <textarea name="message"
                                          id="message"
                                          class="form-control"
                                          rows="9"
                                          cols="25"
                                          placeholder="Poruka..."></textarea>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-btn">
                                <button type="submit" value="submit" id="submit" class="btn btn-black w-100"
                                        name="submit">Pošalji poruku</button>
                            </div>
                            <div class="form__output"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
