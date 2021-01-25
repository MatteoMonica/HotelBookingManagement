<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;

class LogoutViewController extends Controller
{
    public function showIndex()
    {
        $authController = new AuthController();
        $authController->logout();

        return view('pages.administration.logout');
    }
}
