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
        <form method="POST" action="">
            @csrf

            <div style="padding-top: 50px;">
                <div class = "float-right pull-right">
                    <button onclick="addResModal()" class="btn btn-info">Add Reservation</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Reference</th>
                                <th scope="col">Check-in</th>
                                <th scope="col">Check-out</th>
                                <th scope="col">Treatment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Editable data</th>
                                <th scope="col">Contact details</th>
                                <th scope="col">Number of adults</th>
                                <th scope="col">Number of children</th>
                                <th scope="col">Number of babies</th>
                                <th scope="col">Note</th>
                                <th scope="col">Select</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
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
                                    <td>{{$item->editabledata}}</td>
                                    <td>{{$item->contacts}}</td>
                                    <td>{{$item->adultsnumber}}</td>
                                    <td>{{$item->kidsnumber}}</td>
                                    <td>{{$item->newbornnumber}}</td>
                                    <td>{{$item->notes}}</td>
                                    <td><button type="submit" name="reservationID" value="{{$item->idreservation}}" class="btn btn-success">Select</button></td>
                                    <td><button type="submit" name="reservationID" value="{{$item->idreservation}}" class="btn btn-warning">Edit</button></td>
                                    <td><button type="submit" name="reservationID" value="{{$item->idreservation}}" class="btn btn-danger">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>

    @if (isset($customers))
        <section style="background-color: rgb(255, 255, 255);">
            <form method="POST" action="">
                @csrf

                <div style="padding-top: 50px;">
                    <div class = "float-right pull-right" style="padding-bottom: 30px">
                        <button onclick="addResModal()" class="btn btn-info">Add Customer</button>
                    </div>
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
                                    <th>Birth place</th>
                                    <th>Birthplace</th>
                                    <th>County of birth</th>
                                    <th>Citizenship</th>
                                    <th>Document type</th>
                                    <th>Document number</th>
                                    <th>Place of issue</th>
                                    <th>Municipality of release</th>
                                    <th>Province of issue</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                        <td><button type="button" value="{{$item->idreservation}}" class="btn btn-warning">Edit</button></td>
                                        <td><button type="button" value="{{$item->idreservation}}" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </section>
    @endif
@stop
