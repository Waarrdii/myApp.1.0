<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index():Response
    {
        return Inertia::render('Admin/User/UserIndex',[
            'users' => UserResource::collection(User::all())
        ]);
    }
}
