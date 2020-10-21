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
        <div style="padding-top: 93px;">
            <div class = "float-right pull-right">
                <button onclick="addResModal()" class="btn btn-info">Aggiungi prenotazione</button>
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
                                <td>{{$item->idreservation}}</td>
                                <td>{{$item->idreservation}}</td>
                                <td>{{$item->idreservation}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop
