<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login.login');
    }

    public function dashboard(Request $request)
    {
        $email = $request->email;
        $pass = md5($request->password);

        $results = DB::table('tbl_users')
            ->where('email', $email)
            ->where('password', $pass)
            ->first();
        if ($results) {
            Session::put('admin_name', $results->name);
            Session::put('admin_id', $results->id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Email or Password Invalid');
            return Redirect::to('/');
        }
    }
}
