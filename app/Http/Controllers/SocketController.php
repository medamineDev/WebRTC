<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Request;
use LRedis;

use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Repositories\BaseRepository;


class SocketController extends Controller
{

    protected $baseRepository;

    public function __construct(BaseRepository $baseRepository)
    {
        //$this->middleware('guest');
        $this->middleware('auth');
        $this->baseRepository = $baseRepository;
    }

    public function index()
    {

        $loggedUserId = $this->baseRepository->getLoggedUserId();
        $match = ["id" => $loggedUserId];
        $columns = ["id", "name", "email"];
        $loggedUser = $this->baseRepository->getModelBy(User::class, $match, $columns);

        $userId = $loggedUser[0]->id;
        $userName = $loggedUser[0]->name;
        $userMail = $loggedUser[0]->email;

        $user = array("user_id" => $userId, "user_name" => $userName, "user_email" => $userMail);
        return view("socket")->with([
            "user" => $userId
        ]);


        //return view('socket');

    }

    public function writemessage()
    {

        $users = User::all();
        return view("chatVideo")->with([
            "users" => $users
        ]);

     /*   return view("writemessage")->with([
            "users" => $users
        ]);*/

        // return view('writemessage');

    }

    public function sendMessage()
    {

        $redis = LRedis::connection();

        $loggedUserId = $this->baseRepository->getLoggedUserId();
        $match = ["id" => $loggedUserId];
        $columns = ["id", "name", "email"];
        $loggedUser = $this->baseRepository->getModelBy(User::class, $match, $columns);

        $userId = $loggedUser[0]->id;
        $userName = $loggedUser[0]->name;


        if (Request::ajax()) {
            $msg = Input::get('msg', 'the msg is empty');
            $to = Input::get('receiver_id', 'the receiver Id is empty');


            $msg_arr = array("from" => $userName, "to" => $to, "msg" => $msg);

            $redis->publish('message', json_encode($msg_arr));


            $response = array(
                'status' => 'success',
                'msg' => 'the message was sent with success',
                'from' => $userName,
                'to' => $to
            );

            return Response::json($response);
        } else {
            $response = array(
                'status' => 'error',
                'msg' => "the message wasn't sent ",

            );

            return Response::json($response);
        }

        return redirect('writemessage');



    }


}
