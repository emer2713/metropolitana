<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\User;
use App\Classification;

class ClassificationsController extends Controller
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
        $clasi = Classification::orderBy('orden', 'ASC')->get();
         $data = ['clasi' => $clasi];
        return view('admin.classifications.home', $data);

    }

    public function postClassificationAdd(Request $request)
    {
        $rules = [
            'name'                              => 'required',
            'classification'                    => 'required',
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear la Clasificación.',
            'classification.required'           => 'Se requiere una clasificación para crear la Clasificación.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = new Classification;
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->orden                       = e($request->input('orden'));
            $c ->color                       = e($request->input('color'));

            if($c->save()):

                return back()->with('message', ' Clasificación guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getClassificationEdit($id)
    {

        $clas = DB::table('classifications')->select(DB::raw('name, id'));
        $clasi = array() + $clas->pluck('name', 'id')->toArray();
        $cat = Classification::find( $id);
        $data = ['cat' => $cat, 'clasi' => $clasi];
        return view('admin.classifications.edit', $data);
    }


    public function postClassificationEdit(Request $request, $id)
    {
        $rules = [
            'name'                              => 'required',

        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear la Clasificación.',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = Classification::findOrFail( $id);
            $c ->status                     = e($request->input('status'));
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->orden                      = e($request->input('orden'));
            $c ->color                       = e($request->input('color'));


            if($c->save()):

                return redirect('/admin/classifications')->with('message', ' Clasificación guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }


    public function getClassificationDelete($id)
    {
        $c = Classification::find( $id);
        $c->slug   = null;
        if($c->save()):
            $c->delete();
            return back()->with('message', ' Clasificación elminada con éxito.')->with('typealert', 'success');

        endif;

    }


}
