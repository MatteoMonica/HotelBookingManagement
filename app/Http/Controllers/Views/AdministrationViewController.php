<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
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
        $reservationController = new ReservationController();
        $treatmentController = new TreatmentController();
        $roomController= new RoomController();
        $statusReservationController = new StatusReservationController();

        $treatments = $treatmentController->index();
        $statusReservation = $statusReservationController->index();
        $rooms = $roomController->index();

        $reservations = $reservationController->index();
        return view('pages.administration.dashboard', [ 'reservations' => $reservations, 'treatments' => $treatments, 'statusReservation' => $statusReservation, 'allrooms' => $rooms ]);
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

        if(isset($requestParams['addRoom'])) {
            return $this->addRoom($requestParams);
        }

        if(isset($requestParams['deleteRoom'])) {
            return $this->deleteRoom($requestParams);
        }
    }

    public function loadReservationDetails($requestParams)
    {
        $customerController = new CustomerController();
        $reservationController = new ReservationController();
        $bookingController = new BookingController();
        $treatmentController = new TreatmentController();
        $statusReservationController = new StatusReservationController();
        $roomController = new RoomController();

        $treatments = $treatmentController->index();
        $statusReservation = $statusReservationController->index();
        $reservationDetails = $reservationController->show($requestParams['reservationID']);
        $customers = $customerController->showByReservation($requestParams['reservationID']);
        $rooms = $bookingController->showByReservation($requestParams['reservationID']);
        $allrooms = $roomController->index();

        $reservations = $reservationController->index();
        return view('pages.administration.dashboard', [ 'reservations' => $reservations, 'reservationDetail' => $reservationDetails[0], 'customers' => $customers, 'allrooms' => $allrooms, 'rooms' => $rooms, 'treatments' => $treatments, 'statusReservation' => $statusReservation ]);
    }

    public function addReservation($requestParams)
    {
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

    public function addRoom($requestParams)
    {
        $bookingController = new BookingController();
        $requestParams['reservation'] = $requestParams['addRoom'];

        $bookingController->store($requestParams);

        return $this->showDashboard();
    }

    public function deleteRoom($requestParams)
    {
        $bookingController = new BookingController();

        $bookingController->destroy($requestParams['deleteRoom']);

        return $this->showDashboard();
    }
}
