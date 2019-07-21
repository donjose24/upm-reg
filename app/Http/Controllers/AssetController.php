<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AssetController extends Controller
{
    public function serveImage($id)
    {
        $user = User::find(1);

        // Return the image in the response with the correct MIME type
        return response()->make($user->med_cert_image, 200, array(
            'Content-Type' => (new \finfo(FILEINFO_MIME))->buffer($user->med_cert_image)
        ));
    }

}
