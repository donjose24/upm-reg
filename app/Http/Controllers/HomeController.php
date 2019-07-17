<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role === "normal") {
            return view('home');
        }

        return redirect('/admin/home');
    }

    /**
     * Save medical certificate
     *
     */
    public function saveMedCert(Request $request)
    {
        $user = Auth::user();

        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.imgur.com/', 'headers' => [
            'Authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID', ''),
            'Content-type' => 'application/json',
        ]]);

        $response = $client->post('/3/image', [
            'json' => [
                'image' => base64_encode(file_get_contents($request->file('med_cert'))),
            ]
        ]);

        $response = json_decode($response->getBody()->getContents());
        $user->med_cert = $response->data->link;
        $user->save();

        Session::flash('success', 'Medical Certificate Successfuly Submitted');
        return redirect()->back();
    }
}
