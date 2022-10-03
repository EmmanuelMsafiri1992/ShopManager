<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\GeneralSetting;

class WholesellerController extends Controller
{
// Return wholeseller dashboard
public function index()
{
return view('wholeseller.dashboard');
}

// For login wholeseller only
public function authenticate(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);
if(Auth::guard('wholeseller')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember')))
{
return redirect()->route('wholeseller.dashboard');
}
else
{
return back()->with(['error'=>'Email Or Password Is Incorrect']);
}
}
// For wholeseller logout
public function logout()
{
Auth::guard('wholeseller')->logout();
return redirect()->route('login');
}
}
