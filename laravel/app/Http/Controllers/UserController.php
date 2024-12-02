<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id', 
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $request->id,
            'password' => 'sometimes|min:6',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->update(array_filter([
            'name' => $validated['name'] ?? $user->name,
            'email' => $validated['email'] ?? $user->email,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]));

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id', 
        ]);

        $user = User::findOrFail($validated['id']);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

}