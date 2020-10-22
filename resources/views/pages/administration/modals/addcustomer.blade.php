@if (isset($reservationDetail))
    <!-- Add User details -->
    <div class="modal fade" id="add_customer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_first_name2">Name</label>
                            <input type="text" id="update_first_name" name="customername"  placeholder="Name" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="update_last_name2">Surname</label>
                            <input type="text" id="update_last_name" name="customersurname" placeholder="Surname" class="form-control" required/>
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
                            <label for="update_datanascita2">Date of birth</label>
                            <input class="form-control" id="update_datanascita" onkeypress="return false;" name="customerbirthdate" required placeholder="Date of birth" type="text"/>
                            <script>
                                $(document).ready(function(){
                                    var date_input=$('input[name="customerbirthdate"]'); //our date input has the name "date"
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
                            <label for="update_first_CF2">Codice fiscale</label>
                            <input type="text" id="update_CF" name="customerfiscalcode" placeholder="Codice fiscale" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_LNA2">Luogo nascita</label>
                            <input type="text" id="update_LNA" name="customerbirthplace" placeholder="Luogo nascita" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_PNA2">Provincia nascita</label>
                            <input type="text" id="update_PNA" name="customerbirthcity" placeholder="Provincia nascita" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_CNA2">Comune nascita</label>
                            <input type="text" id="update_CNA" name="customerbirthprovince" placeholder="Comune nascita" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_CTA2">Cittadinanza</label>
                            <input type="text" id="update_CTA" name="customercitizenship" placeholder="Cittadinanza" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="customergender">Document Type</label>
                            <select class="form-control" name="customerdocumentType" id="customergender">
                                <option value=""></option>
                                <option value="National ID Card">National ID Card</option>
                                <option value="Passport">Passport</option>
                                <option value="Driving License">Driving License</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="update_DNM2">Numero documento</label>
                            <input type="text" id="update_DNM" name="customerdocumentnumber" placeholder="Numero documento" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_LRD2">Luogo rilascio</label>
                            <input type="text" id="update_LRD" name="customerdocumentplaceofissue" placeholder="Luogo rilascio" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_CRD2">Comune rilascio</label>
                            <input type="text" id="update_CRD" name="customerdocumentcityofissue" placeholder="Comune rilascio" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_PRD2">Provincia rilascio</label>
                            <input type="text" id="update_PRD" name="customerdocumentprovinceofissue" placeholder="Luogo rilascio" class="form-control"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancella</button>
                        <button type="submit" class="btn btn-primary" name="addCustomer" value="{{$reservationDetail->idreservation}}" >Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
