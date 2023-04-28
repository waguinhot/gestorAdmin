<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        if (!$user->can('brand')) {
            abort(404);
        }
        return view('tasks.brand');
    }
}
