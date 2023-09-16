<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('is_admin', 0)->get(['id','name', 'email']);
            return view('admin.users.index', compact('users'));
        } catch (Exception $e) {
            Log::info("error in getting users data");
            Log::info($e->getMessage());
        }
    }
}
