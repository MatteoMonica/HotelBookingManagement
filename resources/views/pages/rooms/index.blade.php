@extends('layouts.default')

@section('content')
    <div class="card" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
        <h5 class="card-header">Rooms Management</h5>
        <div class="card-body">
            <section style="background-color: rgb(255, 255, 255);">
                <form method="POST" action="">
                    @csrf

                    <div>
                        @if (Auth::user()->role == 1)
                            <div class = "float-right pull-right" style="padding-bottom: 30px">
                                <button type="button" onclick="openAddModal()" class="btn btn-info">Add Room</button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Capacity</th>
                                        <th scope="col">Cost per night</th>
                                        @if (Auth::user()->role == 1)
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
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
                                                <td><button type="button" onclick="openUpdateModal({{$item->idroom}})" class="btn btn-warning">Edit</button></td>
                                                <td><button type="submit" name="deleteRoom" value="{{$item->idroom}}" class="btn btn-danger">Delete</button></td>
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

    @if (Auth::user()->role == 1)
        @include('pages.rooms.modals.updateroom')
        @include('pages.rooms.modals.addroom')

        <script>
            function openUpdateModal(IDRoom) {
                $.ajax({
                    type: "GET",
                    url: '/rooms',
                    data: { 'IDRoom': IDRoom },
                    success: function(data){
                        var room = JSON.parse(data);
                        room = room[0];

                        // Assing existing values to the modal popup fields
                        $("#update_room_submit_form").prop('value', room.idroom);
                        $("#update_room_name").val(room.roomname);
                        $("#update_room_capacity").val(room.roomcapacity);
                        $("#update_room_costpernight").val(room.roomcostpernight);

                        $('#update_room_modal').modal('show');
                    },
                    error: function(error){
                        console.log(error);

                        $('#update_room_modal').modal('show');
                    }
                });
            }

            function openAddModal() {
                $('#add_room_modal').modal('show');
            }
        </script>
    @endif
@stop
