@extends('layouts.default')

@section('content')
<table class="table table-dark">
    <section style="background-color: rgb(0, 0, 0);">
        <div style="padding-top: 93px; padding-bottom: 93px;">
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <h3 class="text-white">Enter the following data to continue</h3>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>

    <section style="background-color: rgb(255, 255, 255);">
        <div style="padding-top: 93px; padding-bottom: 93px;">
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group">
                            <label for="username">Email address</label>
                            <input type="username" class="form-control" name="username" id="username" placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>

                        <br><br>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb-2 ">Next</button>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>
@stop
