<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    private $rules = [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'contact_number' => ['required', 'string'],
        'birthdate' => ['required', 'date'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $query = User::select('*');

        $filters = isset($request->all()['filters']) ? $request->all()['filters'] : ['med_cert_status' => 'none', 'application_status' => 'none'];

        if (isset($filters['med_cert_status']) && $filters['med_cert_status'] != 'none') {
            $query = $query->where('med_cert_status', $filters['med_cert_status']);
        }

        if (isset($filters['application_status']) && $filters['application_status'] != 'none') {
            $query = $query->where('application_status', $filters['application_status']);
        }

        if (!empty($keyword)) {
            $users = $query->where('first_name', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
        } else {
            $users = $query->latest()->paginate($perPage);
        }

        return view('admin.users.index', compact('users', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $requestData = $request->all();

        User::create($requestData);

        Session::flash('flash_message', 'User created!');
        return redirect('admin/users')->with('flash_message', 'User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);
        $requestData = $request->all();

        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');
        return redirect('admin/users')->with('flash_message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\RedirectorS
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }

    /**
     * Accept Medical Certificate
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\RedirectorS
     */
    public function accept($id)
    {
        $user = User::find($id);
        $user->med_cert_status="approved";
        $user->save();
        Session::flash('success', 'Medical Certificate Updated');
        return redirect()->back();
    }

    /**
     * Reject Medical Certificate
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\RedirectorS
     */
    public function reject($id)
    {
        $user = User::find($id);
        $user->med_cert_status="rejected";
        $user->save();
        Session::flash('success', 'Medical Certificate Status Updated');
        return redirect()->back();
    }
}
