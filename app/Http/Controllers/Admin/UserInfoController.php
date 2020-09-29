<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education;
use App\Models\Experience;
use App\Models\User_info;
use App\Http\Controllers\Controller;
use App\Models\Downloades;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('lang','en');

        $user = User::with('info')->find(1);
        $edu = Education::orderBy('year','DESC')->get();
        $exp = Experience::orderBy('year','DESC')->get();
        return view('welcome',compact(['user','edu','exp']));
    }

    public function language($locale)
    {
        if ($locale !== 'ar' or $locale !== 'ar'){
            App::setlocale($locale);
            $lang = session()->put('locale', 'en');
        }else{
            App::setlocale($locale);
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function show(User_info $user_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('info')->find($id);

        return view('admin.user_edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'name_ar' => 'required|max:255|string',
            'email' => 'required|email',
            'nameJob' => 'required|max:255|string',
            'nameJob_ar' => 'required|max:255|string',
            'age' => 'required|max:255|integer',
            'residence' => 'required|max:50|string',
            'residence_ar' => 'required|max:50|string',
            'address' => 'required|max:50|string',
            'address_ar' => 'required|max:50|string',
            'phone' => 'required|string',
            'twitter' => 'string',
            'facebook' => 'string',
            'instagram' => 'string',
            'linked' => 'string',
            'github' => 'string',
            'image' => 'image',
            'free' => 'required',
            'descriptionJob' => 'required|string',
            'descriptionJob_ar' => 'required|string',
        ]);
        // dd($request);

        /// uploaded images
        $filePath='';
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();//Getting Image Extension
            $filePath = $image->move("storage/image/", $image_new_name);
        }

        $user_old = User::with('info')->find($id);

        $user_old->update([
            'name'      => $request->name,
            'name_ar'   => $request->name_ar,
            'email'     => $request->email,
            'password'  => ($request->password == null) ? $user_old->password : Hash::make($request->password),
            'pass'      => ($request->password == null) ? $user_old->pass :$request->password,
        ]);
        $user_old->info->update([
            'N_job'      => $request->nameJob,
            'N_job_ar'   => $request->nameJob_ar,
            'D_job'      => $request->descriptionJob,
            'D_job_ar'   => $request->descriptionJob_ar,
            'age'        => $request->age,
            'residence'  => $request->residence,
            'residence_ar' => $request->residence_ar,
            'address'    => $request->address,
            'address_ar' => $request->address_ar,
            'phone'      => $request->phone,
            'free'       => $request->free,
            'twitter'    => $request->twitter,
            'facebook'   => $request->facebook,
            'insta'      => $request->instagram,
            'linked'     => $request->linked,
            'github'     => $request->github,
            'color'      => $request->colorUser == null ? $user_old->info->color : $request->colorUser ,
            'image'      => $filePath =='' ? $user_old->info->image : $filePath,
        ]);

        //

        $down = Downloades::find(1);

        /// uploaded File
        $pathFile='';
        if ($request->hasfile('file')) {
            $image = $request->file('file');
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();//Getting Image Extension
            $pathFile = $image->move("storage/file/", $image_new_name);
        }

        $down->update([
            'download' => $pathFile == null ? $down->download : $pathFile,
            'code' => $request->code == null ? $down->code : $request->code,
        ]);
        $down->save();
        $user_old->save();
        return redirect()->back()->with('success','تم التعديل بنجاح.');
    }

    public function UpdateQr(Request $request, $id){
        $user = User::with('info')->find($id);

        if ($request->hasfile('Qr')) {
            $image = $request->file('Qr');
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();//Getting Image Extension
            $filePath = $image->move("storage/image/", $image_new_name);
        }
        $user->info->update([
            'QrImage' => $filePath,
        ]);
        $user->save();
        return redirect()->back()->with('success','تم التعديل بنجاح.');
    }

    function resize_image(Request $request)
    {
        //Qr
        $this->validate($request, [
            'Qr' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);

        $image = $request->file('Qr');
    }



    public function resizeImagePost(Request $request)
    {
        $image = $request->file('Qr');

        $data = getimagesize($image);
        $width = $data[0];
        $height = $data[1];
        if ($width > '64' and $height > '64'){
            $input['Qr'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('storage\thumbnail');

            $img = Image::make($image->getRealPath());
            $img->resize(64, 64, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'\\'.$input['Qr']);


            $destinationPath = public_path('storage\images');
            $image->move($destinationPath, $input['Qr']);

        }
            return back()
                ->with('success','Image Upload successful')
                ->with('imageName',$input['Qr']);
    }
}
