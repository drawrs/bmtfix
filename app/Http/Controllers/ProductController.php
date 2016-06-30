<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Image;
class ProductController extends Controller
{
    //
    protected $folderPathIcon = 'upload/images/product/icon/';
    protected $folderPathBrosur = 'upload/images/product/brosur/';
    public function products ()
    {
        $products = Product::orderBy('created_at','desc')->get();
        $brosurPath = $this->folderPathBrosur;
        $iconPath = $this->folderPathIcon;
        return view('products.list', ['products' => $products, 'brosurPath' => $brosurPath, 'iconPath' => $iconPath]);
    }
    public function addProduct ()
    {
        return view('admin.add-product');
    }
    
    public function product_add (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'required|image',
            'icon' => 'required|image'
            ]);
        $product = new Product;
        $product->title = $requests->title;
        $product->desk = $requests->desk;
        $product->icon = 'none';
        $product->content = 'none';
        if ($requests->file('icon')) {
            $file = $requests->file('icon');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathIcon, $file_name);
            $product->icon = $file_name;
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
            $product->content = $file_name;
        }
        if ($product->save()) {
            $message = 'Berhasil Ditambahkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.list-product')->with(['message' => $message]);
    }

    
    public function listProduct ()
    {
        $products = Product::all();
        $no = 1;
        return view('admin.list-product', ['products' => $products, 'no' => $no]);
    }

    
    public function editProduct ($id)
    {
        $product = Product::find($id);
        $brosurPath = $this->folderPathBrosur;
        $iconPath = $this->folderPathIcon;
        return view('admin.edit-product', ['product' => $product, 'iconPath' => $iconPath, 'brosurPath' => $brosurPath]);
    }
    public function product_edit (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'image',
            'icon' => 'image'
            ]);
        $product = Product::find($requests->product_id);
        $product->title = $requests->title;
        $product->desk = $requests->desk;
        if ($requests->file('icon')) {
            $file = $requests->file('icon');
            $file_name = date("d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathIcon, $file_name);
            $product->icon = $file_name;
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
            $product->content = $file_name;
        }
        if ($product->update()) {
            $message = 'Berhasil Disimpan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.list-product')->with(['message' => $message]);

    }
    public function product_del (Request $request)
    {
        $product = Product::find($request->product_id);
        if (is_null($product)) {
            return '0';
        } elseif ($product->delete()) {
            return '1';
        }
        return '2';
    }
}
