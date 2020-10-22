<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\StatusReservationController;
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
        $treatmentController = new TreatmentController();
        $statusReservationController = new StatusReservationController();

        $user = $loginController->show($authController->getIDUser());
        $treatments = $treatmentController->index();
        $statusReservation = $statusReservationController->index();

        if($user[0]['role'] == 1) {
            $reservations = $reservationController->index();
            return view('pages.administration.dashboard', [ 'reservations' => $reservations, 'treatments' => $treatments, 'statusReservation' => $statusReservation ]);
        } else {
            $reservations = $reservationController->indexNonAdmin($authController->getIDUser());
            return view('pages.administration.dashboard', [ 'reservations' => $reservations, 'treatments' => $treatments, 'statusReservation' => $statusReservation ]);
        }
    }

    public function processDashboard(Request $request)
    {
        $requestParams = $request->all();

        if(isset($requestParams['reservationID'])) {
            return $this->loadReservationDetails($requestParams);
        }

        if(isset($requestParams['addReservation'])) {
            return $this->addReservation($requestParams);
        }

        if(isset($requestParams['updateReservation'])) {
            return $this->updateReservation($requestParams);
        }

        if(isset($requestParams['deleteReservation'])) {
            return $this->deleteReservation($requestParams['deleteReservation']);
        }

        if(isset($requestParams['addCustomer'])) {
            return $this->addCustomer($requestParams);
        }

        if(isset($requestParams['updateCustomer'])) {
            return $this->updateCustomer($requestParams);
        }

        if(isset($requestParams['deleteCustomer'])) {
            return $this->deleteCustomer($requestParams);
        }
    }

    public function loadReservationDetails($requestParams)
    {
        $customerController = new CustomerController();
        $loginController = new LoginController();
        $reservationController = new ReservationController();
        $bookingController = new BookingController();
        $authController = new AuthController();
        $treatmentController = new TreatmentController();
        $statusReservationController = new StatusReservationController();

        $treatments = $treatmentController->index();
        $statusReservation = $statusReservationController->index();
        $reservationDetails = $reservationController->show($requestParams['reservationID']);
        $customers = $customerController->showByReservation($requestParams['reservationID']);
        $rooms = $bookingController->showByReservation($requestParams['reservationID']);

        $user = $loginController->show($authController->getIDUser());

        if($user[0]['role'] == 1) {
            $reservations = $reservationController->index();
            return view('pages.administration.dashboard', [ 'reservations' => $reservations, 'reservationDetail' => $reservationDetails[0], 'customers' => $customers, 'rooms' => $rooms, 'treatments' => $treatments, 'statusReservation' => $statusReservation ]);
        } else {
            $reservations = $reservationController->indexNonAdmin($authController->getIDUser());
            return view('pages.administration.dashboard', [ 'reservations' => $reservations, 'reservationDetail' => $reservationDetails[0], 'customers' => $customers, 'rooms' => $rooms, 'treatments' => $treatments, 'statusReservation' => $statusReservation ]);
        }
    }

    public function addReservation($requestParams)
    {
        if(isset($requestParams['username']) && isset($requestParams['password'])) {
            $requestParams['role'] = 2;
            $requestParams['password'] = bcrypt($requestParams['password']);

            $loginController = new LoginController();
            $login = $loginController->store($requestParams);
            $requestParams['login'] = $login['idlogin'];
        }

        $reservationController = new ReservationController();
        $reservationController->store($requestParams);

        return $this->showDashboard();
    }

    public function updateReservation($requestParams)
    {
        $reservationController = new ReservationController();
        $reservationController->update($requestParams, $requestParams['updateReservation']);

        return $this->showDashboard();
    }

    public function deleteReservation($requestParams)
    {
        $reservationController = new ReservationController();
        $reservationController->destroy($requestParams);

        return $this->showDashboard();
    }

    public function addCustomer($requestParams)
    {
        $customerController = new CustomerController();
        $requestParams['reservation'] = $requestParams['addCustomer'];

        $customerController->store($requestParams);

        return $this->showDashboard();
    }

    public function getCustomer(Request $request)
    {
        $customerController = new CustomerController();

        return json_encode($customerController->show($request->all()['idCustomer']));
    }

    public function updateCustomer($requestParams)
    {
        $customerController = new CustomerController();

        $customerController->update($requestParams, $requestParams['updateCustomer']);

        return $this->showDashboard();
    }

    public function deleteCustomer($requestParams)
    {
        $customerController = new CustomerController();

        $customerController->destroy($requestParams['deleteCustomer']);

        return $this->showDashboard();
    }
}
