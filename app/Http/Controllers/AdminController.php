<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $pages = 15;
        $query = $request->get('query');

        //search for first name or last name
        if ($query) {
            $users = User::where('first_name', 'LIKE', "%$query%")
                ->orWhere('last_name', 'LIKE', "%$query%")
                ->paginate($pages);
        } else {
            $users = User::where('role', 'normal')->paginate($pages);
        }


        return view('admin.home', compact('users', 'query'));
    }
}
