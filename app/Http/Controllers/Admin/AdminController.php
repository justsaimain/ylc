<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function viewAdmin()
    {
        $admins = Admin::all();
        return view('dashboard.admin.view', compact('admins'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();
        return back();
    }

    public function changeAdminPassword(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->password = Hash::make($request->new_password);
        $admin->update();
        return back();
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return back();
    }

    public function createAdmin()
    {
        return view('dashboard.admin.create');
    }

    public function createAdminPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string']
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back();
    }
}
