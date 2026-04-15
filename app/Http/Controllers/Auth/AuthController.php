<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Session;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    use ValidatesRequests;

    function __construct(){
        
        
    }

    public function index()
    {
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);
    
        $username = $request->user_name;
        $password = $request->password;
    
        $ldapbind = false;
    
        // --- Try Cairo LDAP first ---
        $ldapconn = @ldap_connect(config('constants.cairo.ldap_host'));
        if ($ldapconn) {
            $ldap_binddn = config('constants.cairo.ldap_binddn') . $username;
            $ldapbind = @ldap_bind($ldapconn, $ldap_binddn, $password);
        }
    
        // --- If Cairo fails, try Egypt LDAP ---
        if (!$ldapbind) {
            $ldapconn = @ldap_connect(config('constants.egypt.ldap_host'));
            if ($ldapconn) {
                $ldap_binddn = config('constants.egypt.ldap_binddn') . $username;
                $ldapbind = @ldap_bind($ldapconn, $ldap_binddn, $password);
            }
        }
    
        // --- If both Cairo & Egypt fail ---
        if (!$ldapbind) {
            return back()
                ->withErrors(['msg' => "Username or Password not correct in LDAP."])
                ->withInput();
        }
    
        // --- Check user in local DB ---
        $user = User::where('user_name', $username)->first();
        if (!$user) {
            return back()
                ->withErrors(['msg' => "User does not exist in system."])
                ->withInput();
        }
    
        // --- Login user into Laravel ---
        Auth::login($user);
        return redirect(url('/'));
    }
    
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}
