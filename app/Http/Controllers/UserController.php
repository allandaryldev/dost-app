<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/CreateUser',[
            "user_data"=>[]
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CreateUser $request): RedirectResponse
    {
        $input = $request->validated();

        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);

        event(new Registered($user));

        // Auth::login($user);

        return Redirect::route('create.user');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return Inertia::render('Auth/CreateUser',[
            "user_data"=>[]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            "type"=>$request->type
        ]);
        return redirect('dashboard')->with("Goods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('dashboard')->with("Goods");
    }
}
