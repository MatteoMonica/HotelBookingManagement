@extends('layouts.default')

@section('content')
    <div class="card" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
        <h5 class="card-header">Users Management</h5>
        <div class="card-body">
            <section style="background-color: rgb(255, 255, 255);">
                <form method="POST" action="">
                    @csrf

                    <div>
                        @if (Auth::user()->role == 1)
                            <div class = "float-right pull-right" style="padding-bottom: 30px">
                                <button type="button" onclick="openAddModal()" class="btn btn-info">Add User</button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Email</th>
                                        @if (Auth::user()->role == 1)
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logins as $item)
                                        <tr>
                                            <th scope="row">{{$item->idlogin}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->surname}}</td>
                                            <td>{{$item->username}}</td>
                                            @if (Auth::user()->role == 1)
                                                <td><button type="button" onclick="openUpdateModal({{$item->idlogin}})" class="btn btn-warning">Edit</button></td>
                                                <td><button type="submit" name="deleteUser" value="{{$item->idlogin}}" class="btn btn-danger">Delete</button></td>
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
        @include('pages.users.modals.adduser')
        @include('pages.users.modals.updateuser')

        <script>
            function openUpdateModal(IDUser) {
                $.ajax({
                    type: "GET",
                    url: '/users',
                    data: { 'IDUser': IDUser },
                    success: function(data){
                        var user = JSON.parse(data);
                        user = user[0];

                        // Assing existing values to the modal popup fields
                        $("#update_user_submit_form").prop('value', user.idlogin);
                        $("#update_user_name").val(user.name);
                        $("#update_user_surname").val(user.surname);
                        $("#update_user_email").val(user.username);

                        $("#update_user_role option[value='" + user.role + "']").prop('selected', true);

                        $('#update_user_modal').modal('show');
                    },
                    error: function(error){
                        console.log(error);

                        $('#update_user_modal').modal('show');
                    }
                });
            }

            function openAddModal() {
                $('#add_user_modal').modal('show');
            }
        </script>
    @endif
@stop
