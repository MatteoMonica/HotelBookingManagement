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
                            <label for="update_first_CF2">Fiscal code</label>
                            <input type="text" id="update_CF" name="customerfiscalcode" placeholder="Fiscal code" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_LNA2">Country of Birth</label>
                            <input type="text" id="update_LNA" name="customerbirthplace" placeholder="Country of Birth" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_PNA2">Birth City</label>
                            <input type="text" id="update_PNA" name="customerbirthcity" placeholder="Birth City" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_CNA2">Birth Province</label>
                            <input type="text" id="update_CNA" name="customerbirthprovince" placeholder="Birth Province" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_CTA2">Citizenship</label>
                            <input type="text" id="update_CTA" name="customercitizenship" placeholder="Citizenship" class="form-control"/>
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
                            <label for="update_DNM2">Document Number</label>
                            <input type="text" id="update_DNM" name="customerdocumentnumber" placeholder="Document Number" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_LRD2">Place of Issue</label>
                            <input type="text" id="update_LRD" name="customerdocumentplaceofissue" placeholder="Place of Issue" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_CRD2">City of Issue</label>
                            <input type="text" id="update_CRD" name="customerdocumentcityofissue" placeholder="City of Issue" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_PRD2">Province of issue</label>
                            <input type="text" id="update_PRD" name="customerdocumentprovinceofissue" placeholder="Province of Issue" class="form-control"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addCustomer" value="{{$reservationDetail->idreservation}}" >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
