<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $recordsPerPage = 15;
        $query = $request->get('query');

        //search for first name or last name
        if ($query) {
            $users = User::where('first_name', 'LIKE', "%$query%")
                ->orWhere('last_name', 'LIKE', "%$query%")
                ->where('role', 'normal')
                ->paginate($pages);
        } else {
            $users = User::where('role', 'normal')->paginate($recordsPerPage);
        }

        return view('admin.users.index', compact('users', 'query'));
    }

    public function accept($id)
    {
        $user = User::find($id);
        $user->med_cert_status="approved";
        $user->save();

        Session::flash('success', 'Medical Certificate Updated');
        return redirect()->back();

    }

    public function reject($id)
    {
        $user = User::find($id);
        $user->med_cert_status="rejected";
        $user->save();

        Session::flash('success', 'Medical Certificate Status Updated');
        return redirect()->back();
    }
}
