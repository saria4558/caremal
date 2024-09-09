<?php

namespace App\Http\Controllers;

use App\Models\Bunga; // Ganti dengan namespace yang benar untuk model Bunga
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BungaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function logout()
    {
    //  Auth::logout();
     return view('index');
    }

    public function product()
    {
        $data = Bunga::all();
        return view('product', compact('data'));
    }

    public function masuk()
    {
        return view('login');
    }
    // public function logout()
    // {
    //  Auth::logout();
    //  return redirect('/');
    // }

    public function daftarView()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'image' => 'image|file|max:1024',
            'password' => 'required|min:5|max:255',
            
        ]);
        

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        // $request->session()->flash('success', 'Registration successful! Please login.');
        return redirect()->route('masuk');
    }
//     public function login(Request $request)
// {
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:5',
//     ]);

//     if (Auth::attempt($credentials)) {
//         // Authentication passed
//         return redirect()->route('product'); // Ganti dengan nama route halaman dashboard Anda
//     } else {
//         return redirect()->route('masuk')->with('error', 'Login failed. Please check your credentials.');
//     }
// }


    public function forgotpassword()
    {
        return view('sesi.forgot-password');
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function insert(Request $request)
    {

        $data = Bunga::create($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            $hash = hash_file('md5', $image->path());
        
            // Gunakan hash sesuai kebutuhan Anda
            // Misalnya, simpan hash ke dalam database atau lakukan sesuatu yang lain
        
            $image->move('storage/', $image->getClientOriginalName());
        
            $data->image = $image->getClientOriginalName();
            $data->save();
        }
        
        return redirect()->route('product')->with('success', 'Data berhasil ditambahkan.');
    }

    public function updatedata(Request $request, $id)
{
    $data = Bunga::find($id);
    $data->update($request->except('image'));

    // Periksa apakah ada file gambar yang diunggah
    if($request->hasFile('image')){
        // Hapus file gambar yang lama jika ada
        if($data->image){
            unlink('imageStock/' . $data->image);
        }

        // Pindahkan file gambar yang baru
        $image = $request->file('image');
        $image->move('storage/', $image->getClientOriginalName());
        $data->image = $image->getClientOriginalName();
        $data->save();
    }

    return redirect()->route('product')->with('success', 'Data berhasil diupdate.');
}


    public function tampilkandata($id)
    {
        $data = Bunga::find($id);
        return view('edit', compact('data'));
    }
    public function deletedata($id)
{
    $data = bunga::find($id);
    $data->delete();
    return redirect()->route('product')->with('success', 'data berhasil di hapus');   
}

function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('product');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }
    
    function successlogin()
    {
     return view('product');
    }

    
}
