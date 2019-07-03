<?php

namespace Lamuy\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Lamuy\Http\Requests\CreateEditionRequest;
use Lamuy\Http\Requests\UpdateEditionRequest;
use Intervention\Image\Facades\Image as Intervention;
use Lamuy\Models\Edition;
use Lamuy\Repositories\EditionRepository;
use Lamuy\Http\Controllers\AppBaseController as AppBaseController;
use phpDocumentor\Reflection\Types\Object_;

class EditionController extends AppBaseController
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

    public function __construct(EditionRepository $repository)
    {
        $this->repo = $repository;
        $this->gender = 'F';
        $this->model = 'edition';
        $this->modelPlural = 'editions';
        $this->modelSpanish = 'edición';
        $this->modelSpanishPlural = 'ediciones';
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
        $this->data['items'] = $this->repo->all();
        return view($this->modelPlural.'.index')->with($this->data);
    }

    public function indexTable()
    {
        $this->data['items'] = $this->repo->all();
        return view($this->modelPlural.'.index-table')->with($this->data);
    }

    public function create()
    {
        $this->data['current_date'] = Carbon::today()->month.'-'.Carbon::now()->year;
        return view($this->modelPlural.'.create')->with($this->data);
    }

    public function store(CreateEditionRequest $request)
    {
        $input = $request->except(['url_pdf', 'url_cover']);
        $input['date'] = Carbon::parse('01-'.$request->date)->format('Y-m-d');

        $item = $this->repo->create($input);

        if($request->file('url_pdf')){
            $file = $request->file('url_pdf');

            $nombre = $this->changeFileNameIfExists($file);

            Storage::disk('public_pdf')->put($nombre,  File::get($file));

            $item->url_pdf = $nombre;
            $item->save();
        }

        if($request->file('url_cover')){
            $file = $request->file('url_cover');

            $nombre = $this->changeFileNameIfExists($file);

            $image = Intervention::make($file)->resize(472.5, 827)->encode('jpg', 50);
            $image->save(public_path('covers/'). $nombre);

            //Storage::disk('local')->put('covers/'.$nombre,  File::get($file));

            $item->url_cover = $nombre;
            $item->save();
        }

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

        return view($this->modelPlural.'.edit')->with($this->data);
    }

    public function update($id, UpdateEditionRequest $request)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);
        $this->data['items'] = $this->repo->all();


        $input = $request->except(['url_pdf', 'url_cover']);
        $input['date'] = Carbon::parse('01-'.$request->date)->format('Y-m-d');

        if (!$this->data['item'])
            return redirect()->back()->withErrors($this->update_failure_message);

        $this->data['item'] = $this->repo->update($input, $id);

        if($request->file('url_pdf')){
            $file = $request->file('url_pdf');

            $nombre = $this->changeFileNameIfExists($file);

            Storage::disk('public_pdf')->put($nombre,  File::get($file));

            $this->data['item']->url_pdf = $nombre;
            $this->data['item']->save();
        }

        if($request->file('url_cover')){
            $file = $request->file('url_cover');

            $nombre = $this->changeFileNameIfExists($file);

            $image = Intervention::make($file)->resize(472.5, 827)->encode('jpg', 50);

            $image->save(public_path('covers/'). $nombre);

            //Storage::disk('public_cover')->put($nombre,  File::get($file));

            $this->data['item']->url_cover = $nombre;
            $this->data['item']->save();
        }

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->update_success_message);
    }

    public function destroy($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect()->back()->withErrors($this->destroy_failure_message);

        $this->repo->delete($id);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->destroy_success_message);
    }

    public function deleteCover(Request $request, $id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (!$this->data['item'])
            return redirect()->back()->withErrors($this->show_failure_message);

        File::delete(storage_path("app/covers/".$this->data['item']->url_cover));

        $this->data['item']->url_cover = null;
        $this->data['item']->save();

        return redirect(route($this->modelPlural.'.edit', $this->data['item']->id));
    }

    public function deletePdf($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (!$this->data['item'])
            return redirect()->back()->withErrors($this->show_failure_message);

        File::delete(storage_path("app/".$this->data['item']->url_pdf));

        $this->data['item']->url_pdf = null;
        $this->data['item']->save();

        return redirect(route($this->modelPlural.'.edit', $this->data['item']->id));
    }

    public function changeFileNameIfExists($file)
    {
        $regEx = '/\\.[^.\\s]{3,4}$/';
        $string_random = str_random(28);

        $originalName = $file->getClientOriginalName();
        $extension = $file->guessExtension();

        $nombre = preg_replace($regEx, '', $originalName) . '-' . $string_random . '.' . $extension;
        $nombre = str_replace(' ','',$nombre);
        $nombre = str_replace_array('#', ['x'], $nombre);
        $nombre = strtolower($nombre);

        return $nombre;
    }

}
