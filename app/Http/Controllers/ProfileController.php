<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sejarah;
use App\Visimisi;
use App\StrukOg;
class ProfileController extends Controller
{
    //
    protected $imagePath = 'upload/images/profile/';
    public function sejarah ()
    {
        $sejarah = Sejarah::orderBy('id','desc')->first();
        return view('profile.sejarah', ['sejarah' => $sejarah, 'imagePath' => $this->imagePath ]);
    }
    public function visiMisi ()
    {
        $visimisi = Visimisi::first();
        return view('profile.visi-misi', ['visimisi' => $visimisi, 'imagePath' => $this->imagePath ]);
    }
    public function struktur ()
    {
        $struk = StrukOg::first();
        return view('profile.so', ['struk' => $struk, 'imagePath' => $this->imagePath ]);
    }
    
    public function visiMisi_edit ()
    {
        $visimisi = Visimisi::first();
        return view('admin.edit-visi-misi', ['visimisi' => $visimisi, 'imagePath' => $this->imagePath ]);
    }
    public function sejarah_edit ()
    {
        $sejarah = Sejarah::first();
        return view('admin.edit-sejarah', ['sejarah' => $sejarah, 'imagePath' => $this->imagePath]);
    }
    public function struktur_edit ()
    {
        $struk = StrukOg::first();
        return view('admin.edit-struktur', ['struk' => $struk, 'imagePath' => $this->imagePath ]);
    }
    public function visiMisi_save (Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|max:120',
            'desk' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'image' => 'image'
            ]);
        $visimisi = Visimisi::find($request->id);
        $visimisi->title = $request->title;
        $visimisi->desk = $request->desk;
        $visimisi->visi = $request->visi;
        $visimisi->misi = $request->misi;
        /*$visimisi->image = 'none.png';*/
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->imagePath, $file_name);
            $visimisi->image = $file_name;
        }
        if ($visimisi->update()) {
            $message = 'Disimpan!';
        } else {
            $message = 'Terjadi kesalahan';
        }

        return redirect()->route('dashboard.visi-misi')->with('message', $message);
    }
    public function sejarah_save (Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|max:120',
            'desk' => 'required'
            ]);
        $sejarah = Sejarah::find($request->id);
        $sejarah->title = $request->title;
        $sejarah->desk = $request->desk;
        /*$sejarah->image = 'none.png';*/
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->imagePath, $file_name);
            $sejarah->image = $file_name;
        }
        if ($sejarah->update()) {
            $message = 'Disimpan!';
        } else {
            $message = 'Terjadi kesalahan';
        }

        return redirect()->route('dashboard.sejarah')->with('message', $message);
    }
    public function struktur_save (Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|max:120',
            'desk' => 'required'
            ]);
        $struktur = StrukOg::find($request->id);
        $struktur->title = $request->title;
        $struktur->desk = $request->desk;
        /*$sejarah->image = 'none.png';*/
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->imagePath, $file_name);
            $struktur->image = $file_name;
        }
        if ($struktur->update()) {
            $message = 'Disimpan!';
        } else {
            $message = 'Terjadi kesalahan';
        }

        return redirect()->route('dashboard.struktur')->with('message', $message);
    }
}
