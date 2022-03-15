<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function index()
    {
        $userLogged = Auth::user();
        $users = User::where('id', '!=', $userLogged->id)->get(['id','name']);

        return response()->json(['users' => $users]);
    }
}
