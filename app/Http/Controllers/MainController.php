<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use App\Tag;
use App\Product;
use App\Ads;
use App\Katalog;
use App\Slide;
use Image;
class MainController extends Controller
{
    protected $folderPathNews = 'upload/images/news/';
    protected $slidePath = 'upload/images/slide/';
    public function home ()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(4);
        $slides = Slide::all();
        $ads = Ads::first();
        $klog = Katalog::first();
        $path = $this->folderPathNews;
        return view('home', ['newest' => $news, 'slides' => $slides , 'path' => $path, 'slidePath' => $this->slidePath, 'ads' => $ads, 'klog' => $klog]);
    }
    public function viewTag ($tag)
    {
        $tag_id = Tag::where('slug', $tag)->first()->id;
        $news = News::where('tag_id', $tag_id)->orderBy('created_at', 'desc')->paginate(4);
        $slides = Slide::all();
        $ads = Ads::first();
        $klog = Katalog::first();
        $path = $this->folderPathNews;
        /*if ($news->isEmpty()) {
            return 'a';
        }
        return 'c';*/
        return view('home', ['newest' => $news, 'slides' => $slides , 'path' => $path, 'slidePath' => $this->slidePath, 'ads' => $ads, 'klog' => $klog]);
    }
    
    public function upload(Request $requests){
       
        return redirect('/tes')->with('message', 'Message');
       
    }
    public function test (){
        $img = Image::url('/upload/hinata.png',64,64,array('crop'));
        
        echo '<img src=" ' .$img. '"/>';
    }
}
