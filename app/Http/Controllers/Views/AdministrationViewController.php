<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrationViewController extends Controller
{
    public function showIndex()
    {
        return view('pages.administration.index');
    }

    public function processIndex(Request $request)
    {
        $authController = new AuthController();
        var_dump($authController->authenticate($request));
    }
}
