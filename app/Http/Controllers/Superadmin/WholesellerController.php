<?php
namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wholeseller;
use Illuminate\Support\Facades\DB;

class WholesellerController extends Controller
{
// show all wholesellers for superadmin
public function index()
{
    $query = Wholeseller::query();
    if (request('term')) {
        $term = request('term');
        $query->where('name', 'Like', '%' . $term . '%')
            ->orWhere('email', 'Like', '%' . $term . '%')
            ->orWhere('phone_number', 'Like', '%' . $term . '%')
            ->orWhere('company_name', 'Like', '%' . $term . '%')
            ->orWhere('designation', 'Like', '%' . $term . '%');
    }
    $wholesellers = $query->orderBy('id', 'DESC')->paginate(15);
    return view('superadmin.wholeseller.index', compact('wholesellers'));

}
// create a new wholeseller by superadmin
public function create()
{
return view ('superadmin.wholeseller.create');
}

// create a new wholeseller by superadmin
public function store(Request $request)
{
// validate form
$validator = $request->validate([
    'name'          => 'required|string|max:50',
    'email'         => 'nullable|string|email|max:80|unique:wholesellers',
    'phone'         => 'sometimes|nullable',
    'company'       => 'required|string|max:50',
    'designation'   => 'nullable|string|max:50',
    'profilePic'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
]);



//upload selected image
$imageName = '';
if (isset($request->profilePic)) 
{
    $imageName = $request->file('profilePic')->getClientOriginalName();
     $imageName=$imageName;
     $request->file('profilePic')->storeAs('storage/wholeseller',$imageName);
    $path="storage/wholeseller/".$imageName;
    }

// // store wholesellers
Wholeseller::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone_number' => $request->phone,
    'company_name' => $request->company,
    'designation' => $request->designation,
    'address' => clean($request->address),
    'profile_picture' => $path,
    'status' => $request->status
]);

return redirect()->route('superadmin.wholeseller.index')->withSuccess('Wholeseller added successfully!');
}

// show detail of a wholeseller by superadmin
public function show($id)
{
dd('show');
}
// edit a wholeseller by superadmin
public function edit($id)
{
dd('edit');    
}
// update a wholeseller by superadmin
public function update(Request $request, $id)
{
dd('update');
}
// delete a wholeseller by superadmin
public function destroy($id)
{
dd('destroy');
}
//
public function status($id)
{
dd('status');
}
}
