<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use Image;
class SlideController extends Controller
{
    //
    protected $imagePath = 'upload/images/slide/';
    public function slider()
    {
        $slides = Slide::all();
        $no = 1;
        return view('admin.list-slide', ['slides' => $slides, 'no' => $no]);
    }
    public function slide_add (Request $requests){
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'image'/*,
            'icon' => 'reqired',
            'content' => 'required'*/
            ]);
        $slide = new Slide;
        $slide->title = $requests->title;
        $slide->desk = $requests->desk;
        $slide->target = $requests->target;
        if ($requests->file('content')) {
            $file = $requests->file('content');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->imagePath, $file_name);
            $slide->content = $file_name;
            Image::make($this->imagePath.''.$file_name,array(
                'width' => 60,
                'height' => 60,
                'grayscale' => true
                ))->save($this->imagePath.''.$file_name);
        }
        if ($slide->save()) {
            $message = 'Berhasil Ditambahkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.slide')->with(['message' => $message]);

    }
    public function slide_del (Request $request)
    {
        $slide = Slide::find($request->slide_id);
        if (is_null($slide)) {
            return '0';
        } elseif ($slide->delete()) {
            return '1';
        }
        return '2';
    }
    // Formnya
    public function editSlide ($id)
    {
        $slide = Slide::find($id);

        return view('admin.edit-slide', ['slide' => $slide, 'imagePath' => $this->imagePath ]);
    }
    // Prosesnya edit
    public function slide_edit (Request $requests)
    {
        $slide = Slide::find($requests->slide_id);
        $slide->title = $requests->title;
        $slide->desk = $requests->desk;
        $slide->target = $requests->target;
        if ($requests->file('content')) {
            $file = $requests->file('content');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->imagePath, $file_name);
             Image::make($this->imagePath.''.$file_name,array(
                'width' => 960,
                'height' => 420,
                'grayscale' => false
                ))->save($this->imagePath.''.$file_name);
            $slide->content = $file_name;
        }
        if ($slide->update()) {
            $message = 'Berhasil Disimpan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.slide')->with(['message' => $message]);
    }
}
