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
                    <div class="form-group">
                        <label for="add_chkin2">Check-in</label>
                        <input class="form-control" onkeypress="return false;" id="add_chkin" name="date" placeholder="Check-in" type="text"/>
                        <script>
                            $(document).ready(function(){
                                var date_input=$('input[name="date"]'); //our date input has the name "date"
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
                        <input class="form-control" id="add_chkout" onkeypress="return false;" name="date" placeholder="Check-out" type="text"/>
                        <script>
                            $(document).ready(function(){
                                var date_input=$('input[name="date"]'); //our date input has the name "date"
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
                        <label for="treatment">Treatment</label>
                        <select class="form-control" name="treatment" id="treatment" required>
                            @foreach ($treatments as $item)
                                <option value="{{$item->idtreatment}}">{{$item->descriptiontreatment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="add_rec2" class="col-form-label">Recapiti:</label>
                        <textarea class="form-control" id="add_rec"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="add_NA2">Numero adulti</label>
                        <input type="text" id="add_NA" placeholder="Numero adulti" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="add_NB2">Numero bambini</label>
                        <input type="text" id="add_NB" placeholder="Numero bambini" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="add_NN2">Numero neonati</label>
                        <input type="text" id="add_NN" placeholder="Numero neonati" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="add_log2" class="col-form-label">Note:</label>
                        <textarea class="form-control" id="add_log"></textarea>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            Dashboard access credentials
                        </div>
                        <div class="card-body">
                            <label for="add_NA2">Username</label>
                            <input type="text" id="add_usr" placeholder="Username" class="form-control"/>
                            <label for="add_NA2">Password</label>
                            <input type="password" id="add_pwd" placeholder="Password" class="form-control"/>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancella</button>
                    <button type="button" class="btn btn-primary" onclick="addRes()" >Salva</button>
                </div>
            </div>
        </div>
    </div>
