@extends('layouts.default')

@section('content')
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
                    <form method="POST" action="/reservation/customers">
                        @csrf

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100">{{$percentage}}%</div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label for="customername">Name</label>
                            <input type="text" class="form-control" name="customername" id="customername" required>
                        </div>
                        <div class="form-group">
                            <label for="customersurname">Surname</label>
                            <input type="text" class="form-control" name="customersurname" id="customersurname" required>
                        </div>
                        <div class="form-group">
                            <label for="customergender">Gender</label>
                            <select class="form-control" name="customergender" id="customergender" required>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="customerbirthdate">Birthdate</label>
                            <input class="form-control" id="customerbirthdate" name="customerbirthdate" placeholder="YYYY-MM-DD" type="text" required/>
                            <script>
                                $(document).ready(function(){
                                    var date_input = $('input[name="customerbirthdate"]');
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
