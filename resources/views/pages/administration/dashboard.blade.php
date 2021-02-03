@extends('layouts.default')

@section('content')
    <div class="card" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
        <h5 class="card-header">Reservations List</h5>
        <div class="card-body">
            <section style="background-color: rgb(255, 255, 255);">
                <form method="POST" action="">
                    @csrf

                    <div>
                        @if (Auth::user()->role == 1)
                            <div class = "float-right pull-right" style="padding-bottom: 30px">
                                <button type="button" onclick="$('#add_res_modal').modal('show');" class="btn btn-info">Add Reservation</button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Reference</th>
                                        <th scope="col">Check-in</th>
                                        <th scope="col">Check-out</th>
                                        <th scope="col">Treatment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Contact details</th>
                                        <th scope="col">Number of adults</th>
                                        <th scope="col">Number of children</th>
                                        <th scope="col">Number of babies</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Select</th>
                                        @if (Auth::user()->role == 1)
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $item)
                                        <tr>
                                            <th scope="row">{{$item->idreservation}}</th>
                                            <td>{{$item->checkin}}</td>
                                            <td>{{$item->checkout}}</td>
                                            <td>{{$item->descriptiontreatment}}</td>
                                            <td>{{$item->descriptionbookingstatus}}</td>
                                            <td>{{$item->contacts}}</td>
                                            <td>{{$item->adultsnumber}}</td>
                                            <td>{{$item->kidsnumber}}</td>
                                            <td>{{$item->newbornnumber}}</td>
                                            <td>{{$item->notes}}</td>
                                            <td><button type="submit" name="reservationID" value="{{$item->idreservation}}" class="btn btn-success">Select</button></td>
                                            @if (Auth::user()->role == 1)
                                                <td><button type="button" onclick="$('#update_res_modal').modal('show');" class="btn btn-warning">Edit</button></td>
                                                <td><button type="submit" name="deleteReservation" value="{{$item->idreservation}}" class="btn btn-danger">Delete</button></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    @if (isset($customers))
        <div class="card" style="margin-top: 150px; margin-left: 10px; margin-right: 10px;">
            <h5 class="card-header">Reservation Details</h5>
            <div class="card-body">
                <section style="background-color: rgb(255, 255, 255);">
                    <form method="POST" action="">
                        @csrf

                        <div>
                            @if (Auth::user()->role == 1)
                                <div class = "float-right pull-right" style="padding-bottom: 30px">
                                    <button type="button" onclick="$('#add_customer_modal').modal('show');" class="btn btn-info">Add Customer</button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Reference</th>
                                            <th>First name</th>
                                            <th>Surname</th>
                                            <th>Gender</th>
                                            <th>Date of birth</th>
                                            <th>Fiscal Code</th>
                                            <th>Country of Birth</th>
                                            <th>Birth City</th>
                                            <th>Birth Province</th>
                                            <th>Citizenship</th>
                                            <th>Document type</th>
                                            <th>Document number</th>
                                            <th>Place of issue</th>
                                            <th>Municipality of release</th>
                                            <th>Province of issue</th>
                                            @if (Auth::user()->role == 1)
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $item)
                                            <tr>
                                                <th scope="row">{{$item->idcustomer}}</th>
                                                <td>{{$item->customername}}</td>
                                                <td>{{$item->customersurname}}</td>
                                                <td>{{$item->customergender}}</td>
                                                <td>{{$item->customerbirthdate}}</td>
                                                <td>{{$item->customerfiscalcode}}</td>
                                                <td>{{$item->customerbirthplace}}</td>
                                                <td>{{$item->customerbirthcity}}</td>
                                                <td>{{$item->customerbirthprovince}}</td>
                                                <td>{{$item->customercitizenship}}</td>
                                                <td>{{$item->customerdocumentType}}</td>
                                                <td>{{$item->customerdocumentnumber}}</td>
                                                <td>{{$item->customerdocumentplaceofissue}}</td>
                                                <td>{{$item->customerdocumentcityofissue}}</td>
                                                <td>{{$item->customerdocumentprovinceofissue}}</td>
                                                @if (Auth::user()->role == 1)
                                                    <td><button type="button" onclick="updateCustomerLoadData({{$item->idcustomer}});" class="btn btn-warning">Edit</button></td>
                                                    <td><button type="submit" name="deleteCustomer" value="{{$item->idcustomer}}" class="btn btn-danger">Delete</button></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </section>

                <section style="background-color: rgb(255, 255, 255);">
                    <form method="POST" action="">
                        @csrf

                        <div style="padding-top: 50px;">
                            @if (Auth::user()->role == 1)
                                <div class = "float-right pull-right" style="padding-bottom: 30px">
                                    <button type="button" onclick="$('#add_room_modal').modal('show');" class="btn btn-info">Add Room</button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            @if (Auth::user()->role == 1)
                                                <th>Delete</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $item)
                                            <tr>
                                                <th scope="row">{{$item->idroom}}</th>
                                                <td>{{$item->roomname}}</td>
                                                <td>{{$item->roomcapacity}}</td>
                                                <td>{{$item->roomcostpernight}}</td>
                                                @if (Auth::user()->role == 1)
                                                    <td><button type="submit" name="deleteRoom" value="{{$reservationDetail["idreservation"]}}.{{$item->idroom}}" class="btn btn-danger">Delete</button></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    @endif

    @include('pages.administration.modals.addreservation')

    @if (isset($reservationDetail) && Auth::user()->role == 1)
        @include('pages.administration.modals.updatereservation')
        @include('pages.administration.modals.addcustomer')
        @include('pages.administration.modals.updatecustomer')
        @include('pages.administration.modals.addroom')
    @endif
@stop
