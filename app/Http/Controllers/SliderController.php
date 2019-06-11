<?php

namespace Lamuy\Http\Controllers;

use Lamuy\Http\Requests\CreateSliderRequest;
use Lamuy\Http\Requests\UpdateSliderRequest;
use Lamuy\Repositories\SliderRepository;
use Lamuy\Http\Controllers\AppBaseController as AppBaseController;
use Lamuy\Models\Slider;

class SliderController extends AppBaseController
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

    public function __construct(SliderRepository $repository)
    {
        $this->repo = $repository;
        $this->gender = 'M';
        $this->model = 'slider';
        $this->modelPlural = 'sliders';
        $this->modelSpanish = 'slider';
        $this->modelSpanishPlural = 'sliders';
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

    public function create()
    {
        return view($this->modelPlural.'.create')->with($this->data);
    }

    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();
        $this->data['item'] = $this->repo->create($input);

        if(!$this->data['item'])
            return redirect()->back()->withErrors($this->store_failure_message);

        return redirect(route($this->modelPlural.'.edit', $this->data['item']->id))->with('ok', $this->store_success_message);
    }

    public function show($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect(route($this->modelPlural.'.index'))->withErrors($this->show_failure_message);

        return view($this->modelPlural.'.show')->with($this->data);
    }

    public function edit($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect(route('sliders.index'))->withErrors($this->show_failure_message);

        return view($this->modelPlural.'.edit')->with($this->data);
    }

    public function update($id, UpdateSliderRequest $request)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect(route($this->modelPlural.'.index'))->withErrors($this->show_failure_message);

        $this->data['item'] = $this->repo->update($request->all(), $id);

        if(!$this->data['item'])
            return redirect()->back()->withErrors($this->update_failure_message);

        return redirect(route('sliders.index'))->with('ok', $this->update_success_message);
    }

    public function activate($id)
    {
        $this->data['item'] = Slider::find($id);
        $this->data['items'] = Slider::all();

        foreach($this->data['items'] as $item){
            $item->active = null;
            $item->save();
        }

        $this->data['item']->active = 1;
        $this->data['item']->save();

        return redirect()->back()->with('ok', 'Slider activado');
    }

    public function destroy($id)
    {
        $this->data['item'] = $this->repo->findWithoutFail($id);

        if (empty($this->data['item']))
            return redirect(route($this->modelPlural.'.index'))->withErrors($this->show_failure_message);

        if($this->data['item']->active)
            return redirect()->back()->withErrors('No se puede eliminar el slider porque está activo. Active otro slider y vuelva a intentar');

        $this->repo->delete($id);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->destroy_success_message);
    }
}
