<?php
namespace App\Http\Controllers;
use App\Charts\ExpenseChart;
use App\Charts\FinishedQtyChart;
use App\Charts\PurchaseChart;
use App\Charts\TransferredQtyChart;
use App\Models\Category;
use App\Models\Expense;
use App\Models\FinishedProduct;
use App\Models\GeneralSetting;
use App\Models\ProcessingProduct;
use App\Models\Purchase;
use App\Models\Staff;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\TransferredProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
