<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\GeneralSetting;

class CustomerController extends Controller
{
// Return customer dashboard
public function index()
{
return view('customer.dashboard');
}

// For login customer only
public function authenticate(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);
if(Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember')))
{
return redirect()->route('customer.dashboard');
}
else
{
return back()->with(['error'=>'Email Or Password Is Incorrect']);
}
}
// For customer logout
public function logout()
{
Auth::guard('customer')->logout();
return redirect()->route('login');
}
}
