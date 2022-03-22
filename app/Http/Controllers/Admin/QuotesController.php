<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\PGallery;
use App\Product;
use App\Proyect;
use App\User;
use Config;
use Str;
use Image;


class QuotesController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }
    public function getQuotes($status)
    {

        if($status == 'all'):

            $cotizaciones = Proyect::onlyTrashed()->orderBy('id', 'Desc')->get();

        else :

            $cotizaciones = Proyect::withoutTrashed()->orderBy('id', 'Desc')->get();

        endif;

        $data           = ['cotizaciones' => $cotizaciones];
        return view('admin.quotes.home', $data);

    }

    public function getHome()
    {
        $cotizaciones = Proyect::orderBy('name', 'ASC')->where('deleted_at', null)->get();
        $cotizacionesall = Proyect::orderBy('name', 'ASC')->get();
        $data = ['cotizaciones' => $cotizaciones, 'cotizacionesall' => $cotizacionesall];

        return view('admin.quotes.home', $data);

    }


    public function getQuoteDelete($id)
    {
        $c = Proyect::find( $id);

        if($c->delete()):

            return back()->with('message', ' Cotización atendida con éxito.')->with('typealert', 'success');

        endif;
    }

    public function postQuotesSearch (Request $request)
    {

        $rules = [
    		'search'                              => 'required'
        ];

        $messages = [
            'search.required'                     => 'Se requiere infomacion para buscar.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:
            switch ($request->input('filter')) :
                case '0':
                    switch ($request->input('status')) :
                        case '0':
                            $products = Proyect::withoutTrashed()->where('name', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'DESC')->get();
                        break;
                        case '1':
                            $products = Proyect::onlyTrashed()->where('name', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'DESC')->get();

                        break;
                    endswitch;
                    break;
                case '1':
                    switch ($request->input('status')) :
                        case '0':
                            $products = Proyect::withoutTrashed()->where('sku', $request->input('search'))->orderBy('id', 'DESC')->get();
                        break;
                        case '1':
                            $products = Proyect::onlyTrashed()->where('sku', $request->input('search'))->orderBy('id', 'DESC')->get();
                        break;
                    endswitch;
                    break;
            endswitch;

            $data = ['cotizaciones' => $products];
            return view('admin.quotes.home', $data);

        endif;
    }
}
