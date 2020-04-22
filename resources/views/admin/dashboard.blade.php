@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in as Admin!
                    </div>
                </div>
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
                                        Naziv posta</label>
                                    <input type="text"
                                           class="form-control"
                                           id="title"
                                           name="title"
                                           placeholder="Unesi naziv posta..."
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message">
                                        Tekst posta</label>
                                    <textarea name="body"
                                              id="body"
                                              class="form-control"
                                              rows="9"
                                              cols="25"
                                              placeholder="Unesi tekst posta..."></textarea>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="submit" value="submit" id="submit" class="btn btn-black w-100"
                                            name="submit">Snimi post</button>
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
