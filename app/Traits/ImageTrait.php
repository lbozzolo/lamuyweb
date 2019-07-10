<?php

namespace LamuyWeb\Traits;

use Illuminate\Support\Facades\Validator;
use LamuyWeb\Models\Image;
use Intervention\Image\Facades\Image as Intervention;
use LamuyWeb\Repositories\ImageRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

trait ImageTrait
{

    private $imageRepository;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    public function destroyImage($id)
    {
        $image = Image::find($id);
        $image_path = $image->path;
        $image_big = Image::where('thumbnail_id', $id)->first();
        $image_big_path = $image_big->path;

        $image->forceDelete();
        $image_big->forceDelete();

        File::delete(public_path("imagenes/".$image_path));
        File::delete(public_path("imagenes/".$image_big_path));

        return;
    }

    public function verImage($file)
    {
        $ruta = storage_path("imagenes\\".$file);

        return response()->make(File::get($ruta),200)
            ->header('Content-Type', 'image/jpg');
    }

    public function verCover($file)
    {
        $ruta = public_path("covers/".$file);

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

    public function storeImage($file, $id, $class)
    {
        $class = env('APP_NAME').'\Models\\'.$class;
        $model = $class::find($id);

        // Resize to image thumbnail. Different size if Slider image.
        if($class == 'LamuyWeb\Models\Slider') {
            $img_thumb = Intervention::make($file)
                ->resize(config('sistema.imagenes.SLIDER_WIDTH_THUMB'), null, function ($constraint){
                    $constraint->aspectRatio();
                });
        } else {
            $img_thumb = Intervention::make($file)
                ->resize(config('sistema.imagenes.WIDTH_THUMB'), null, function ($constraint){
                    $constraint->aspectRatio();
                });
        }

        // Confirma que el archivo no exista en el destino
        $nombre = $this->changeFileNameIfExists($file);

        $imagen = Image::create(['path' => $nombre, 'main' => 0]);

        $file->move(public_path('imagenes'), $nombre);

        $model->images()->save($imagen);

        $image_thumb = $this->makeThumb($img_thumb, $nombre, $model, null);
        $imagen->thumbnail_id = $image_thumb->id;
        $imagen->save();

        return $imagen;
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
        $img_thumb = Intervention::make($request->file('img'))
            ->resize(config('sistema.imagenes.WIDTH_THUMB'), config('sistema.imagenes.HEIGHT_THUMB'));

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