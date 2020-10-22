<div class="modal fade" id="add_customer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add room to a reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/dashboard">
                @csrf
                <div class="form-group">
                    <label for="rooms">Rooms</label>
                    <select class="form-control" name="room" id="rooms" required>
                        @foreach ($rooms as $item)
                            <option value="{{$item->idroom}}">{{$item->roomname . ' - ' . $item->roomcapacity . ' PAX'}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addRoom" value="true">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

