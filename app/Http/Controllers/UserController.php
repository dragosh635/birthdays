<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Notifications\BirthdayToday;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the list of contacts for the authenticated user
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contacts = auth()->user()->contacts;

        return view('users.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Save a new user
     *
     * @param  UserCreateRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        // upload the image
        $image = $request->image->store('users');

        $new = auth()->user()->contacts()->create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'birthday'   => $request->birthday,
            'password'   => Hash::make($request->password),
            'picture'    => $image,
        ]);

        return redirect()->route('users.index')->with('success', $new->fullName.' was created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the user
     *
     * @param  UserEditRequest  $request
     * @param  User  $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserEditRequest $request, User $user)
    {
        // upload the image
        $request->image->store('public/users');

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'birthday'   => $request->birthday,
            'password'   => Hash::make($request->password),
            'picture'    => $request->image->hashName(),
        ]);

        return redirect()->route('users.index')->with('success', $user->fullName.' was updated');
    }


    /**
     * Delete user
     *
     * @param  User  $user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', $user->fullName.' was deleted');
    }
}
