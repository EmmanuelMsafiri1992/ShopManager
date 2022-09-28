<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class WholesellerController extends Controller
{
public function dashboard()
{
return view('wholeseller.dashboard.dashboard');
}
    // For login admin
public function authenticate(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);
if(Auth::guard('wholeseller')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember')))
{
return redirect()->route('wholeseller.dashboard.dashboard');
}
else
{
return back()->with(['error'=>'Email Or Password Is Incorrect']);
}
}
// For logout admin
public function logout()
{
Auth::guard('wholeseller')->logout();
return redirect()->route('wholeseller.login');
}
}
