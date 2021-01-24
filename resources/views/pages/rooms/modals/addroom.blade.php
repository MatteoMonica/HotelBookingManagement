<div class="modal fade" id="add_room_modal" tabindex="-1" role="dialog" aria-labelledby="add_room_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_room_modal">Add Room Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/manageRooms">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="add_room_name">Name</label>
                        <input type="text" id="add_room_name" name="roomname" placeholder="Name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="add_room_capacity">Capacity</label>
                        <input type="number" id="add_room_capacity" name="roomcapacity" placeholder="Capacity" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="add_room_costpernight">Cost per night</label>
                        <input type="number" step=".01" id="add_room_costpernight" name="roomcostpernight" placeholder="Cost per night" class="form-control" required />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addRoom" value="-1">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
