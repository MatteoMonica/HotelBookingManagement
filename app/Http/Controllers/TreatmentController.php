<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Treatment::where([ 'deleted_at' => NULL ])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDTreatment)
    {
        return Treatment::where(['idtreatment' => $IDTreatment, 'deleted_at' => NULL])->get();
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

        return Treatment::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatment  $Treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $Treatment = Treatment::findOrFail($id);
        $Treatment->update($request->all());

        return $Treatment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $Treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Treatment = Treatment::findOrFail($id);
        $Treatment->delete();

        return 204;
    }
}
