<?php

    namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Http\Request;

    class UsersController extends Controller
    {
        //
        public function index(Request $request)
        {
            $users = User::select(['*'])->get();
            return response()->json($users);
        }

        public function show($id, Request $request)
        {
            $users = User::select(['*'])->where('id', $id)->first();
            return response()->json($users);
        }

        public function store(Request $request)
        {

        }

        public function update($id, Request $request)
        {

        }

        public function delete($id, Request $request)
        {

        }
    }
