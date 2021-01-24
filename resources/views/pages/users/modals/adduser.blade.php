<div class="modal fade" id="add_user_modal" tabindex="-1" role="dialog" aria-labelledby="add_user_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_user_modal">Add User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/manageUsers">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="add_user_name">Name</label>
                        <input type="text" id="add_user_name" name="name" placeholder="Name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="add_user_surname">Surname</label>
                        <input type="text" id="add_user_surname" name="surname" placeholder="Surname" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="add_user_email">Email</label>
                        <input type="text" id="add_user_email" name="username" placeholder="Email" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="add_user_password">Password</label>
                        <input type="password" id="add_user_password" name="password" placeholder="Password" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="add_user_role" required>
                            @foreach ($roles as $item)
                                <option value="{{$item->idrole}}">{{$item->descriptionrole}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addUser" value="-1">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
