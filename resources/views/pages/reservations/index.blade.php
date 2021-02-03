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
                    <form id="form" method="POST" action="">
                        @csrf

                        <div class="form-group">
                            <label class="control-label" for="checkindate">Check-in Date</label>
                            <input class="form-control" id="checkindate" name="checkin" placeholder="YYYY-MM-DD" type="text" required/>
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
                            <label class="control-label" for="checkoutdate">Check-out Date</label>
                            <input class="form-control" id="checkoutdate" name="checkout" placeholder="YYYY-MM-DD" type="text" required/>
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
                            <input type="email" class="form-control" name="emailAddress" id="emailAddress" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="treatment">Treatment</label>
                            <select class="form-control" name="treatment" id="treatment" required>
                                @foreach ($treatments as $item)
                                    <option value="{{$item->idtreatment}}">{{$item->descriptiontreatment}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adults">Number of adults (above 16 years old)</label>
                            <select class="form-control" name="adultsnumber" id="adults" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="children">Number of children (8 to 16 years old)</label>
                            <select class="form-control" name="kidsnumber" id="children" required>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="newborns">Number of newborns</label>
                            <select class="form-control" name="newbornnumber" id="newborns" required>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="checked" name="gdpr" id="gdpr" required>
                            <label class="form-check-label" for="gdpr">
                                By continuing the procedure you accept our Terms of Service and our Privacy Policy
                            </label>
                        </div>
                        <br><br>
                        <div id="errorDialog" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                            <strong>ERROR!</strong> Check-in / Check-out dates are invalid. Try Again.
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb-2 ">Next</button>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>

    <script>
        $("#form").on("submit", function(){
            var date1 = $("#checkindate").val();
            var date2 = $("#checkoutdate").val();

            date1 = new Date(date1);
            date2 = new Date(date2);

            date1 = Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate());
            date2 = Date.UTC(date2.getFullYear(), date2.getMonth(), date2.getDate());

            var ms = date2 - date1;
            var result = Math.floor(ms/1000/60/60/24);

            if(result > 0)
                return true;

            $("#errorDialog").show();
            return false;
        });
    </script>
@stop
