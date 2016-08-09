<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller {

    /**
     * Responds to requests to GET /users
     */
    public function index() {
        $users = User::all();
        return view('admin.user.index')
                        ->with('users', $users);
    }
    public function show($id) {
        $user = User::find($id);
        return view('admin.user.show')->with('user', $user);
    }
}
