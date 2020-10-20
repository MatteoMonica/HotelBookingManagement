@extends('layouts.default')

@section('content')
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
        <div style="padding-top: 93px; padding-bottom: 93px;">
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form method="POST" action="/reservation/rooms">
                        @csrf

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Room name</th>
                                <th scope="col">Room capacity</th>
                                <th scope="col">Room cost per night</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($availableRooms as $item)
                                    <tr>
                                        <td>{{$item->roomname}}</td>
                                        <td>{{$item->roomcapacity}}</td>
                                        <td>€ {{$item->roomcostpernight}}</td>
                                        <td>
                                            @if (in_array($item->idroom, $selectedRooms))
                                                <button type="submit" name="removeRoom" value="{{$item->idroom}}" class="btn btn-danger mb-2 ">Remove</button>
                                            @else
                                                <button type="submit" name="chosenRoom" value="{{$item->idroom}}" class="btn btn-primary mb-2 ">Add</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb-2 ">Next</button>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>
@stop
