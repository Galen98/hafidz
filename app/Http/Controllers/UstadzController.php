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
        $query = $ustadz->query();
        $query->where('role', '1');
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('no_hp', 'like', "%{$search}%");
            });
        } 

        $data = $query->paginate($perPage);
        return view('ustadz.ustadz-index', compact('data', 'perPage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => '1'
        ]);

        return redirect()->to('/ustadz')->with('success', 'Data berhasil ditambahkan.');
    }

    public function add(): View {
        return view('ustadz.ustadz-add');
    }


}
