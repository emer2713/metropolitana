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
use App\Subclassification;

class SubclassificationsController extends Controller
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
        $clasi = Classification::orderBy('name', 'ASC')->get();
        $cats = Subclassification::orderBy('orden', 'ASC')->get();
        $data = ['cats' => $cats, 'clasi' => $clasi];
        return view('admin.subclassifications.home', $data);

    }

    public function postSubclassificationAdd(Request $request)
    {
        $rules = [
            'name'                              => 'required',
            'classification'                    => 'required',
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear la subclasificación.',
            'classification.required'           => 'Se requiere una clasificación para crear la subclasificación.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = new Subclassification;
            $c ->classification_id          = e($request->input('classification'));
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->orden                       = e($request->input('orden'));
            $c ->color                       = e($request->input('color'));

            if($c->save()):

                return back()->with('message', ' Subclasificación guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getSubclassificationEdit($id)
    {

        $clas = DB::table('classifications')->select(DB::raw('name, id'));
        $clasi = array() + $clas->pluck('name', 'id')->toArray();
        $cat = Subclassification::find( $id);
        $data = ['cat' => $cat, 'clasi' => $clasi];
        return view('admin.subclassifications.edit', $data);
    }


    public function postSubclassificationEdit(Request $request, $id)
    {
        $rules = [
            'name'                              => 'required',
            'classification'                    => 'required',
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear la subclasificación.',
            'classification.required'           => 'Se requiere una clasificación para crear la subclasificación.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = Subclassification::findOrFail( $id);
            $c ->status                     = e($request->input('status'));
            $c ->classification_id          = e($request->input('classification'));
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->orden                      = e($request->input('orden'));
            $c ->color                       = e($request->input('color'));


            if($c->save()):

                return redirect('/admin/subclassifications')->with('message', ' Subclasificación guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }


    public function getSubclassificationDelete($id)
    {
        $c = Subclassification::find( $id);
        $c->slug   = null;
        if($c->save()):
            $c->delete();
            return back()->with('message', ' Subclasificación elminada con éxito.')->with('typealert', 'success');

        endif;

    }


}
