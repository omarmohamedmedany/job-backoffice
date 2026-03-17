<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,company-owner,job-seeker',
        ]);
        $user->update($request->only('name', 'email', 'role'));
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User archived successfully.');
    }

    public function archived()
    {
        $users = User::onlyTrashed()->latest()->get();
        return view('users.archived', compact('users'));
    }

    public function restore($id)
    {
        User::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('users.archived')->with('success', 'User restored successfully.');
    }
}