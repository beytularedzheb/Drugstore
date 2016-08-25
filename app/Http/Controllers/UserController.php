<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
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
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        return view('admin.user.show')->with('user', $user);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('flash_message', trans('messages.user_deleted'));

        return redirect()->action('UserController@index');
    }
}
