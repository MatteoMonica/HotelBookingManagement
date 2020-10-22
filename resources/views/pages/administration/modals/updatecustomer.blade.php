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
                            <label for="update_customer_fiscalcode">Codice fiscale</label>
                            <input type="text" id="update_customer_fiscalcode" name="customerfiscalcode" placeholder="Codice fiscale" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_birthplace">Luogo nascita</label>
                            <input type="text" id="update_customer_birthplace" name="customerbirthplace" placeholder="Luogo nascita" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_birthcity">Provincia nascita</label>
                            <input type="text" id="update_customer_birthcity" name="customerbirthcity" placeholder="Provincia nascita" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_province">Comune nascita</label>
                            <input type="text" id="update_customer_province" name="customerbirthprovince" placeholder="Comune nascita" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_citizenship">Cittadinanza</label>
                            <input type="text" id="update_customer_citizenship" name="customercitizenship" placeholder="Cittadinanza" class="form-control"/>
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
                            <label for="update_customer_documentnumber">Numero documento</label>
                            <input type="text" id="update_customer_documentnumber" name="customerdocumentnumber" placeholder="Numero documento" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_placeofissue">Luogo rilascio</label>
                            <input type="text" id="update_customer_placeofissue" name="customerdocumentplaceofissue" placeholder="Luogo rilascio" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_cityofissue">Comune rilascio</label>
                            <input type="text" id="update_customer_cityofissue" name="customerdocumentcityofissue" placeholder="Comune rilascio" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="update_customer_provinceofissue">Provincia rilascio</label>
                            <input type="text" id="update_customer_provinceofissue" name="customerdocumentprovinceofissue" placeholder="Luogo rilascio" class="form-control"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancella</button>
                        <button id="update_customer_submitform" type="submit" class="btn btn-primary" name="updateCustomer" >Salva</button>
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
