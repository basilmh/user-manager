<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->status = $request->status === null ? User::ENABLED_STATUS : $request->status;
        $user->save();

        return redirect()->route('admin.user.edit', $user->id)->with(['type' => 'success', 'message' => 'User Created.']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->status = $request->status;
        $request->password == null ? '' : $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('admin.user.edit', $user->id)
            ->with(['type' => 'success', 'message' => 'User Updated.']);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->status = User::DISABLED_STATUS;
        $user->save();
        return redirect()
            ->route('admin.user.index')
            ->with(['type' => 'success', 'message' => 'User was blocked']);
    }

}
