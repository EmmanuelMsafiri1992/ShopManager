<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\GeneralSetting;

class AdminController extends Controller
{
// Return Admin dashboard
public function index()
{
return view('admin.dashboard');
}

// For login Admin only
public function authenticate(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);
if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember')))
{
return redirect()->route('admin.dashboard');
}
else
{
return back()->with(['error'=>'Email Or Password Is Incorrect']);
}
}
// For Admin logout
public function logout()
{
Auth::guard('admin')->logout();
return redirect()->route('login');
}
}
