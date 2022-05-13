<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Application;

class AdministratorController extends Controller
{
    public function application()
    {

        $ApplicationAccounts = Application::select('*')
        ->where('application_status', 1)
        ->get();

        $number = 1;

        return view('pages.administrator.administrator',compact('ApplicationAccounts','number'));
    }

    public function pay()
    {
        return view('pages.administrator.administratorPay');
    }
}
