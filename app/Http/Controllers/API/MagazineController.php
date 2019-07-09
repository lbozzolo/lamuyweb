<?php

namespace LamuyWeb\Http\Controllers\API;

use LamuyWeb\Traits\ApiResponser;
use LamuyWeb\Models\Magazine;
use LamuyWeb\Http\Controllers\Controller as Controller;

class MagazineController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');

    }

    public function index()
    {
        $model = new Magazine();
        $magazines = Magazine::get($model->apiAttributes);

        return $this->showAll($magazines);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        $magazine = $magazine->get($magazine->apiAttributes)->first();
        return $this->showOne($magazine);
    }

}
