<?php
namespace App\Http\Controllers\Views;

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
}
