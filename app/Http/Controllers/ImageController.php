<?php

namespace LamuyWeb\Http\Controllers;

use LamuyWeb\Repositories\ImageRepository;
use LamuyWeb\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LamuyWeb\Models\Image;
use Intervention\Image\Facades\Image as Intervention;
use LamuyWeb\Traits\ImageTrait;

class ImageController extends AppBaseController
{
    private $imageRepository;

    use ImageTrait;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    public function destroy($id)
    {
        $this->destroyImage($id);
        return redirect()->back()->with('ok', 'Imagen eliminada con éxito');
    }

    public function saveJqueryImageUpload(Request $request, $id, $class)
    {
        $validator = Validator::make($request->all(), ['img' => 'required|image|max:1024000']);

        if ($validator->fails())
            return $validator->errors();

        $status = "";

        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        // Resize to image thumbnail. Different size if Slider image.
        if($class == 'Slider') {

            $img_thumb = Intervention::make($request->file('img'))
                ->resize(config('sistema.imagenes.SLIDER_WIDTH_THUMB'), null, function ($constraint){
                    $constraint->aspectRatio();
                });

            //$img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.SLIDER_WIDTH_THUMB'), config('sistema.imagenes.SLIDER_HEIGHT_THUMB'));
        } else {

            $img_thumb = Intervention::make($request->file('img'))
                ->resize(config('sistema.imagenes.WIDTH_THUMB'), null, function ($constraint){
                    $constraint->aspectRatio();
                });

            //$img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.WIDTH_THUMB'), config('sistema.imagenes.HEIGHT_THUMB'));
        }

        $class = env('APP_NAME').'\Models\\'.$class;
        $model = $class::find($id);

        // Redirección si supera el máximo de fotos permitido
        if($model->images->count() >= config('sistema.imagenes.MAX_NUMBER_IMAGES'))
            return redirect()->back()->withErrors('El número máximo de fotos permitido es '.config('sistema.imagenes.MAX_NUMBER_IMAGES').'. Elimine una foto y vuelva a intentarlo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('sistema.imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande.');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);

            $model->images()->save($imagen);

            $image_thumb = $this->makeThumb($img_thumb, $nombre, $model, null);
            $imagen->thumbnail_id = $image_thumb->id;
            $imagen->save();

            $status = "uploaded";

        }

        return response($status,200);
    }

    public function subirMultiple(Request $request)
    {
        $messages = [
            'filename.required' => 'No ha seleccionado ningún archivo.',
            'filename.*.max' => 'La imagen es demasiado grande.'
        ];
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ], $messages);

        $itemId = $request['item_id'];
        $class = $request['class'];

        if($request->hasfile('filename')) {

            foreach($request->file('filename') as $file) {
                $image = $this->storeImage($file, $itemId, $class);
                $data[] = $image->path;
            }

        }

        return redirect()->back()->with('ok', 'Subida de imágenes exitosa');
    }

}
