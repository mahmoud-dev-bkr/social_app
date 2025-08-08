<?php 

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $model;

    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    public function index()
    {
        $resources = $this->model::paginate(10);
        return view('dashboard.admins.index', compact('resources'));
    }

    public function create()
    {
    return view('dashboard.admins.create', [
            'admin' => $this->model,
        ]);
    }

    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $admin = $this->model::create($data);
        return redirect()->route('admin.admins.index');
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit', compact('admin'));
    }


    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        if ($request->password == null) {
            unset($data['password']);
        }
        $admin->update($data);
        return redirect()->route('admin.admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index');
    }

}