<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $recordsPerPage = 15;
        $announcements = Announcement::paginate($recordsPerPage);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function store(Request $request)
    {
        $announcement = new Announcement();
        $announcement->description = $request->get('description');
        $announcement->save();

        return redirect()->back();
    }
}
