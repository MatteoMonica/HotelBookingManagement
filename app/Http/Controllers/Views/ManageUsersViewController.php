<?php
namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;

class ManageUsersViewController extends Controller
{
    public function showIndex()
    {
        $usersController = new LoginController();
        $logins = $usersController->index();

        $rolesController = new RoleController();
        $roles = $rolesController->index();

        return view('pages.users.index', [ 'roles' => $roles, 'logins' => $logins ]);
    }

    public function processRequest(Request $request) {
        $requestParams = $request->all();

        if(isset($requestParams["addUser"])) {
            return $this->addUser($requestParams);
        }

        if(isset($requestParams["updateUser"])) {
            return $this->updateUser($requestParams);
        }

        if(isset($requestParams["deleteUser"])) {
            return $this->deleteUser($requestParams);
        }
    }

    public function getUser(Request $request)
    {
        $loginController = new LoginController();
        return json_encode($loginController->show($request->all()['IDUser']));
    }

    public function addUser($requestParams)
    {
        $userController = new LoginController();

        if(isset($requestParams['password']) && $requestParams['password'] != "") {
            $requestParams['password'] = bcrypt($requestParams['password']);
        } else {
            unset($requestParams['password']);
        }

        $userController->store($requestParams);

        return $this->showIndex();
    }

    public function updateUser($requestParams)
    {
        $userController = new LoginController();

        if(isset($requestParams['password']) && $requestParams['password'] != "") {
            $requestParams['password'] = bcrypt($requestParams['password']);
        } else {
            unset($requestParams['password']);
        }

        $userController->update($requestParams, $requestParams['updateUser']);

        return $this->showIndex();
    }

    public function deleteUser($requestParams)
    {
        $userController = new LoginController();

        $userController->destroy($requestParams['deleteUser']);

        return $this->showIndex();
    }
}
