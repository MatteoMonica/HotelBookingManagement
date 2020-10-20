<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::where([ 'deleted_at' => NULL ])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDbooking)
    {
        return Booking::where(['idbooking' => $IDbooking, 'deleted_at' => NULL])->get();
    }

    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($body)
    {
        return Booking::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $Booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $Booking = Booking::findOrFail($id);
        $Booking->update($request->all());

        return $Booking;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $Booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Booking = Booking::findOrFail($id);
        $Booking->delete();

        return 204;
    }
}
