<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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

        if ($user->can('product')) {
            return view('tasks.product');
        }

        return redirect('dashboard');
    }
}
