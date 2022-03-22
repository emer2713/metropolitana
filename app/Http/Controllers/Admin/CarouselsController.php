<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Config, Str, Image;
use App\User;
use App\Carousel;
use App\CMobile;

class CarouselsController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome()
    {
        $cats = Carousel::orderBy('name', 'ASC')->get();
        $data = ['cats' => $cats];
        return view('admin.carousels.home', $data);

    }

    public function postCarouselAdd(Request $request)
    {
        $rules = [

            'file'                              => 'required'

        ];

        $messages = [
            'file.required'                     => 'Seleccione una imagen destacada un carousel.',
            'file.image'                        => 'El archivo no es una imagen.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $path = '/Carousels';
            $fileExt = trim($request->file('file')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_absolute = $upload_path.'/'.$path.'/'.$filename;

            $c = new Carousel;
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->file_path                  = $path;
            $c ->file                       = $filename;
            $c ->url                        = e($request->input('url'));
            $c ->status               = 'draft';


            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imagT = Image::make($file_absolute);
                    $imagT->resize(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imagW = Image::make($file_absolute);
                    $imagW->resize(1366, 768, function($constraint){
                        $constraint->upsize();
                    });
                    $imagT->save($upload_path.'/'.$path.'/t_'.$filename);
                    $imagW->save($upload_path.'/'.$path.'/'.$filename);
                endif;

                return back()->with('message', ' Carousel guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getCarouselEdit($id)
    {

        $cat                = Carousel::find( $id);
        $mobileImages = DB::table ('c_mobiles')->where('carousel_id', $id)->get();
         $imgs = count($mobileImages);
        //dd($mobileImages) ;

        $data               = ['cat' => $cat, 'mobileImages' => $mobileImages, 'imgs' => $imgs];
        return view('admin.carousels.edit', $data);
    }

    public function postCarouselEdit(Request $request, $id)
    {
        $rules = [

            'name'                              => 'required'

        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para editar una familia.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:
           
            $c = Carousel::findOrFail( $id);
            $imagepp                        = $c->file_path;
            $imagep                         = $c->file;
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
             $c ->status               = $request->input('status');

            if($request->hasFile('file')):

                $path = '/Carousels';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;
                $c ->file_path                  = $path;
                $c ->file                       = $filename;
              

            endif;

            $c ->url                        = e($request->input('url'));

            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imagT = Image::make($file_absolute);
                    $imagT->resize(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imagW = Image::make($file_absolute);
                    $imagW->resize(1366, 768, function($constraint){
                        $constraint->upsize();
                    });
                    $imagT->save($upload_path.'/'.$path.'/t_'.$filename);
                    $imagW->save($upload_path.'/'.$path.'/'.$filename);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/'.$imagep);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/t_'.$imagep);
                endif;

                return redirect('/admin/carousels')->with('message', ' Carousel guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getCarouselDelete($id)
    {
        $c = Carousel::find( $id);

        if($c->delete()):

            return back()->with('message', ' Carousel elminado con éxito.')->with('typealert', 'success');

        endif;
    }



}
