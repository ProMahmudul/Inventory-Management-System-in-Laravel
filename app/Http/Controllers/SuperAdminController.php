<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return view('admin.home.homeContent');
        } else {
            return Redirect::to('/')->send();
        }
    }

    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.home.homeContent');
    }

    public function logout()
    {
//        Session::put('admin_name', null);
//        Session::put('admin_id', null);
        Session::flush();
        return Redirect::to('/');
    }
}
