<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Application;
use App\TransferAccountSetting;

use App\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller
{
    public function completeApplication(Request $request)
    {

        if(intval($request->amount_money) <= 1000){
            return redirect()->route('sellerTransferApplication');
        }

        $user = Auth::user();
        $transferAccountSetting = TransferAccountSetting::select('*')
                             ->where('user_id', $user->id)
                             ->first();

        $ApplicationInformation = new Application;

        $ApplicationInformation->user_id = $request->user_id;
        $ApplicationInformation->transfer_account_id = $request->transfer_account_id;
        $ApplicationInformation->amount_money = $request->amount_money;
        $ApplicationInformation->application_status = $request->application_status;

        $ApplicationInformation->save();


        return view('pages.application.completeApplication',compact('transferAccountSetting'));
    }


}
