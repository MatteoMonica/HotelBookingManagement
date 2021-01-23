<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;

class ManageUsersViewController extends Controller
{
    public function showIndex()
    {
        $usersController = new LoginController();
        $logins = $usersController->index();

        return view('pages.users.index', [ 'logins' => $logins ]);
    }
}
