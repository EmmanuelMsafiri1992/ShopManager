<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\GeneralSetting;
use App\Models\Wholeseller;

class WholesellerController extends Controller
{
// Return wholeseller dashboard
public function dashboard()
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

// show all wholesellers
public function index()
{
$wholesellers=Wholeseller::all();
return view('wholeseller.wholeseller.wholeseller_index')->with(['wholesellers'=>$wholesellers]);
}

// Return view for add new wholeseller
public function create()
{
return view('wholeseller.wholeseller.wholeseller_create');
}
// Add new wholeseller
public function add(Request $request)
{

}
// edit a wholeseller
public function edit($id)
{

}
// update a wholeseller
public function update(Request $request, $id)
{

}
// delete a wholeseller
public function destroy($id)
{

}
}
