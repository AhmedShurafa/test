<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('admin.portfolio')->with('portfolio',$portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('images')) {
            $Portfolios = $request->file('images');
            $filePath="";
            if($request->hasfile('images')) {
                foreach ($Portfolios as $key => $img) {
                    $Port = new Portfolio();
                    $extension = $img->getClientOriginalExtension(); // getting image extension
                    $image = uniqid() . '.' . $extension;
                    $filePath = $img->move('storage/image/', $image);

                    $Port->name    = $request->name;
                    $Port->name_ar = $request->name_ar;
                    $Port->type    = $request->type;
                    $Port->type_ar    = $request->type_ar;
                    $Port->image = $filePath =="" ? $Portfolios->image : $filePath;
                    $Port->save();
                }
            }
        }

        return redirect(route('admin.portfolio'))->with('success','تم الاضافة بنجاح');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio_edit')->with('portfolio',$portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Old_portfolio = Portfolio::find($id);
        $filePath="";
        if($request->hasfile('images')){
            $image = $request->file('images');
            $image_new_name = time() .'.'. $image->getClientOriginalExtension();//Getting Image Extension
            $filePath = $image->move("storage/image/",$image_new_name);
        }
        $Old_portfolio->update([
            'name'=> $request->name,
            'name_ar'=> $request->name_ar,
            'type'=> $request->type,
            'type_ar'=> $request->type_ar,
            'image'=> $filePath =="" ? $Old_portfolio->image : $filePath,
        ]);
        $Old_portfolio->save();
        return redirect(route('admin.portfolio'))->with('success','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return redirect(route('admin.portfolio'))->with('error','تم حذف العنصر.');

    }
}
