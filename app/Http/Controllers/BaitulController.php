<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Baitulmaal;
use Image;
class BaitulController extends Controller
{
    //
    protected $folderPathIcon = 'upload/images/baitulmaal/icon/';
    protected $folderPathBrosur = 'upload/images/baitulmaal/brosur/';
    public function baitulmaals ()
    {
        $baitulmaals = Baitulmaal::orderBy('created_at','desc')->get();
        $brosurPath = $this->folderPathBrosur;
        $iconPath = $this->folderPathIcon;
        return view('baitulmaals.list', ['baitulmaals' => $baitulmaals, 'brosurPath' => $brosurPath, 'iconPath' => $iconPath]);
    }
    public function addBaitulmaal ()
    {
        return view('admin.add-baitulmaal');
    }
    
    public function baitulmaal_add (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'required|image',
            'icon' => 'required|image'
            ]);
        $baitulmaal = new Baitulmaal;
        $baitulmaal->title = $requests->title;
        $baitulmaal->desk = $requests->desk;
        $baitulmaal->icon = 'none';
        $baitulmaal->content = 'none';
        if ($requests->file('icon')) {
            $file = $requests->file('icon');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathIcon, $file_name);
            $baitulmaal->icon = $file_name;
            Image::make($this->folderPathIcon.''.$file_name,array(
                'width' => 60,
                'height' => 60,
                'grayscale' => false
                ))->save($this->folderPathIcon.''.$file_name);
        }
        if ($requests->file('content')) {
            $file = $requests->file('content');
            $file_name = date("h:s-d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathBrosur, $file_name);
            $baitulmaal->content = $file_name;
        }
        if ($baitulmaal->save()) {
            $message = 'Berhasil Ditambahkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.list-baitulmaal')->with(['message' => $message]);
    }

    
    public function listBaitulmaal ()
    {
        $baitulmaals = Baitulmaal::all();
        $no = 1;
        return view('admin.list-baitulmaal', ['baitulmaals' => $baitulmaals, 'no' => $no ]);
    }

    
    public function editBaitulmaal ($id)
    {
        $baitulmaal = Baitulmaal::find($id);
        $brosurPath = $this->folderPathBrosur;
        return view('admin.edit-baitulmaal', ['baitulmaal' => $baitulmaal, 'brosurPath' => $brosurPath]);
    }
    public function baitulmaal_edit (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'image',
            'icon' => 'image'
            ]);
        $baitulmaal = Baitulmaal::find($requests->baitulmaal_id);
        $baitulmaal->title = $requests->title;
        $baitulmaal->desk = $requests->desk;
        $baitulmaal->icon = 'none';
        if ($requests->file('icon')) {
            $file = $requests->file('icon');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathIcon, $file_name);
            $baitulmaal->icon = $file_name;
            Image::make($this->folderPathIcon.''.$file_name,array(
                'width' => 60,
                'height' => 60,
                'grayscale' => false
                ))->save($this->folderPathIcon.''.$file_name);
        }
        if ($requests->file('content')) {
            $file = $requests->file('content');
            $file_name = date("h:s-d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathBrosur, $file_name);
            $baitulmaal->content = $file_name;
        }
        if ($baitulmaal->update()) {
            $message = 'Berhasil Disimpan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.list-baitulmaal')->with(['message' => $message]);

    }
    public function baitulmaal_del (Request $request)
    {
        $baitulmaal = Baitulmaal::find($request->baitulmaal_id);
        if (is_null($baitulmaal)) {
            return '0';
        } elseif ($baitulmaal->delete()) {
            return '1';
        }
        return '2';
    }
}
