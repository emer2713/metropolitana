<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config, Str, Image;
use App\User;
use App\Filmography;

class FilmographiesController extends Controller
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
        $cats = Filmography::orderBy('name', 'ASC')->get();
        $data = ['cats' => $cats];
        return view('admin.filmographies.home', $data);

    }

    public function postFilmographyAdd(Request $request)
    {
        $rules = [
            'file'                              => 'required',
            'year'                              => 'required'

        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear un Filmography.',
            'file.required'                     => 'Seleccione una imagen destacada un Filmography.',
            'file.image'                        => 'El archivo no es una imagen.',
            'year.required'                     => 'Se requiere un año para agregar una fiomografá.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $path = '/Filmografia';
            $fileExt = trim($request->file('file')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_absolute = $upload_path.'/'.$path.'/'.$filename;

            $c = new Filmography;
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->file_path                  = $path;
            $c ->file                       = $filename;
            $c ->status                       ='draft';


            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute);
                    $imag->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;

                return back()->with('message', ' Filmografía guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getFilmographyEdit($id)
    {


        $cat                = Filmography::find( $id);
        $data               = ['cat' => $cat];
        return view('admin.filmographies.edit', $data);
    }

    public function postFilmographyEdit(Request $request, $id)
    {
        $rules = [

            'name'                              => 'required',

        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para editar una filmografía.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $c = Filmography::findOrFail( $id);
            $imagepp                        = $c->file_path;
            $imagep                         = $c->file;
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->file_path                  = $path;
            $c ->file                       = $filename;
            if($request->hasFile('file')):

                $path = '/Filmografia';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;

                $c ->file_path            = $path;
                $c ->file                 = $filename;

            endif;

            $c ->year_id                     = e($request->input('year'));

            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute);
                    $imag->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/'.$imagep);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/t_'.$imagep);
                endif;

                return redirect('/admin/filmographies')->with('message', ' Filmografía guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getFilmographyDelete($id)
    {
        $c = Filmography::find( $id);

        if($c->delete()):

            return back()->with('message', ' Filmografía elminada con éxito.')->with('typealert', 'success');

        endif;
    }


}
