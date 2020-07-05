<?php

    namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Http\Request;

    class UsersController extends Controller
    {
        //
        public function index(Request $request)
        {
            $users = User::select(['id','first_name','last_name'])->get();
            return response()->json($users);
        }

        public function show($id, Request $request)
        {
            $users = User::select(['id','first_name','last_name'])->where('id', $id)->first();
            return response()->json($users);
        }


    }
