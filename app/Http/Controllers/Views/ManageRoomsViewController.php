<?php
namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RoomController;

class ManageRoomsViewController extends Controller
{
    public function showIndex()
    {
        $roomsController = new RoomController();
        $rooms = $roomsController->index();

        return view('pages.rooms.index', [ 'rooms' => $rooms ]);
    }

    public function processRequest(Request $request) {
        $requestParams = $request->all();

        if(isset($requestParams["addRoom"])) {
            return $this->addRoom($requestParams);
        }

        if(isset($requestParams["updateRoom"])) {
            return $this->updateRoom($requestParams);
        }

        if(isset($requestParams["deleteRoom"])) {
            return $this->deleteRoom($requestParams);
        }
    }

    public function getRooms(Request $request)
    {
        $roomsController = new RoomController();
        return json_encode($roomsController->show($request->all()['IDRoom']));
    }

    public function addRoom($requestParams)
    {
        $roomController = new RoomController();

        $roomController->store($requestParams);

        return $this->showIndex();
    }

    public function updateRoom($requestParams)
    {
        $roomController = new RoomController();

        $roomController->update($requestParams, $requestParams['updateRoom']);

        return $this->showIndex();
    }

    public function deleteRoom($requestParams)
    {
        $roomController = new RoomController();

        $roomController->destroy($requestParams['deleteRoom']);

        return $this->showIndex();
    }
}
