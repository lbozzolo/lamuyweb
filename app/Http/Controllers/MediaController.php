<?php

namespace Lamuy\Http\Controllers;

use Illuminate\Http\Request;
use Lamuy\Http\Requests\CreateMediaRequest;
use Lamuy\Repositories\MediaRepository;
use Lamuy\Http\Controllers\AppBaseController as AppBaseController;
use Lamuy\Models\Image;

class MediaController extends AppBaseController
{
    private $repo;
    private $gender;
    private $model;
    private $modelSpanish;
    private $modelSpanishPlural;
    private $modelPlural;
    private $store_success_message;
    private $store_failure_message;
    private $show_failure_message;
    private $update_success_message;
    private $update_failure_message;
    private $destroy_success_message;
    private $destroy_failure_message;
    private $no_results_message;
    private $data;

    public function __construct(MediaRepository $repository)
    {
        $this->repo = $repository;
        $this->gender = 'F';
        $this->model = 'medias';
        $this->modelPlural = 'medias';
        $this->modelSpanish = 'medias';
        $this->modelSpanishPlural = 'medias';
        $this->store_success_message = ($this->gender == 'M')? ucfirst($this->modelSpanish).' creado con éxito' : ucfirst($this->modelSpanish).' creada con éxito';
        $this->store_failure_message = ($this->gender == 'M')? 'Ocurrió un error. No se pudo crear el'.ucfirst($this->modelSpanish) : 'Ocurrió un error. No se pudo crear la'.ucfirst($this->modelSpanish);
        $this->show_failure_message = ($this->gender == 'M')? 'No se encontró el'.ucfirst($this->modelSpanish.' especificado') : 'No se encontró la'.ucfirst($this->modelSpanish.' especificada');
        $this->update_success_message = ($this->gender == 'M')? ucfirst($this->modelSpanish).' actualizado con éxito' : ucfirst($this->modelSpanish).' actualizada con éxito';
        $this->update_failure_message = ($this->gender == 'M')? 'Ocurrió un error. No se pudo actualizar el'.ucfirst($this->modelSpanish).' especificado' : 'Ocurrió un error. No se pudo actualizar la'.ucfirst($this->modelSpanish).' especificada';
        $this->destroy_success_message = ($this->gender == 'M')? ucfirst($this->modelSpanish).' eliminado con éxito' : ucfirst($this->modelSpanish).' eliminada con éxito';
        $this->destroy_failure_message = ($this->gender == 'M')? 'Ocurrió un error. No se pudo eliminar el'.ucfirst($this->modelSpanish).' especificado' : 'Ocurrió un error. No se pudo eliminar la'.ucfirst($this->modelSpanish).' especificada';
        $this->no_results_message = ($this->gender == 'M')? 'No hay ningún '.$this->modelSpanish. ' cargado en el sistema.' : 'No hay ninguna '. $this->modelSpanish . ' cargada en el sistema.';

        $this->data['model'] = $this->model;
        $this->data['gender'] = $this->gender;
        $this->data['modelPlural'] = $this->modelPlural;
        $this->data['modelSpanish'] = $this->modelSpanish;
        $this->data['modelSpanishPlural'] = $this->modelSpanishPlural;
        $this->data['noResultsMessage'] = $this->no_results_message;
    }

    public function index()
    {
        $items = Image::where('thumbnail_id', '!=', null)->get();
        return view($this->modelPlural.'.index')->with($this->modelPlural, $items);
    }

    public function create()
    {
        $data['past_big'] = Image::where('type', 0)->where('thumbnail_id', '!=', null)->get();
        $data['past_thumb'] = Image::where('type', 0)->where('thumbnail_id', '=', null)->get();
        $data['present_big'] = Image::where('type', 1)->where('thumbnail_id', '!=', null)->get();
        $data['present_thumb'] = Image::where('type', 1)->where('thumbnail_id', '=', null)->get();

        return view($this->modelPlural.'.create')->with($data);
    }

    public function createPresent()
    {
        $data['past_big'] = Image::where('type', 0)->where('thumbnail_id', '!=', null)->get();
        $data['past_thumb'] = Image::where('type', 0)->where('thumbnail_id', '=', null)->get();
        $data['present_big'] = Image::where('type', 1)->where('thumbnail_id', '!=', null)->get();
        $data['present_thumb'] = Image::where('type', 1)->where('thumbnail_id', '=', null)->get();

        return view($this->modelPlural.'.create-present')->with($data);
    }

    public function store(CreateMediaRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($input['name'], '.');

        $this->data['item'] = $this->repo->create($input);

        if (!$this->data['item'])
            return redirect()->back()->withErrors($this->store_failure_message);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->store_success_message);
    }

    public function uploadImages(Request $request)
    {
        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
            }
        }
    }

    public function destroy($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect()->back()->withErrors($this->destroy_failure_message);

        $this->repo->delete($id);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->destroy_success_message);
    }
}
