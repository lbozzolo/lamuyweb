<?php

namespace LamuyWeb\Http\Controllers;

use Illuminate\Http\Request;
use LamuyWeb\Http\Requests\CreateGalleryRequest;
use LamuyWeb\Http\Requests\UpdateGalleryRequest;
use LamuyWeb\Models\Image;
//use LamuyWeb\Models\Service;
use LamuyWeb\Repositories\GalleryRepository;
use LamuyWeb\Http\Controllers\AppBaseController as AppBaseController;
use LamuyWeb\Traits\ImageTrait;

class GalleryController extends AppBaseController
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

    use ImageTrait;

    public function __construct(GalleryRepository $repository)
    {
        $this->repo = $repository;
        $this->gender = 'F';
        $this->model = 'gallery';
        $this->modelPlural = 'galleries';
        $this->modelSpanish = 'galería';
        $this->modelSpanishPlural = 'galerías';
        $this->store_success_message = ($this->gender == 'M')? ucfirst($this->modelSpanish).' creado con éxito' : ucfirst($this->modelSpanish).' creada con éxito';
        $this->store_failure_message = ($this->gender == 'M')? 'Ocurrió un error. No se pudo crear el'.ucfirst($this->modelSpanish) : 'Ocurrió un error. No se pudo crear la '.ucfirst($this->modelSpanish);
        $this->show_failure_message = ($this->gender == 'M')? 'No se encontró el'.ucfirst($this->modelSpanish.' especificado') : 'No se encontró la '.ucfirst($this->modelSpanish.' especificada');
        $this->update_success_message = ($this->gender == 'M')? ucfirst($this->modelSpanish).' actualizado con éxito' : ucfirst($this->modelSpanish).' actualizada con éxito';
        $this->update_failure_message = ($this->gender == 'M')? 'Ocurrió un error. No se pudo actualizar el '.ucfirst($this->modelSpanish).' especificado' : 'Ocurrió un error. No se pudo actualizar la '.ucfirst($this->modelSpanish).' especificada';
        $this->destroy_success_message = ($this->gender == 'M')? ucfirst($this->modelSpanish).' eliminado con éxito' : ucfirst($this->modelSpanish).' eliminada con éxito';
        $this->destroy_failure_message = ($this->gender == 'M')? 'Ocurrió un error. No se pudo eliminar el '.ucfirst($this->modelSpanish).' especificado' : 'Ocurrió un error. No se pudo eliminar la '.ucfirst($this->modelSpanish).' especificada';
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
        $this->data['images_big'] = Image::bigs()->galleryType();
        $this->data['images_thumb'] = Image::thumbs()->galleryType();
        $this->data[$this->modelPlural] = $this->repo->all();

        return view($this->modelPlural.'.index')->with($this->data);
    }

    public function create()
    {
        return view($this->modelPlural.'.create')->with($this->data);
    }

    public function store(CreateGalleryRequest $request)
    {
        $input = $request->all();
        $item = $this->repo->create($input);

        if (!$item)
            return redirect()->back()->withErrors($this->store_failure_message);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->store_success_message);
    }

    public function show($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (!$this->data['item'])
            return redirect()->back()->withErrors($this->show_failure_message);

        return view($this->modelPlural.'.show')->with($this->data);
    }

    public function edit($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect()->back()->withErrors($this->show_failure_message);

        //$this->data['services'] = Service::pluck('name', 'id');

        return view($this->modelPlural.'.edit')->with($this->data);
    }

    public function update($id, UpdateGalleryRequest $request)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);
        $this->data['items'] = $this->repo->all();

        $inputs = $request->all();

        if (!$this->data['item'])
            return redirect()->back()->withErrors($this->update_failure_message);

        $this->data['item'] = $this->repo->update($inputs, $id);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->update_success_message);
    }

    public function active($id)
    {
        $gallery = $this->repo->findWithoutFail($id);
        $galleries = $this->repo->all();

        $this->repo->activate($gallery, $galleries);

        return redirect()->back();
    }

    public function configuration()
    {
        $this->data[$this->modelPlural] = $this->repo->all();
        return view($this->modelPlural.'.configuration')->with($this->data);
    }

    public function isEmpty($id, Request $request)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if(!$this->data['item']->imagesThumb->count())
            return redirect()->back()->with('warning', 'La galería ya está vacía');

        foreach ($this->data['item']->imagesThumb as $image){
            $this->destroyImage($image->id);
        }

        return redirect(route($this->modelPlural.'.show', $this->data['item']->id))->with('ok', 'Galería vaciada con éxito.');
    }

    public function destroy(Request $request)
    {
        if ( empty( $request->except('_token', '_method') ) )
            return redirect()->back()->withErrors('Debe seleccionar al menos una carpeta');

        foreach($request['galleries'] as $key => $id){
            $item = $this->repo->findWithoutFail($id);
            if($item->images->count())
                return redirect()->route($this->modelPlural.'.show', $item->id)->withErrors('No se puede eliminar la carpeta "' . $item->name . '" porque contiene imágenes. Primero debe vaciarla.');
            $this->repo->delete($id);
        }

        return redirect(route($this->modelPlural.'.config'))->with('ok', 'Galería(s) eliminada(s) con éxito.');
    }

}
