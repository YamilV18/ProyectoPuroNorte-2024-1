<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $users = User::all();
        return $this->successResponse($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->successResponse($user);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];

        $this->validate($request, $rules);

        $user = User::create($request->all());

        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();

        return $this->successResponse($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->successResponse($user);
    }
}
