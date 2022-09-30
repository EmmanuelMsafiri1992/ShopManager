<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\GeneralSetting;

class WholesellerController extends Controller
{
public function index()
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
return redirect()->route('wholeseller.dashboard');
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

    // return genereal settings page
    public function generalSettings()
    {
        $settings =
            [
                'compnayName' => GeneralSetting::where('key', 'company_name')->firstOrFail()->value,
                'compnayTagline' => GeneralSetting::where('key', 'compnay_tagline')->firstOrFail()->value,
                'email' => GeneralSetting::where('key', 'email_address')->firstOrFail()->value,
                'phone' => GeneralSetting::where('key', 'phone_number')->firstOrFail()->value,
                'address' => GeneralSetting::where('key', 'address')->firstOrFail()->value,
                'currencyName' => GeneralSetting::where('key', 'currency_name')->firstOrFail()->value,
                'currencySymbol' => GeneralSetting::where('key', 'currency_symbol')->firstOrFail()->value,
                'currencyPosition' => GeneralSetting::where('key', 'currency_position')->firstOrFail()->value,
                'timezone' => GeneralSetting::where('key', 'timezone')->firstOrFail()->value,
                'codePefix' => GeneralSetting::where('key', 'purchase_code_prefix')->firstOrFail()->value,


                'processingCodePefix' => GeneralSetting::where('key', 'processing_code_prefix')->firstOrFail()->value,

                'finishedCodePefix' => GeneralSetting::where('key', 'finished_code_prefix')->firstOrFail()->value,

                'transferredCodePefix' => GeneralSetting::where('key', 'transferred_code_prefix')->firstOrFail()->value,

                'startingCode' => GeneralSetting::where('key', 'starting_purchase_code')->firstOrFail()->value,
                'logo' => GeneralSetting::where('key', 'logo')->firstOrFail()->value,
                'smallLogo' => GeneralSetting::where('key', 'small_logo')->firstOrFail()->value,

                'darkLogo' =>GeneralSetting::where('key', 'dark_logo')->first()->value? asset('img') . '/' . GeneralSetting::where('key', 'dark_logo')->first()->value : asset('img/logo-white.svg'),

                'smallDarkLogo' =>GeneralSetting::where('key', 'small_dark_logo')->first()->value ? asset('img') . '/' . GeneralSetting::where('key', 'small_dark_logo')->first()->value : asset('img/small-dark-logo.png'),

                'favicon' => GeneralSetting::where('key', 'favicon')->firstOrFail()->value,
                'copyright' => GeneralSetting::where('key', 'copyright')->firstOrFail()->value,
            ];
        $settings = (object) $settings;
        return view('admin.setup.general', compact('settings'));
    }

}
