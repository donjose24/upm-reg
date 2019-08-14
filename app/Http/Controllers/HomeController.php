<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use App\Announcement;

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
            $announcements = Announcement::orderBy('created_at', 'DESC')->limit(5)->get();
            return view('home', compact('announcements'));
        }

        return redirect('/admin/home');
    }

    /**
     * Save medical certificate
     *
     */
    public function saveMedCert(Request $request)
    {
        $request->validate([
            'med_cert' => 'required|image',
        ]);
        $user = Auth::user();

        $medCert = $request->file('med_cert');
        $contents = $medCert->openFile()->fread($medCert->getSize());
        $user->med_cert_image = $contents;
        $user->med_cert_status = 'pending';
        $user->med_cert_upload_date = now();
        $user->save();

        Session::flash('success', 'Medical Certificate Successfuly Submitted');
        return redirect()->back();
    }

    public function getImage($id)
    {
        $user = App\User::find($id);

        // Return the image in the response with the correct MIME type
        return response()->make($user->med_cert_image, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->med_cert_image)
        ));
    }
}
