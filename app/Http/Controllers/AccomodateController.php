<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accomodate;

class AccomodateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Accomodate::where([ 'deleted_at' => NULL ])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDaccomodate)
    {
        return Accomodate::where(['idaccomodate' => $IDaccomodate, 'deleted_at' => NULL])->get();
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

        return Accomodate::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accomodate  $Accomodate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $Accomodate = Accomodate::findOrFail($id);
        $Accomodate->update($request->all());

        return $Accomodate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accomodate  $Accomodate
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Accomodate = Accomodate::findOrFail($id);
        $Accomodate->delete();

        return 204;
    }
}
