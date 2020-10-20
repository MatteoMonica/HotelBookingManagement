<?php
namespace App\Http\Controllers\Views;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationViewController extends Controller
{
    public function showIndex()
    {
        $treatmentController = new TreatmentController();
        $treatments = $treatmentController->index();

        return view('pages.reservations.index', [ 'treatments' => $treatments ]);
    }

    public function processIndex(Request $request)
    {
        $requestParams = $request->all();
        session(['generalReservationItems' => $requestParams]);

        $roomController = new RoomController();
        $availableRooms = $roomController->indexAvailableRooms($requestParams['checkin'], $requestParams['checkout']);

        return view('pages.reservations.rooms', [ 'availableRooms' => $availableRooms, 'selectedRooms' => [] ]);
    }

    public function processRooms(Request $request)
    {
        $oldRequestParams = session('generalReservationItems');

        $roomController = new RoomController();
        $availableRooms = $roomController->indexAvailableRooms($oldRequestParams['checkin'], $oldRequestParams['checkout']);

        $requestParams = $request->all();

        $arr = session()->exists('chosenRooms') ? session('chosenRooms') : json_encode(array());
        $arr = json_decode($arr, true);

        if (isset($requestParams['chosenRoom']) && !in_array($requestParams['chosenRoom'], $arr)) {
            array_push($arr, $requestParams['chosenRoom']);
            session(['chosenRooms' => json_encode($arr)]);
        }
        else if(isset($requestParams['removeRoom'])) {
            if (($key = array_search($requestParams['removeRoom'], $arr)) !== false) {
                unset($arr[$key]);
            }
            session(['chosenRooms' => json_encode($arr)]);
        }

        if(isset($requestParams['chosenRoom']) || isset($requestParams['removeRoom'])) {
            return view('pages.reservations.rooms', [ 'availableRooms' => $availableRooms, 'selectedRooms' => $arr ]);
        } else {
            return view('pages.reservations.customers', [ 'percentage' => 0 ]);
        }
    }

    public function processCustomers(Request $request)
    {
        $sessionParams = session('generalReservationItems');
        $requestParams = $request->all();

        $arr = session()->exists('customersReservation') ? session('customersReservation') : json_encode(array());
        $arr = json_decode($arr, true);

        if(count($arr) < $sessionParams['adults']) {
            if(isset($requestParams['customername'])) {
                array_push($arr, $requestParams);
                session(['customersReservation' => json_encode($arr)]);
            }

            if(count($arr) < $sessionParams['adults'])
                return view('pages.reservations.customers', [ 'percentage' => (count($arr) / $sessionParams['adults']) * 100 ]);
            else {
                $userPassword = Str::random(10);

                $this->insertReservation($userPassword);
                return view('pages.reservations.completion', [ 'username' => $sessionParams['emailAddress'], 'password' => $userPassword ]);
            }
        }
    }

    public function insertReservation(string $userPassword)
    {
        $reservationController = new ReservationController();
        $customerController = new CustomerController();
        $bookingController = new BookingController();
        $loginController = new LoginController();

        $reservationInfo = session('generalReservationItems');
        $reservationInfo['bookingstatus'] = 1;

        $roomsInfo = json_decode(session('chosenRooms'), true);
        $customersInfo = json_decode(session('customersReservation'), true);

        /// Creation user login
        if($reservationInfo['createcustomerarea'] == "checked") {
            $loginCount = $loginController->store([
                'username' => $reservationInfo['emailAddress'],
                'password' => bcrypt($userPassword),
                'role' => 2
            ]);

            $reservationInfo['login'] = $loginCount->idlogin;
        }

        /// Creation reservation
        $reservationNumber = $reservationController->store($reservationInfo);

        if($reservationNumber->idreservation > 0) {
            /// Creation room association
            for ($i=0; $i < count($roomsInfo); $i++) {
                $bookingController->store([
                    'reservation' => $reservationNumber->idreservation,
                    'room' => $roomsInfo[$i]
                ]);
            }

            /// Creation customers
            for ($i=0; $i < count($customersInfo); $i++) {
                $customersInfo[$i]['reservation'] = $reservationNumber->idreservation;

                $customerController->store($customersInfo[$i]);
            }
        }
    }
}
