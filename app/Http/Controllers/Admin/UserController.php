<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Queries\UsersQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\Update;
use App\Http\Requests\User\Store;


class UserController extends Controller
{
    public function index(UsersQueryBuilder $usersQueryBuilder)
    {
        $users = $usersQueryBuilder->getUsers();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(User $user, Store $request)
    {
        $user->name = $request->input('name');
        $user->is_admin = $request->boolean('is_admin');
        $user->email = $request->input('email');
        if ($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        session(['alert' => __("Пользователь успешно создан")]);

        return redirect(route("admin.user.index"));
    }

    public function update(User $user, Update $request)
    {

        $user->name = $request->input('name');
        $user->is_admin = $request->boolean('is_admin');
        $user->email = $request->input('email');
        if ($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        session(['alert' => __("Пользователь успешно сохранен")]);

        return redirect(route("admin.user.index"));
    }

    public function destroy(User $user)
    {

        $user->delete();
        session(['alert' => __("Пользователь " . $user->id . " успешно удален")]);
    }
}
