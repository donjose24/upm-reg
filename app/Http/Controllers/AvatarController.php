<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class AvatarController extends Controller
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
     * Stores the image uploaded.
     *
     * @param $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.imgur.com/', 'headers' => [
            'Authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID', ''),
            'Content-type' => 'application/json',
        ]]);
        $response = $client->post('/3/image', [
            'json' => [
                'image' => base64_encode(file_get_contents($request->file('avatar'))),
            ]
        ]);
        $response = json_decode($response->getBody()->getContents());
        $user->avatar = $response->data->link;
        $user->save();

        Session::flash('success', 'Avatar updated');
        return redirect()->back();
    }
}
