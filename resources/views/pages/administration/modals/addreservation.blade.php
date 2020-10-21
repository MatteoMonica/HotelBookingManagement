    <!-- Add Reservation -->
    <div class="modal fade" id="add_res_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="add_chkin2">Check-in</label>
                                <input class="form-control" onkeypress="return false;" id="add_chkin" name="checkin" placeholder="Check-in" type="text" required/>
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
                            <label for="add_chkout2">Check-out</label>
                            <input class="form-control" id="add_chkout" onkeypress="return false;" name="checkout" placeholder="Check-out" type="text" required/>
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
                                    <option value="{{$item->idtreatment}}">{{$item->descriptiontreatment}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bookingstatus">Booking Status</label>
                            <select class="form-control" name="bookingstatus" id="bookingstatus" required>
                                @foreach ($statusReservation as $item)
                                    <option value="{{$item->idstatusreservation}}">{{$item->descriptionbookingstatus}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_rec2" class="col-form-label">Contacts</label>
                            <textarea class="form-control" name="contacts" id="add_rec" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" name="notes" id="note" rows="3"></textarea>
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
                        <div class="card">
                            <div class="card-header">
                                Dashboard access credentials
                            </div>
                            <div class="card-body">
                                <label for="add_NA2">Username</label>
                                <input type="text" name="username" id="add_usr" placeholder="Username" class="form-control"/>
                                <label for="add_NA2">Password</label>
                                <input type="password" name="password" id="add_pwd" placeholder="Password" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addReservation" value="true">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
