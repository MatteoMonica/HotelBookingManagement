@extends('layouts.default')

@section('content')
    <section style="background-color: rgb(255, 255, 255);">
        <div style="padding-top: 93px; padding-bottom: 93px;">
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form method="POST" action="">
                        @csrf
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>
@stop
