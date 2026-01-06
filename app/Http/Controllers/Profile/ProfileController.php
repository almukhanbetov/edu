<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }


    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6'
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('profile')
            ->with('success', 'Профиль обновлён');
    }


    public function destroy()
    {
        $user = auth()->user();

        auth()->logout();

        $user->delete();

        return redirect('/')
            ->with('success', 'Аккаунт удалён');
    }
}
