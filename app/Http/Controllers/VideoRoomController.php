<?php

namespace App\Http\Controllers;

use App\Models\VideoLog;
use App\Models\VideoRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoRoomController extends Controller
{
    public function index()
    {
        $rooms = VideoRoom::latest()->get();

        return view('meeting.index', compact('rooms'));
    }
    
    public function create()
    {
        return view('meeting.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $data['creator_id'] = auth()->id();
        $data['room_name'] = 'room-'.Str::uuid();

        $room = VideoRoom::create($data);

        return redirect()
            ->route('videoconf.show', $room->id)
            ->with('success','Комната создана');
    }

    public function show(VideoRoom $room)
    {
        VideoLog::create([
            'video_room_id' => $room->id,
            'user_id' => auth()->id(),
            'joined_at' => now(),
        ]);

        return view('meeting.show', compact('room'));
    }
}

