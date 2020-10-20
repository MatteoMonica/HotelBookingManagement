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

        if($authController->authenticate($request))
            return redirect('/dashboard');
        else
            return redirect('/login');
    }

    public function showDashboard()
    {
        return view('pages.administration.dashboard');
    }

    public function processDashboard(Request $request)
    {
    }
}
