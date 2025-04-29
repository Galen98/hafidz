<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DaftarKelompok;
use App\Models\User;
use Illuminate\View\View;

class UstadzController extends Controller
{
    public function index(Request $request, User $ustadz): View {
        $perPage = $request->get('per_page', 10);
        $data = $ustadz->where('role', '1')->paginate($perPage);
        return view('ustadz.ustadz-index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_hp' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => '1'
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }
}
