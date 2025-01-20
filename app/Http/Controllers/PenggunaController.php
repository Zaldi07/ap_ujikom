<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function loginForm()
    {
        return view('pengguna/login'); // Tampilkan form login
    }
    public function signUpForm()
    {
        return view('pengguna/signup'); // Tampilkan form signup
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek pengguna berdasarkan email
        $user = DB::table('users')->where('email', $request->email)->first();

        // Jika pengguna ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan data pengguna ke session atau gunakan Auth untuk otentikasi
            Auth::loginUsingId($user->user_id); // Gunakan user_id sebagai ID otentikasi

            return redirect('home')->with('status', 'Login successfully.');
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect('/login')->with('status', 'You have been logged out.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = DB::table('users')->get(); // Pastikan menggunakan 'users' dan bukan 'user'
        return view('pengguna/index', compact('pengguna'));  //passing parameter asosiasi 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $query = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'role' => $request->role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect('pengguna')->with('status', 'Pengguna berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('pengguna')->with('status', 'Error: ' . $ex->getMessage());
        }
    }
    public function signup(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Manager,Staff       ',
        ]);

        try {
            // Insert data ke database
            DB::table('users')->insert([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('home')->with('status', 'Pengguna berhasil ditambah.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('status', 'Terjadi kesalahan: ' . $ex->getMessage())->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        // Fungsi untuk menampilkan detail pengguna
        $user = DB::table('users')->where('user_id', $user_id)->first();
        return view('pengguna/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        // Ambil data pengguna berdasarkan user_id
        $user = DB::table('users')->where('user_id', $user_id)->first();
        return view('pengguna/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        try {
            $affected = DB::table('users')->where('user_id', $user_id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request['password']),
                    'role' => $request->role,
                    'updated_at' => now()
                ]);
            return redirect('pengguna')->with('status', 'User berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('pengguna')->with('status', 'User gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        // Hapus pengguna berdasarkan user_id
        $user = DB::table('users')->where('user_id', $user_id)->delete();
        return redirect('pengguna')->with('status', 'Data user berhasil dihapus..');
    }
}
