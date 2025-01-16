<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Hash;  

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 
        $pengguna = DB::table('user')->get();  
        return view ('pengguna/index', compact('pengguna'));  //passing parameter asosiasi 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view ('pengguna/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //  'password' => Hash::make($request['password']),
    public function store(Request $request)
    {
        try 
        {
             $query=DB::table('user')->insert([ 
                'name' => $request ->name,
                'email' => $request ->email,
                'password' => Hash::make($request['password']),
                'role' => $request ->role,
                'created_at' => now(),
                'updated_at' => now(), 
                ]);  
            return  redirect('pengguna')-> with ('status', 'Pengguna berhasil ditambah..'); 
        } 
                catch(\Illuminate\Database\QueryException $ex){  
                return  redirect('pengguna')-> with ('status', $ex); 
            } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        $user = DB::table('user')->where('user_id', $user_id)->first();   
        return  view('pengguna/edit', compact('user'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {  
       try 
       { 
       $affected = DB::table('user') ->where('user_id', $user_id)
       ->update([ 
        'name' => $request ->name,   
                'email' => $request ->email,
                'password' => Hash::make($request['password']),
                'role' => $request ->role, 
                'updated_at' => now() 
    ]);
    return  redirect('pengguna')-> with ('status', 'user berhasil diubah..'); 
       } 
           catch(\Illuminate\Database\QueryException $ex)
           {  
           return  redirect('pengguna')-> with ('status', 'user gagal diubah..'); 
       } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {

       // dd($user_id);
        $user = DB::table('user')->where('user_id', $user_id)->delete();      
        return  redirect('pengguna')-> with ('status', 'Data user berhasil dihapus..');  
    }
}
