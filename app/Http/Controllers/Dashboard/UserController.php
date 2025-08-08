<?php 

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
    {
        $resources = $this->model::paginate(10);
        return view('dashboard.users.index', compact('resources'));
    }

    public function create()
    {
    return view('dashboard.users.create', [
            'user' => $this->model,
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = $this->model::create($data);
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->password == null) {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

}