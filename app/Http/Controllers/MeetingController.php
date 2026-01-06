<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function show($id)
    {
        return view('meeting.show', [
            'lessonId' => $id
        ]);
    }

    public function join(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required',
            'password' => 'required'
        ]);

        // ⚠️ тут ставишь СВОЙ пароль
        if ($request->password !== '12345') {
            return back()->withErrors(['password' => 'Неверный пароль']);
        }

        return view('meeting.room', [
            'lessonId' => $request->lesson_id,
            'username' => auth()->user()->name ?? 'Гость'
        ]);
    }
}

