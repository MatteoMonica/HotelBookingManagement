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
                            <label class="control-label" for="date">Check-in Date</label>
                            <input class="form-control" id="date" name="checkin" placeholder="MM/DD/YYYY" type="text"/>
                            <script>
                                $(document).ready(function(){
                                    var date_input = $('input[name="checkin"]');
                                    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                                    var options = {
                                        format: 'yyyy-mm-dd',
                                        container: container,
                                        todayHighlight: true,
                                        autoclose: true,
                                    };
                                    date_input.datepicker(options);
                                })
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="date">Check-out Date</label>
                            <input class="form-control" id="date" name="checkout" placeholder="MM/DD/YYYY" type="text"/>
                            <script>
                                $(document).ready(function(){
                                    var date_input = $('input[name="checkout"]');
                                    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                                    var options = {
                                        format: 'yyyy-mm-dd',
                                        container: container,
                                        todayHighlight: true,
                                        autoclose: true,
                                    };
                                    date_input.datepicker(options);
                                })
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Email address</label>
                            <input type="email" class="form-control" name="emailAddress" id="emailAddress">
                        </div>
                        <div class="form-group">
                            <label for="treatment">Treatment</label>
                            <select class="form-control" name="treatment" id="treatment">
                                @foreach ($treatments as $item)
                                    <option value="{{$item->idtreatment}}">{{$item->descriptiontreatment}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adults">Number of adults (above 16 years old)</label>
                            <select class="form-control" name="adults" id="adults">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="children">Number of children (8 to 16 years old)</label>
                            <select class="form-control" name="children" id="children">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="newborns">Number of newborns</label>
                            <select class="form-control" name="newborns" id="newborns">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="checked" name="createcustomerarea" id="createcustomerarea">
                            <label class="form-check-label" for="createcustomerarea">
                                Create Customer Area
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="checked" name="gdpr" id="gdpr">
                            <label class="form-check-label" for="gdpr">
                                By continuing the procedure you accept our Terms of Service and our Privacy Policy
                            </label>
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
