<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        /**
         * @var User $user
         */
        $user = Auth::user();
        if ($user->can('admin')) {
            return view('user.users', ['users' => $users]);
        }
        return view('user.lowaccess');
    }

    public function create()
    {
        $this->verifyAccess();
        return view('user.create');
    }

    public function store(UserRequest $request)
    {

        $this->verifyAccess();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->access_product =  (int) $request->access_product;
        $user->access_category = (int) $request->access_category;
        $user->access_brand = (int) $request->access_brand;
        $user->save();

        return redirect()->route('dashboard');
    }

    public function show($id)
    {

        $this->verifyAccess();

        $user = User::find($id);
        if (!$user) {
            return redirect()->back();
        }

        return view('user.edit', ['user' => $user]);
    }

    public function edit(EditUserRequest $request, $id)
    {

        $this->verifyAccess();

        $user = User::find($request->id);

        if (!$user) {
            return redirect()->back();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->access_product =  (int) $request->access_product;
        $user->access_category = (int) $request->access_category;
        $user->access_brand = (int) $request->access_brand;
        $user->save();


        return redirect()->route('dashboard');
    }
    public function delete(Request $request)
    {

        $this->verifyAccess();

        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        if (!$user) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('dashboard');
    }

    private function verifyAccess(): void
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        if (!$user->can('admin')) {
            abort(404);
        }
    }
}
