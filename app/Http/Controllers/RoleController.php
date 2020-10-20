<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::where([ 'deleted_at' => NULL ])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aziende  $aziende
     * @return \Illuminate\Http\Response
     */
    public function show(int $IDrole)
    {
        return Role::where(['idrole' => $IDrole, 'deleted_at' => NULL])->get();
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

        return Role::create($body);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $Role = Role::findOrFail($id);
        $Role->update($request->all());

        return $Role;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $Role = Role::findOrFail($id);
        $Role->delete();

        return 204;
    }
}
