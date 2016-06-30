<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Tag;
use App\Ads;
use App\Katalog;
use Auth;
use Image;
class NewsController extends Controller
{
    //
    protected $folderPathNews = 'upload/images/news/';
    protected $hari = array(
                    'Monday' => "Senin",
                    'Tuesday' => "Selasa",
                    'Wednesday' => "Rabu",
                    'Thursday' => "Kamis",
                    'Friday' => "Jum'at",
                    'Saturday' => "Sabtu",
                    'Sunday' => "Minggu"
                    );
        protected $bulan = array(
                    '01' => "Januari",
                    '02' => "Febuari",
                    '03' => "Maret",
                    '04' => "April",
                    '05' => "Mei",
                    '06' => "Juni",
                    '07' => "Juli",
                    '08' => "Agustus",
                    '09' => "September",
                    '10' => "Oktober",
                    '11' => "November",
                    '12' => "Desember"
                    );
    public function viewNews ($tag, $slug)
    {
        $news = News::where('slug', $slug)->first();
        $otherPosts = News::orderByRaw("RAND()")->take(3)->get();
        $klog = Katalog::first();
        $ads = Ads::first();
        $path = $this->folderPathNews;
        return view('news.view', ['news' => $news, 'otherPosts' => $otherPosts, 'path' => $path, 'ads' => $ads, 'klog' => $klog]);
    }
    public function news ()
    {
        return redirect()->route('home');
    }
    public function addNews ()
    {
        $tags = Tag::all();
        return view('admin.add-news', ['tags' => $tags ]);
    }
    //Proses
    public function news_add (Request $requests) 
    {
        $this->validate($requests, [
            'title' => 'required',
            'tag' => 'required|integer',
            'content' => 'required',
            'image' => 'required|image',
            ]);
        $title = $requests->title;
        $tag_id = $requests->tag;
        $content = $requests->content;
        $image = 'none';
        /*Siapkan Tanggal*/
        $day = date('l');
        $month = date('m');
        $year = date('Y');
        $date = date('d');
        $fixDate = $this->hari[$day] . ', ' . $date . ' ' . $this->bulan[$month] . ' ' . $year;

        /*Eksekusi Query*/
        $news = new News;
        $news->user_id = Auth::user()->id;
        $news->tag_id = $tag_id;
        $news->title = $title;
        $news->slug = str_slug($title);
        $news->content = $content;
        $news->date = $fixDate;
        if ($requests->file('image')) {
            $file = $requests->file('image');
            $file_name = date("h:s-d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi foto upload
            $file->move($this->folderPathNews, $file_name);
            $news->image = $file_name;
        }
        if ($news->save()) {
            $message = 'Berhasil Diterbitkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }
        
        return redirect()->route('dashboard.list-news')->with(['message' => $message]);
       
    }
    public function listNews ()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('admin.list-news', ['news' => $news, 'no' => $no]);
    }
    public function editNews ($id)
    {
        $news = News::find($id);
        $tags = Tag::all();
        $path = $this->folderPathNews;
        return view('admin.edit-news', ['news' => $news, 'tags' => $tags, 'path' => $path]);
    }
    public function news_edit (Request $requests) 
    {
        $this->validate($requests, [
            'news_id' => 'required',
            'title' => 'required',
            'tag' => 'required|integer',
            'content' => 'required',
            'image' => 'image'
            ]);
        $news_id = $requests->news_id;
        $title = $requests->title;
        $tag_id = $requests->tag;
        $content = $requests->content;
        /*Siapkan Tanggal*/
        $day = date('l');
        $month = date('m');
        $year = date('Y');
        $date = date('d');
        $fixDate = $this->hari[$day] . ', ' . $date . ' ' . $this->bulan[$month] . ' ' . $year;

        /*Eksekusi Query*/
        $news = News::find($news_id);
        //$news->user_id = Auth::user()->id;
        $news->tag_id = $tag_id;
        $news->title = $title;
        $news->slug = str_slug($title);
        $news->content = $content;
        $news->date = $fixDate;
        if ($requests->file('image')) {
            $file = $requests->file('image');
            $file_name = date("h:s-d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi foto upload
            $file->move($this->folderPathNews, $file_name);
            $news->image = $file_name;
        }
        if ($news->update()) {
            $message = 'Berhasil Dirubah.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }
        
        return redirect()->route('dashboard.list-news')->with(['message' => $message]);
       
    }
    public function news_del (Request $request)
    {
        $news = News::find($request->news_id);
        if (is_null($news)) {
            return '0';
        } elseif ($news->delete()) {
            return '1';
        }
        return '2';
    }
}
