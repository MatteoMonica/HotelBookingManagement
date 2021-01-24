<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservation::join('treatments', 'treatments.idtreatment', '=', 'reservations.treatment')
            ->join('statusreservation', 'statusreservation.idstatusreservation', '=', 'reservations.bookingstatus')
            ->where([ 'reservations.deleted_at' => NULL ])->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNonAdmin($idUser)
    {
        return Reservation::join('treatments', 'treatments.idtreatment', '=', 'reservations.treatment')
            ->join('statusreservation', 'statusreservation.idstatusreservation', '=', 'reservations.bookingstatus')
            ->where([ 'reservations.deleted_at' => NULL ])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDreservation)
    {
        return Reservation::where(['idreservation' => $IDreservation, 'deleted_at' => NULL])->get();
    }

    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($body)
    {
        return Reservation::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $Reservation
     * @return \Illuminate\Http\Response
     */
    public function update($body, int $id)
    {
        $Reservation = Reservation::findOrFail($id);
        $Reservation->update($body);

        return $Reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $Reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Reservation = Reservation::findOrFail($id);
        $Reservation->delete();

        return 204;
    }
}
