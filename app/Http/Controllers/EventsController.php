<?php

    namespace App\Http\Controllers;

    use App\Event;
    use App\Jobs\SendEmailToUser;
    use App\User;
    use Illuminate\Http\Request;

    class EventsController extends Controller
    {
        //
        public function index(Request $request)
        {
            return response()->json(Event::get());
        }

        public function show($id, Request $request)
        {
            $event = Event::get($id);
            return response()->json($event);
        }

        public function showUsers($id, Request $request)
        {
            $event = Event::get($id);
            $users = $event->user()->get();
            return response()->json($users);
        }

        public function addUser($id, $userid, Request $request)
        {
            $event = Event::get($id);
            if ($event == null) {
                return response('event not found', 404);
            }


            $user = User::get($userid);
            if ($user == null) {
                return response('user not found', 404);
            }

            $event->attachUser($user);

            return response()->json($event->user()->get());
        }

        public function deleteUser($id, $userid = null, Request $request)
        {
            $event = Event::get($id);
            if ($event == null) {
                return response('event not found', 404);
            }
            if ($userid == null) {
                return response('user not found', 404);
            }

            $user = User::get($userid);
            if ($user == null) {
                return response('user not found', 404);
            }


            $event->datachUser($user);

            return response()->json($event->user()->get());
        }


    }
