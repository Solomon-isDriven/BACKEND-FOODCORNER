<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

Route::post('/auth/register', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'idNumber' => 'nullable|string|max:50',
        'birthday' => 'nullable|date',
        'gender' => 'nullable|string|in:male,female',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = User::create([
        'first_name' => $request->firstName,
        'last_name' => $request->lastName,
        'id_number' => $request->idNumber,
        'birthday' => $request->birthday,
        'gender' => $request->gender,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'Registered successfully!']);
});
