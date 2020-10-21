<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
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
        $loginController = new LoginController();
        $reservationController = new ReservationController();
        $authController = new AuthController();

        $user = $loginController->show($authController->getIDUser());

        if($user[0]['role'] == 1) {
            $reservations = $reservationController->index();
            return view('pages.administration.dashboard', [ 'reservations' => $reservations ]);
        } else {
            $reservations = $reservationController->indexNonAdmin($authController->getIDUser());
            return view('pages.administration.dashboard', [ 'reservations' => $reservations ]);
        }
    }

    public function processDashboard(Request $request)
    {
    }
}
