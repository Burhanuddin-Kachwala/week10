<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function create()
    {
        return view('admin.auth.login');
    }
    public function index()
    {
        try {
            return view("admin.index");
        } catch (Exception $e) {
        }
    }
    public function store()
    {
       
        
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if ( Auth::guard('admin')->attempt($attributes)) {
            // $admin = Auth::guard('admin')->user();
            // Auth::guard('admin')->login($admin);
            request()->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        // dd((Auth::guard('admin')));
       
        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials do not match.'
        ]);
    }
    public function destroy()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
