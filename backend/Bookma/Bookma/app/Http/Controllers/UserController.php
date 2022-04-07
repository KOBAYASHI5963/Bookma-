<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\UserProfile;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $userProfile = UserProfile::select('*')
                            ->where('user_id', $user->id)
                            ->first();

        $books = Book::select('*')
                ->where('user_id', $user->id)
                ->paginate(5);

        return view('pages.user.show',compact('user','userProfile','books'));
    }
}
