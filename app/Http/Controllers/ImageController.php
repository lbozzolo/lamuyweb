<?php

namespace Lamuy\Http\Controllers;

use Lamuy\Repositories\ImageRepository;
use Lamuy\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Lamuy\Models\Image;
use Intervention\Image\Facades\Image as Intervention;

class ImageController extends AppBaseController
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    public function destroy($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);
        $image_big = Image::where('thumbnail_id', $id)->first();

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        $image->forceDelete();
        $image_big->forceDelete();

        File::delete(public_path("imagenes/".$image->path));
        File::delete(public_path("imagenes/".$image_big->path));

        return redirect()->back()->with('ok', 'Imagen eliminada con éxito');
    }

    public function verImage($file)
    {
        $ruta = storage_path("imagenes\\".$file);

        return response()->make(File::get($ruta),200)
            ->header('Content-Type', 'image/jpg');
    }

    public function verCover($file)
    {
        $ruta = storage_path("app/covers/".$file);

        return response()->make(File::get($ruta),200)
            ->header('Content-Type', 'image/jpg');
    }

    public function verPdf($file)
    {
        return response()->make(\Illuminate\Support\Facades\File::get(storage_path("app/".$file)),200)
            ->header('Content-Type', 'application/pdf');
    }

    public function changeFileNameIfExists($file)
    {
        $nombre = $file->getClientOriginalName();
        $extension = $file->guessExtension();

        $nombre = preg_replace('/\\.[^.\\s]{3,4}$/', '', $nombre) . '-' . str_random(18) . '.' . $extension;

        return $nombre;
    }

    public function makeThumb($img, $name, $model = null, $type = null)
    {
        $img->save(public_path('/imagenes/'). 'thumb-'.$name);
        $image_thumb = Image::create(['path' => 'thumb-'.$name, 'main' => 0, 'type' => $type ]);

        if($model)
            $model->images()->save($image_thumb);

        return $image_thumb;
    }

    public function principalImage($id, $class, $image)
    {
        $imagen = Image::find($image);
        $imagen_thumb = Image::find($imagen->thumbnail_id);
        $class = env('APP_NAME').'\Models\\'.$class;
        $model = $class::find($id);

        foreach($model->images as $img){
            $img->main = 0;
            $img->save();
        }

        $imagen->main = 1;
        $imagen_thumb->main = 1;
        $imagen->save();
        $imagen_thumb->save();

        return redirect()->back();
    }

    // Croppie

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
            $img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.SLIDER_WIDTH_THUMB'), config('sistema.imagenes.SLIDER_HEIGHT_THUMB'));
        } else {
            $img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.WIDTH_THUMB'), config('sistema.imagenes.HEIGHT_THUMB'));
        }

        $class = 'Lamuy\Models\\'.$class;
        $model = $class::find($id);

        // Redirección si supera el máximo de fotos permitido
        if($model->images->count() >= config('sistema.imagenes.MAX_NUMBER_IMAGES'))
            return redirect()->back()->withErrors('El número máximo de fotos permitido es '.config('sistema.imagenes.MAX_NUMBER_IMAGES').'. Elimine una foto y vuelva a intentarlo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('sistema.imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 5M)');

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

    public function saveWithoutModel(Request $request, $type)
    {
        $validator = Validator::make($request->all(), ['img' => 'required|image|max:1024000']);

        if ($validator->fails())
            return $validator->errors();

        $status = "";

        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        $type = ($type == 'past')? 0 : 1;

        // Resize to image thumbnail
        $img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.WIDTH_THUMB'), config('sistema.imagenes.HEIGHT_THUMB'));

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('sistema.imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 5M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0, 'type' => $type]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);


            $image_thumb = $this->makeThumb($img_thumb, $nombre, null, $type);
            $imagen->thumbnail_id = $image_thumb->id;
            $imagen->save();

            $status = "uploaded";

        }

        return response($status,200);
    }

}
