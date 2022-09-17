<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('user.registerForm', [
            'title' => 'Регистрация',
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->login,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('show_all_categories');
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->login,
            'password' => $request->password,
        ])){
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function active($id)
    {
        if (auth()->user()->admin) {

            $user = User::find($id);

            if ($user->active){
                $user->active = 0;
            } else {
                $user->active = 1;
            }
            $user->save();

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', [
            'title' => 'Профиль юзера',
            'user' => $user,
        ]);
    }

    public function showAll()
    {
        $users = User::all();

        return view('user.showAll', [
            'title' => 'Список юзеров',
            'users' => $users,
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->active) {
            $user->active = 1;
        } else {
            $user->active = 0;
        }
        if ($request->admin) {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }
        $user->save();

        return redirect()->back();
    }
}
