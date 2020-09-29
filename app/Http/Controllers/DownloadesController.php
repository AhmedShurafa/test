<?php

namespace App\Http\Controllers;

use App\Models\Downloades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DownloadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function down(Request $request) {

        $file = Downloades::find(1);

        // Check if file exists in storage directory
        if($file->code === $request->code){
            return Response::download($file->download);
            return redirect()->back();
        }else{
            return redirect()->back()->with('code','*'. __('message.codeError') );
        }
    }
}
