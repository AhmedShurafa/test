<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Clients;
use App\Models\Services;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();
        $clients  = Clients::all();
        $testimonials = Testimonial::all();
        return view('admin.services',compact(['services','clients','testimonials']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (($request->title !== null)) {
            $services = new Services();

            $image = $request->file('icon');

            $data = getimagesize($image);

            $width = $data[0];
            $height = $data[1];
            /// Width and height must be  64;
            if ($width > '64' and $height > '64'){
                $input['icon'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('storage/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(64, 64, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'\\'.$input['icon']);

                $image->move($destinationPath, $input['icon']);
            }
            $filePath = 'storage/thumbnail/'.$input['icon'];

            $services->create([
                'image' => $filePath,
                'title' => $request->title,
                'title_ar' => $request->title_ar,
                'description' => $request->desc,
                'description_ar' => $request->desc_ar,
            ]);
        }

        /// Testimonial
        if (($request->name !== null)) {
            $test = new Testimonial();

            $image = $request->file('user');

            $data = getimagesize($image);

            $width = $data[0];
            $height = $data[1];

            if ($width > '80' and $height > '80'){
                $input['user'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('storage\thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'\\'.$input['user']);

                $image->move($destinationPath, $input['user']);
            }
            $filePath = 'storage/thumbnail/'.$input['user'];

            $test->create([
                'name' => $request->name,
                'name_ar' => $request->name_ar,
                'company' => $request->company,
                'company_ar' => $request->company_ar,
                'image' => $filePath,
                'description' => $request->description,
                'description_ar' => $request->description_ar,
            ]);
        }
        /// Clients
        if ($request->file('logo')) {

            if ($request->hasFile('logo')) {

                foreach($request->file('logo') as $file){
                    $Client = new Clients();

                    //get filename with extension
                    $filenamewithextension = $file->getClientOriginalName();

                    //get filename without extension
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                    //get file extension
                    $extension = $file->getClientOriginalExtension();

                    //filename to store
                    $filenametostore = uniqid().'.'.$extension;

                    $destinationPath = Storage::put('public\storage\thumbnail\\'. $filenametostore, fopen($file, 'r+'));
                    //Resize image here
                    $thumbnailpath = public_path('storage\thumbnail\\'.$filenametostore);


                    $img = Image::make($file->getRealPath());

                    $img->resize(80, 80, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbnailpath);

                    $filePath = 'storage\thumbnail\\'.$filenametostore;
                    $Client->image = $filePath;
                    $Client->save();
                }
            }
        }
        return redirect(route('admin.services'))->with('success','تم الاضافة بنجاح');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function services($id)
    {
        $services = Services::find($id);
        return view('admin.services_edit')->with('services',$services);
    }

    public function delservices($id)
    {
        $services = Services::find($id);
        $services->delete();
        return redirect(route('admin.services'))->with('error','تم حذف العنصر بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test($id)
    {
        $test = Testimonial::find($id);
        return view('admin.services_edit')->with('test',$test);
    }
    public function deleTest($id)
    {
        $test = Testimonial::find($id);
        $test->delete();
        return redirect(route('admin.services'))->with('error','تم حذف العنصر بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($request->title)){
            $services= Services::find($id);

            $image = $request->file('icon');

            $data = getimagesize($image);

            $width = $data[0];
            $height = $data[1];

            if ($width > '64' and $height > '64'){
                $input['icon'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('storage\thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'\\'.$input['icon']);

                $image->move($destinationPath, $input['icon']);
            }
            $filePath = 'storage/thumbnail/'.$input['icon'];

            $services->update([
                'image'=> $filePath =="" ? $services->image : $filePath,
                'title'=> $request->title,
                'title_ar'=> $request->title_ar,
                'description'=> $request->description,
                'description_ar'=> $request->description_ar,
            ]);
            $services->save();

        }else{
            $test= Testimonial::find($id);
            $filePath = "";

            $image = $request->file('user');

            $data = getimagesize($image);

            $width = $data[0];
            $height = $data[1];

            if ($width > '64' and $height > '64'){
                $input['user'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('storage\thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'\\'.$input['user']);

                $image->move($destinationPath, $input['user']);
            }
            $filePath = 'storage/thumbnail/'.$input['user'];

            $test->update([
                'name' => $request->name,
                'name_ar' => $request->name_ar,
                'company' => $request->company,
                'company_ar' => $request->company_ar,
                'image'=> $filePath =="" ? $test->image : $filePath,
                'description' => $request->description,
                'description_ar' => $request->description_ar,
            ]);
            $test->save();
        }

        return redirect(route('admin.services'))->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delClient($id)
    {
        $client = Clients::find($id);
        $client->delete();
        return redirect(route('admin.services'))->with('error','تم حذف العنصر بنجاح');
    }
}
