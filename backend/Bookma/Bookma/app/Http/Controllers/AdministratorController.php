<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\ProductCondition;
use App\Book;

class AdministratorController extends Controller
{
    public function application()
    {

        return view('pages.administrator.administrator');
    }
    public function pay()
    {
        return view('pages.administrator.administratorPay');
    }
}
