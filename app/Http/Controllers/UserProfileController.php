<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        if (auth()->user()->username === 'admin') {
            return redirect('/')->with('error', 'You are an admin');
        }
        return view('user.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::find(auth()->user()->id);
        $provinces =  Province::all();

        return view('user.profile.edit', [
            'user' => $user,
            'provinces' => $provinces
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        $province = Province::find($request->province)->name;
        $regency = Regency::find($request->regency)->name;
        $district = District::find($request->district)->name;
        $village = Village::find($request->village)->name;

        $rules = [
            'photo' => 'image|file|max:4096',
            'name' => 'required|max:255',
            'address' => ''
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|max:255|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validated = $request->validate($rules);

        if ($request->file('photo')) {
            if ($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $validated['photo'] = $request->file('photo')->store('user-photos');
        }

        $validated['address'] = $request->detailAddress . ', ' . $village . ', ' . $district . ', ' . $regency . ', ' . $province;

        User::where('id', $userId)->update($validated);
        return redirect('/user/profile')->with('success', 'Profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
