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

        $ApplicationAccounts = Application::select('*')
        ->where('application_status', 2)
        ->get();

        return view('pages.administrator.administratorPay',compact('ApplicationAccounts'));
    }


    public function payment(Request $request, $id)
    {

        $ApplicationInformation = Application::find($id);

        $ApplicationInformation->application_status = $request->application_status;

        $ApplicationInformation->save();


        return redirect()->route('pay');
    }

}
