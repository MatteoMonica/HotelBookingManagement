<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Room::where([ 'deleted_at' => NULL ])->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAvailableRooms(string $checkin, string $checkout)
    {
        $rooms = DB::select("SELECT DISTINCT room.* FROM rooms room WHERE room.idroom NOT IN (SELECT room2.idroom FROM rooms room2 INNER JOIN booking book ON book.room = room2.idroom INNER JOIN reservations reservation ON book.reservation = reservation.idreservation WHERE (reservation.checkin BETWEEN ? AND ?) OR (reservation.checkout BETWEEN ? AND ?))", [$checkin, $checkout, $checkin, $checkout]);

        return $rooms;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDroom)
    {
        return Room::where(['idroom' => $IDroom, 'deleted_at' => NULL])->get();
    }

    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $body = $request->all();

        return Room::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $Room = Room::findOrFail($id);
        $Room->update($request->all());

        return $Room;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Room = Room::findOrFail($id);
        $Room->delete();

        return 204;
    }
}
