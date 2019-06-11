<?php

namespace Lamuy\Http\Controllers;

use Lamuy\Models\Category;
use Lamuy\Models\Magazine;
use Lamuy\Models\Work;
use Lamuy\Models\Noticia;
use Lamuy\Models\Servicio;
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
