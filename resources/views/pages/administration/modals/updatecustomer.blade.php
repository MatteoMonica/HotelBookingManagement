@if (isset($reservationDetail))
    <!-- Add User details -->
    <div class="modal fade" id="update_customer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <label for="update_customer_first_name">Name</label>
                            <input type="text" id="update_customer_first_name" name="customername"  placeholder="Name" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="update_customer_last_name">Surname</label>
                            <input type="text" id="update_customer_last_name" name="customersurname" placeholder="Surname" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="update_customer_gender">Gender</label>
                            <select class="form-control" name="customergender" id="update_customer_gender" required>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="update_customer_birthdate">Date of birth</label>
                            <input class="form-control" id="update_customer_birthdate" onkeypress="return false;" name="customerbirthdate" required placeholder="Date of birth" type="text"/>
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
                            <label for="update_customer_fiscalcode">Fiscal Code</label>
                            <input type="text" id="update_customer_fiscalcode" name="customerfiscalcode" placeholder="Fiscal Code" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_birthplace">Country of Birth</label>
                            <input type="text" id="update_customer_birthplace" name="customerbirthplace" placeholder="Country of Birth" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_birthcity">Birth City</label>
                            <input type="text" id="update_customer_birthcity" name="customerbirthcity" placeholder="Birth City" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_province">Birth Province</label>
                            <input type="text" id="update_customer_province" name="customerbirthprovince" placeholder="Birth Province" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_citizenship">Citizenship</label>
                            <input type="text" id="update_customer_citizenship" name="customercitizenship" placeholder="Citizenship" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_documenttype">Document Type</label>
                            <select class="form-control" name="customerdocumentType" id="update_customer_documenttype">
                                <option value=""></option>
                                <option value="National ID Card">National ID Card</option>
                                <option value="Passport">Passport</option>
                                <option value="Driving License">Driving License</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_documentnumber">Document Number</label>
                            <input type="text" id="update_customer_documentnumber" name="customerdocumentnumber" placeholder="Document Number" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_placeofissue">Place of Issue</label>
                            <input type="text" id="update_customer_placeofissue" name="customerdocumentplaceofissue" placeholder="Place of Issue" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_cityofissue">City of Issue</label>
                            <input type="text" id="update_customer_cityofissue" name="customerdocumentcityofissue" placeholder="City of Issue" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_provinceofissue">Province of issue</label>
                            <input type="text" id="update_customer_provinceofissue" name="customerdocumentprovinceofissue" placeholder="Province of issue" class="form-control"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="update_customer_submitform" type="submit" class="btn btn-primary" name="updateCustomer" >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateCustomerLoadData(idCustomer) {
            $.ajax({
                type: "GET",
                url: '/customer',
                data: { 'idCustomer': idCustomer },
                success: function(data){
                    var user = JSON.parse(data);

                    user = user[0];

                    console.log(user);

                    // Assing existing values to the modal popup fields
                    $("#update_customer_submitform").prop('value', user.idcustomer);
                    $("#update_customer_first_name").val(user.customername);
                    $("#update_customer_last_name").val(user.customersurname);

                    $("#update_customer_gender option[value='" + user.customergender + "']").prop('selected', true);

                    $("#update_customer_birthdate").val(user.customerbirthdate);
                    $("#update_customer_fiscalcode").val(user.customerfiscalcode);
                    $("#update_customer_birthplace").val(user.customerbirthplace);
                    $("#update_customer_birthcity").val(user.customerbirthcity);
                    $("#update_customer_province").val(user.customerbirthprovince);
                    $("#update_customer_citizenship").val(user.customercitizenship);

                    $("#update_customer_documenttype option[value='" + user.customerdocumentType + "']").prop('selected', true);

                    $("#update_customer_documentnumber").val(user.customerdocumentnumber);
                    $("#update_customer_placeofissue").val(user.customerdocumentplaceofissue);
                    $("#update_customer_cityofissue").val(user.customerdocumentcityofissue);
                    $("#update_customer_provinceofissue").val(user.customerdocumentprovinceofissue);

                    $('#update_customer_modal').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    </script>
@endif
