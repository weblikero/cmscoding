<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{



    public function index(){

        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));


    }

    public function destroy($id){

        $photo = Photo::findOrFail($id);



        $photo->delete();
        unlink(public_path().'/images/' . $photo->file);
        Session::flash('deleted_photo','The photo has been deleted succesfully');
        return redirect('/admin/media');

    }

}
