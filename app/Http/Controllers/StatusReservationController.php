<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusReservation;

class StatusReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StatusReservation::where([ 'deleted_at' => NULL ])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDStatusreservation)
    {
        return StatusReservation::where(['idstatusreservation' => $IDStatusreservation, 'deleted_at' => NULL])->get();
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

        return StatusReservation::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusReservation  $StatusReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $StatusReservation = StatusReservation::findOrFail($id);
        $StatusReservation->update($request->all());

        return $StatusReservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusReservation  $StatusReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $StatusReservation = StatusReservation::findOrFail($id);
        $StatusReservation->delete();

        return 204;
    }
}
