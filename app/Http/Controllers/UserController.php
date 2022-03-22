<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Config, Str, Image, Hash;
use App\User;
use App\Mail\MessageReceived;
use App\Proyect;

class UserController extends Controller
{

    public function __Construct()
    {
        $this->middleware('auth');
    }


    public function user_profile($id)
    {

        $clasificaciones                = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1               = DB::table('classifications')->get();
        $subclasificaciones1            = DB::table('subclassifications')->get();
        $proyectos                      = DB::table('proyects')->get();

        return view('efd.usuario.user-profile', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1', 'proyectos'));
    }

    public function user_edit($id)
    {

        $usuario                        = DB::table('users')->where('id', $id)->first();

        $clasificaciones                = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1               = DB::table('classifications')->get();
        $subclasificaciones1            = DB::table('subclassifications')->get();

        return view('efd.usuario.user-edit', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1', 'usuario'));
    }


    public function postAccountAvatar(Request $request)
    {

        $rules = [
    		'avatar'                        => 'required',
        ];

        $messages = [
            'avatar.required'               => 'Seleccione una imagen.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:
            if($request->hasFile('avatar')):

                $path = '/avatar/'. Auth::id();
                $fileExt = trim($request->file('avatar')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('avatar')->getClientOriginalName()));

                $filename = rand(1,999).'_'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;


               $g = User::find( Auth::id());
               $aa = $g->avatar;
               $g->avatar = $filename;

               if($g->save()):

                    if($request->hasFile('avatar')):
                        $fl = $request->avatar->storeAs($path, $filename, 'uploads');
                        $imag = Image::make($file_absolute);
                        $imag->resize(150, 150, function ($constraint) {
                            
                            $constraint->upsize();
                        });
                        $imag0 = Image::make($file_absolute);
                        $imag0->resize(350, 350, function ($constraint) {
                            
                            $constraint->upsize();
                        });
                        $imag->save($upload_path.'/'.$path.'/av_'.$filename);
                        $imag0->save($upload_path.'/'.$path.'/p_'.$filename);
                    
                    endif;
                    
                    unlink($upload_path.'/'.$path.'/av_'.$aa);
                    unlink($upload_path.'/'.$path.'/p_'.$aa);

                    return back()->with('message', ' Avatar actualizado con éxito.')->with('typealert', 'success')->withInput();

                endif;
            endif;
        endif;

    }

    public function postPasswordEdit(Request $request)
    {
        $rules = [
            'apassword'                        => 'required|min:8',
            'password'                        => 'required|min:8',
            'cpassword'                        => 'required|min:8|same:password'
        ];

        $messages = [
            'apassword.required'               => 'Escriba su contraseña actual',
            'apassword.min'               => 'La contraseña actual debe tenemer almenos 8 caracteres',
            'password.required'               => 'Escriba su nueva contraseña actual',
            'password.min'               => 'La nueva contraseña debe tenemer almenos 8 caracteres',
            'cpassword.required'               => 'Escriba la confirmación de contraseña',
            'cpassword.min'               => 'La confirmación de su contraseña debe tenemer almenos 8 caracteres',
            'cpassword.same'               => 'La contraseñas no coinciden'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:
            $u = User::find(Auth::id());
            if (Hash::check($request->input('apassword'), $u->password)):
                $u->password = Hash::make($request->input('password'));
                if($u->save()):
                    return back()->with('message','La contraseña se actualizo con éxito.')->with('typealert','success');
                endif;
            else:
                return back()->with('message','Las contraseña actual no coincide.')->with('typealert','danger');
            endif;


        endif;
    }


    public function postInfoEdit(Request $request)
    {
        $rules = [
            'name'                        => 'required',
            'lastname'                        => 'required',
            'phone'                        => 'required|min:10'
        ];

        $messages = [
            'name.required'               => 'El nombre es requerido',
            'lastname.required'               => 'Apellidos requeridos',
            'phone.required'               => 'Telefono requerido',
            'phone.min'               => 'El teléfono debe tener minimo 10 numeros'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:
            $u = User::find(Auth::id());
            $u->name = e($request->input('name'));
            $u->lastname = e($request->input('lastname'));
            $u->phone = e($request->input('phone'));
            $u->gender = e($request->input('gender'));

            if($u->save()):
                return back()->with('message','Su informacion se actualizo con éxito.')->with('typealert','success');
            endif;

        endif;
    }

}
