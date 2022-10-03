<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\GeneralSetting;

class RetailerController extends Controller
{
// Return retailer dashboard
public function index()
{
return view('retailer.dashboard');
}

// For login retailer only
public function authenticate(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);
if(Auth::guard('retailer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember')))
{
return redirect()->route('retailer.dashboard');
}
else
{
return back()->with(['error'=>'Email Or Password Is Incorrect']);
}
}
// For retailer logout
public function logout()
{
Auth::guard('retailer')->logout();
return redirect()->route('login');
}
}
