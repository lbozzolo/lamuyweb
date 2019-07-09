<?php

namespace LamuyWeb\Http\Controllers;

use LamuyWeb\Models\Category;
use LamuyWeb\Models\Magazine;
use LamuyWeb\Models\Work;
use LamuyWeb\Models\Noticia;
use LamuyWeb\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = '';

//        $magazine = Magazine::find(10);
//        $url = storage_path('app/covers/'.$magazine->url_cover);
//        dd($url);
        return view('home')->with($data);
    }
}
