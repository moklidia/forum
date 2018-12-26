<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileValidation;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(User $user)
    {

        return view(
            'profiles.show',
            [
                'profileUser' => $user,
                'activities' => Activity::feed($user),
            ]
        );
    }

    public function update(Request $request, ProfileValidation $rules)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = auth()->user();
            $user->avatar = '/uploads/avatars/' . $filename;
            $user->save();
        }

        return redirect()->back()->with('flash', 'Your profile image has been updated!');
    }
}
