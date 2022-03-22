<?php

namespace App\Http\Controllers\Blog;

use App\Carousel;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
Use App\Mail\UserSendQuote;
Use App\Mail\EFDSendQuote;
use Config, Str, Image;
use App\User;
use App\Mail\MessageReceived;
use App\Proyect;
use App\Mail\EFDmail;
use App\Classification;
use App\Subclassification;
use App\Product;
use App\Beer;
use App\Food;
use App\Promotion;
use Dompdf\Dompdf;
use App\CMobile;


class HomeController extends Controller
{
    public function getHome()
    {
        $subclasificaciones = DB::table('subclassifications')->orderBy('orden', 'ASC')->get();
        $carrousels = DB::table('carousels')->orderBy('name', 'ASC')->where('deleted_at', null)->where('status', 'published')->get();
        $bestsellers = DB::table('bestsellers')->take(10)->get();
        $promotions = Promotion::orderBy   ('id', 'ASC')->where('status', 'published')->get();

        $data = [

                    'subclasificaciones'    => $subclasificaciones,
                    'carrousels'            => $carrousels,
                    'bestsellers'           => $bestsellers,
                    'promotions'            =>$promotions
                ];

        return view('efd.principal.home', $data);
    }

    public function getMedia()
    {

        return view('efd.blog.media');
    }
    public function filmografia()
    {


        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $years                   = DB::table     ('years')                       ->orderBy('name','DESC')->get();
        $filmografias           = DB::table     ('filmographies')               ->get();


        return view('experience.experiencia', compact( 'clasificaciones', 'subclasificaciones', 'years', 'filmografias' ));

    }


    public function getBeers($slug)
    {
        $clasificacion          = DB::table     ('classifications')         ->where('slug', $slug)         ->first();
        $subclasificaciones     = Subclassification::where('classification_id', $clasificacion->id)->where('status', '1')      ->orderBy   ('orden', 'ASC')->get();
        $cervezas               = Beer::where('classification_id', $clasificacion->id)->where('status', 'published')      ->orderBy   ('name', 'ASC')->get();

        $sugeridos = DB::table     ('beer_food')
        ->join('food', 'beer_food.food_id', '=', 'food.id')
        ->select(

            'beer_food.beer_id',
            'beer_food.food_id',
            'food.status',
            'food.sku',
            'food.file_path',
            'food.file',
            'food.name',
            'food.slug',
            'food.subclassification_id',

        )
        ->where('food.status', 'published')
        ->get();


        $tp = count($cervezas );

        $data = [

            'subclasificaciones'    => $subclasificaciones,
            'clasificacion'         => $clasificacion,
            'cervezas'              => $cervezas,
            'sugeridos'             =>$sugeridos,
            'tp'             =>$tp
        ];
        //dd($sugeridos);
        return view('efd.blog.beers', $data);

    }

    public function getFoods($slug)
    {
        $clasificaciones        = DB::table     ('classifications')         ->orderBy   ('orden', 'ASC')->get();

        $clasificacion          = DB::table     ('classifications')         ->where('slug', $slug)         ->first();
        $subclasificaciones     = Subclassification::where('classification_id', $clasificacion->id)->where('status', '1')->orderBy   ('orden', 'ASC')->get();
        $cervezas               = food::where('classification_id', $clasificacion->id)->where('status', 'published')       ->orderBy   ('name', 'ASC')->get();
        $sugeridos = DB::table     ('beer_food')
        ->join('beers', 'beer_food.beer_id', '=', 'beers.id')
        ->get();

        $data = [
            'clasificaciones'       => $clasificaciones,
            'subclasificaciones'    => $subclasificaciones,
            'clasificacion'         => $clasificacion,
            'cervezas'              => $cervezas,
            'sugeridos'             =>$sugeridos
        ];
        //dd($cervezas);
        return view('efd.blog.foods', $data);

    }

    public function getDrinks($slug)
    {
        $clasificaciones        = DB::table     ('classifications')         ->orderBy   ('orden', 'ASC')->get();

        $clasificacion          = DB::table     ('classifications')         ->where('slug', $slug)         ->first();
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', $clasificacion->id)->where('status', '1')->orderBy   ('orden', 'ASC')->get();
        $c =  Subclassification::where('classification_id', $clasificacion->id)      ->orderBy   ('orden', 'ASC')->take(1)->get();

        $cervezas               = DB::table     ('products')       ->orderBy   ('name', 'ASC')->where('status', 'published')->get();
        $data = [
            'clasificaciones'       => $clasificaciones,
            'subclasificaciones'    => $subclasificaciones,
            'clasificacion'         => $clasificacion,
            'cervezas'         => $cervezas,
            'c'         => $c,

        ];

        return view('efd.blog.drinks', $data);

    }

    public function getPromotions($slug)
    {
        $clasificaciones        = DB::table     ('classifications')         ->orderBy   ('orden', 'ASC')->get();

        $clasificacion          = DB::table     ('classifications')         ->where('slug', $slug)         ->first();
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', $clasificacion->id)      ->orderBy   ('orden', 'ASC')->get();
        //dd($subclasificaciones);
        $promotions               = Promotion::where('principal', '0')->where('status', 'published')->orderBy('id', 'ASC')->get();
        $principal               = DB::table     ('promotions')->where('principal', '1')->where('status', 'published')->get();
        $cp = count( $principal);
       // dd($promotions);
        $data = [
            'clasificaciones'       => $clasificaciones,
            'subclasificaciones'    => $subclasificaciones,
            'clasificacion'         => $clasificacion,
            'promotions'         => $promotions,
            'principal'         => $principal,
            'cp'         => $cp



        ];

        return view('efd.blog.promotions', $data);

    }



    public function postCarouselMobileAdd(Request $request, $id)
    {


        $path = '/Paquetes';
        $fileExt = trim($request->file('file')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        $file_absolute = $upload_path.'/'.$path.'/'.$filename;
        $file_url = 'multimedia'.$path.'/'.$filename;

            $c = new CMobile;
            $c ->carousel_id                = $id;
            $c ->file_path                  = $path;
            $c ->file                       = $filename;
            $c ->mobile                     = asset($file_url);
            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imagT = Image::make($file_absolute);
                    $imagT->resize(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imagW = Image::make($file_absolute);
                    $imagW->resize(480, 850, function($constraint){
                        $constraint->upsize();
                    });
                    $imagT->save($upload_path.'/'.$path.'/t_'.$filename);
                    $imagW->save($upload_path.'/'.$path.'/'.$filename);

                endif;

                return back()->with('message', ' Carousel Mobile actualizado con éxito.')->with('typealert', 'success');

            endif;


    }
    public function getCarouselMobileDelete($id)
    {
        $c = CMobile::find( $id);

        if($c->delete()):

            return back()->with('message', ' Carousel Mobile elminado con éxito.')->with('typealert', 'success');

        endif;
    }

}

