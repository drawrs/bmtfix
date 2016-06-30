<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kantor;
use Image;
class KantorController extends Controller
{
    //
    protected $folderPathKantor = 'upload/images/kantor/';
    public function kantor ()
    {
        $kantors = Kantor::orderBy('name','asc')->paginate(6);
        $no = 1;
        return view('kantor.list', ['kantors' => $kantors,'no' => $no, 'path' => $this->folderPathKantor ]);
        
    }
}
