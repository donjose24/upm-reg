<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Update additional information for the logged in user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $input = $request->only([
            'ice_name',
            'ice_contact_number',
            'join_reason',
            'full_address',
        ]);

        $validator = Validator::make($input, [
            'ice_name' => 'required',
            'ice_contact_number' => 'required',
            'join_reason' => 'required',
            'full_address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        User::where('id', Auth::user()->id)
            ->update($input);

        Session::flash('success', 'Additional information added');
        return redirect()->back();
    }
}
