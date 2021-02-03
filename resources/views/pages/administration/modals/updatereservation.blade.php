@if (isset($reservationDetail))
    <!-- Update Reservation -->
    <div class="modal fade" id="update_res_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateReservationForm" method="POST" action="/dashboard">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_chkin">Check-in</label>
                            <input class="form-control" onkeypress="return false;" value="{{$reservationDetail['checkin']}}" id="update_chkin" name="checkin" placeholder="Check-in" type="text" required/>
                            <script>
                                $(document).ready(function(){
                                    var date_input=$('input[name="checkin"]'); //our date input has the name "date"
                                    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                    var options={
                                        format: 'yyyy-mm-dd',
                                        container: container,
                                        todayHighlight: true,
                                        autoclose: true,
                                    };
                                    date_input.datepicker(options);
                                });
                            </script>
                        </div>

                        <div class="form-group">
                            <label for="update_chkout">Check-out</label>
                            <input class="form-control" id="update_chkout" onkeypress="return false;" value="{{$reservationDetail['checkout']}}" name="checkout" placeholder="Check-out" type="text" required/>
                            <script>
                                $(document).ready(function(){
                                    var date_input=$('input[name="checkout"]'); //our date input has the name "date"
                                    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                    var options={
                                        format: 'yyyy-mm-dd',
                                        container: container,
                                        todayHighlight: true,
                                        autoclose: true,
                                    };
                                    date_input.datepicker(options);
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="treatment">Treatment</label>
                            <select class="form-control" name="treatment" id="treatment" required>
                                @foreach ($treatments as $item)
                                    @if ($item->idtreatment == $reservationDetail['treatment'])
                                        <option value="{{$item->idtreatment}}" selected>{{$item->descriptiontreatment}}</option>
                                    @else
                                        <option value="{{$item->idtreatment}}">{{$item->descriptiontreatment}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bookingstatus">Booking Status</label>
                            <select class="form-control" name="bookingstatus" id="bookingstatus" required>
                                @foreach ($statusReservation as $item)
                                    @if ($item->idstatusreservation == $reservationDetail['bookingstatus'])
                                        <option value="{{$item->idstatusreservation}}" selected>{{$item->descriptionbookingstatus}}</option>
                                    @else
                                        <option value="{{$item->idstatusreservation}}">{{$item->descriptionbookingstatus}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_rec2" class="col-form-label">Contacts</label>
                            <textarea class="form-control" name="contacts" id="add_rec" value="{{$reservationDetail['contacts']}}" required>{{$reservationDetail['contacts']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" name="notes" value="{{$reservationDetail['notes']}}" id="note" rows="3">{{$reservationDetail['notes']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="adults">Number of adults (above 16 years old)</label>
                            <select class="form-control" name="adultsnumber" value="{{$reservationDetail['adultsnumber']}}" id="adults" required>
                                @for ($i = 1; $i < 5; $i++)
                                    @if ($i == $reservationDetail['adultsnumber'])
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="children">Number of children (8 to 16 years old)</label>
                            <select class="form-control" name="kidsnumber" value="{{$reservationDetail['kidsnumber']}}" id="children" required>
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i == $reservationDetail['kidsnumber'])
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="newborns">Number of newborns</label>
                            <select class="form-control" name="newbornnumber" value="{{$reservationDetail['newbornnumber']}}" id="newborns" required>
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i == $reservationDetail['newbornnumber'])
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        <div id="updateReservationErrorDialog" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                            <strong>ERROR!</strong> Check-in / Check-out dates are invalid. Try Again.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="updateReservation" value="{{$reservationDetail['idreservation']}}">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $("#updateReservationForm").on("submit", function(){
                var date1 = $("#update_chkin").val();
                var date2 = $("#update_chkout").val();

                date1 = new Date(date1);
                date2 = new Date(date2);

                date1 = Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate());
                date2 = Date.UTC(date2.getFullYear(), date2.getMonth(), date2.getDate());

                var ms = date2 - date1;
                var result = Math.floor(ms/1000/60/60/24);

                if(result > 0)
                    return true;

                $("#updateReservationErrorDialog").show();
                return false;
            });
        </script>
    </div>
@endif
