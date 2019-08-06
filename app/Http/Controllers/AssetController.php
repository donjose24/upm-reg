<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AssetController extends Controller
{
    public function serveImage($id)
    {
        // Show the current login user's med cert by default for security reasons
        // Only admin can view other user's certificates
        $medCert = Auth::user()->med_cert_image;

        if (Auth::user()->role === "admin") {
            $user = User::find($id);
            $medCert = $user->med_cert_image;
        }

        // Return the image in the response with the correct MIME type
        return response()->make($medCert, 200, array(
            'Content-Type' => (new \finfo(FILEINFO_MIME))->buffer($medCert)
        ));
    }

}
