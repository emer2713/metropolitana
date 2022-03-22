<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use App\Category;
use App\PGallery;
use App\Product;
use App\Subclassification;
use App\User;
use App\Beer;
use App\Food;
use App\Promotion;
use Input;

class ProductsController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome($status)
    {

        $products = DB::table('names')
        ->join('products', 'names.product_id', '=', 'products.id')->get();

        //dd($products);
        //$products = Product::orderBy('id', 'DESC')->get();



        $data = ['cats' => $products];
        return view('admin.products.home', $data);

    }

    public function getProductAdd()
    {
        return view('admin.products.add');
    }

    public function postProductAdd(Request $request)
    {
        $rules = [
            'sku'                                   => 'required',
        ];

        $messages = [
            'sku.required'                          => 'El Sku del producto es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $product = new Product;
            $product ->status               = '1';
            $product ->sku                  = 'P-'.e($request->input('sku'));
            $product ->sku_product          = e($request->input('sku'));


            if($product->save()):

                return redirect('/admin/products/1')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getProductEdit($id)
    {
        $product        = Product::findOrFail($id);
        $data           = ['cat' => $product];
         return view('admin.products.edit', $data);
    }

    public function postProductEdit(Request $request, $id)
    {
        $rules = [
            'sku'                                   => 'required'
        ];

        $messages = [
            'sku.required'                          => 'El Sku del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $product                        = Product::findOrFail( $id);
            $product ->status               = '1';
            $product ->sku                  = e($request->input('sku'));
            $product ->sku_product          = e($request->input('sku'));

            if($product->save()):

                return back()->with('message', ' Prodcuto actualizado con éxito.')->with('typealert', 'success')->withInput();

            endif;


        endif;

    }

    public function getProductDelete($id)
    {
        $product = Product::find( $id);

        if($product->delete()):

            return back()->with('message', ' Producto enviado con éxito a la papeplera.')->with('typealert', 'success')->withInput();

        endif;
    }

    public function postProductSearch (Request $request)
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
                    $products = Product::with(['cat'])->where('name', 'LIKE', '%'.$request->input('search').'%')->where('status', $request->input('status'))->orderBy('id', 'DESC')->get();
                    break;
                case '1':
                    $products = Product::with(['cat'])->where('sku', $request->input('search'))->orderBy('id', 'DESC')->get();
                    break;
            endswitch;

            $data = ['products' => $products];
            return view('admin.products.search', $data);

        endif;
    }


    public function getProductRestore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product ->deleted_at   = null;

            if ($product->save()):

                return redirect('/admin/product/'.$product->id.'/edit')->with('message', ' El producto se restauro correctamente.')->with('typealert', 'success')->withInput();

            else:
                return back()->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
            endif;

    }



    //BEERS
    public function getBeersHome($status)
    {

        $clasificacion          = DB::table     ('classifications')         ->where('slug', 'cervezas')         ->first();
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', $clasificacion->id)      ->orderBy   ('orden', 'ASC')->get();
        //dd($subclasificaciones);

        if($status == 'all'):

            $beers = Beer::orderBy('id', 'Desc')->where('classification_id', $clasificacion->id)->get();

        else :

            $beers = Beer::orderBy('id', 'Desc')->where('classification_id', $clasificacion->id)->where('subclassification_id', $status)->get();

        endif;


        //dd($products);
        //$products = Product::orderBy('id', 'DESC')->get();



        $data = ['beers' => $beers,
        'subclasificaciones' => $subclasificaciones
        ];
        return view('admin.beers.home', $data);
    }

    public function getBeerAdd()
    {
        $clasificacion          = DB::table     ('classifications')         ->where('slug', 'cervezas')         ->first();
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', $clasificacion->id)      ->orderBy   ('orden', 'ASC')->get();
        $types                  = DB::table     ('types')          ->orderBy   ('name', 'ASC')->get();
        $data = [

        'subclasificaciones' => $subclasificaciones,
        'types'             => $types
        ];
        return view('admin.beers.add', $data);
    }

    public function postBeerAdd(Request $request)
    {
        $rules = [
            'name'                                   => 'required',
            'style'                                   => 'required',
            'price'                                   => 'required',
            'alcohol'                                   => 'required',
            'malts'                                   => 'required',
            'fermentation'                                   => 'required',
            'description'                                   => 'required',

        ];

        $messages = [
            'name.required'                                   => 'El nombre es requerido',
            'style.required'                                   => 'El estilo es requerido',
            'price.required'                                   => 'El precio es requerido',
            'alcohol.required'                                   => 'La cantida de grados de alcohol es requerida',
            'malts.required'                                        => 'El tipo de malta es requerido',
            'fermentation.required'                                   => 'El tipo de fermentación es requerido',
            'description.required'                                   => 'La descripción de la cerveza es requerida',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $c = $request->input('subclassification');
            $d = Subclassification::where('id',$c)->first();

            $product = new Beer;
            $product ->status                       ='draft';
            $filename                               = rand(1,99999999);
            $product ->sku                          = 'A-'.$filename;
            $product ->classification_id            = $d->classification_id;
            $product ->subclassification_id         = $request->input('subclassification');
            $product ->type_id                      = $request->input('type');
            $product ->name                         = e($request->input('name'));
            $product ->style                        = e($request->input('style'));
            $product ->price                        = e($request->input('price'));
            $product ->malts                        = e($request->input('malts'));
            $product ->alcohol                      = e($request->input('alcohol'));
            $product ->fermentation                 = e($request->input('fermentation'));
            $product ->description                  = e($request->input('description'));




            if($product->save()):

                return redirect('/admin/beers/all')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getBeerEdit($id)
    {
        $product                = Beer::findOrFail($id);
        $clasificacion          = DB::table     ('classifications')->where('slug', 'cervezas')->first();
        $alimento          = DB::table     ('classifications')->where('slug', 'alimentos')->first();
        $subclasificaciones     = Subclassification::where('classification_id', $clasificacion->id)      ->orderBy   ('name', 'ASC')->get();
        $clasi = array() + $subclasificaciones->pluck('name', 'id')->toArray();
        $types0                  = DB::table     ('types')          ->orderBy   ('name', 'ASC')->get();
        $types = array() + $types0->pluck('name', 'id')->toArray();
        //dd($clasi);
        $dishes  = Food::orderBy   ('name', 'ASC') ->where('status', 'published')->get();

        $foods       = DB::table('beer_food')
                ->join('food', 'beer_food.food_id', '=', 'food.id')
                ->where('classification_id', $alimento->id)
                ->get();

        //dd($foods);
        $foods0       = DB::table('beer_food')->where('beer_id', $id)
        ->join('food', 'beer_food.food_id', '=', 'food.id')->get();

        $data = [

        'subclasificaciones' => $subclasificaciones,
        'subclasi'          => $clasi,
        'types'             => $types,
        'product'           => $product,
        'dishes'            => $dishes,
        'foods'            => $foods,
        'foods0'            => $foods0
        ];

         return view('admin.beers.edit', $data);
    }

    public function postBeerEdit(Request $request, $id)
    {
        $rules = [

        ];

        $messages = [
            'sku.required'                          => 'El Sku del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $c = $request->input('subclassification');
            $d = Subclassification::where('id',$c)->first();

            $product                        = Beer::findOrFail( $id);
            $product ->status                       =$request->input('status');
            $product ->classification_id            = $d->classification_id;
            $product ->subclassification_id         = $request->input('subclassification');
            $product ->type_id                      = $request->input('type');
            $product ->name                         = e($request->input('name'));
            $product ->style                        = e($request->input('style'));
            $product ->price                        = e($request->input('price'));
            $product ->malts                        = e($request->input('malts'));
            $product ->alcohol                      = e($request->input('alcohol'));
            $product ->fermentation                 = e($request->input('fermentation'));
            $product ->description                  = e($request->input('description'));

            $product->foods()->sync($request->get('foods'));

            if($product->save()):
                return back()->with('message', ' Cerveza actualizada con éxito.')->with('typealert', 'warning')->withInput();

            endif;

        endif;

    }

    public function getBeerDelete($id)
    {
        $product = Beer::findOrFail( $id);

        if($product->delete()):

            return back()->with('message', ' Cerveza eliminada.')->with('typealert', 'danger')->withInput();

        endif;
    }

    public function getBeerRestore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product ->deleted_at   = null;

            if ($product->save()):

                return redirect('/admin/product/'.$product->id.'/edit')->with('message', ' El producto se restauro correctamente.')->with('typealert', 'success')->withInput();

            else:
                return back()->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
            endif;

    }



    //FOOD
    public function getFoodsHome($status)
    {

        $clasificacion          = DB::table     ('classifications')         ->where('slug', 'alimentos')         ->first();
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', $clasificacion->id)      ->orderBy   ('orden', 'ASC')->get();
        //dd($subclasificaciones);

        if($status == 'all'):

            $foods = Food::orderBy('id', 'Desc')->where('classification_id', $clasificacion->id)->get();

        else :

            $foods = Food::orderBy('id', 'Desc')->where('classification_id', $clasificacion->id)->where('subclassification_id', $status)->get();

        endif;


        //dd($products);
        //$products = Product::orderBy('id', 'DESC')->get();



        $data = ['foods' => $foods,
        'subclasificaciones' => $subclasificaciones
        ];
        return view('admin.foods.home', $data);
    }
    public function getFoodAdd()
    {
        $clasificacion          = DB::table     ('classifications')         ->where('slug', 'alimentos')         ->first();
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', $clasificacion->id)      ->orderBy   ('orden', 'ASC')->get();

        $data = [

        'subclasificaciones' => $subclasificaciones
        ];
        return view('admin.foods.add', $data);
    }

    public function postFoodAdd(Request $request)
    {
        $rules = [
            'name'                                   => 'required',
            'price'                                   => 'required',
            'file'                              => 'required',

        ];

        $messages = [
            'file.required'                     => 'Seleccione una imagen de platillo.',
            'file.image'                        => 'El archivo no es una imagen.',
            'name.required'                                   => 'El nombre es requerido',
            'style.required'                                   => 'El estilo es requerido',
            'price.required'                                   => 'El precio es requerido',
            'alcohol.required'                                   => 'La cantida de grados de alcohol es requerida',
            'malts.required'                                        => 'El tipo de malta es requerido',
            'fermentation.required'                                   => 'El tipo de fermentación es requerido',
            'description.required'                                   => 'La descripción del ´platillo es requerida',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $c = $request->input('subclassification');
            $d = Subclassification::where('id',$c)->first();

            if($request->hasFile('file')):
                $path = '/foods/'.$d->slug;
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;


            endif;

            $product = new Food;
            $product ->status                       ='draft';
            $filename0                               = rand(1,999999);
            $product ->sku                          = 'C-'.$filename0;
            $product ->classification_id            = $d->classification_id;
            $product ->subclassification_id         = $request->input('subclassification');
            $product ->file_path                  = $path;
            $product ->file                       = $filename;
            $product ->name                         = e($request->input('name'));
            $product ->price                        = e($request->input('price'));
            $product ->description                  = e($request->input('description'));
            $imagepp                                = $path;
            $imagep                                 = $filename;


            if($product->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute);
                    $imag->resize(150, 150, function ($constraint) {

                        $constraint->upsize();
                    });
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);

                    $imagm = Image::make($file_absolute);
                    $imagm->resize(500, 500, function ($constraint) {

                        $constraint->upsize();
                    });
                    $imagm->save($upload_path.'/'.$path.'/'.$filename);

                endif;

                return redirect('/admin/foods/all')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getFoodEdit($id)
    {
        $product                = Food::findOrFail($id);
        $clasificacion          = DB::table     ('classifications')         ->where('slug', 'cervezas')         ->first();
        $subclasificaciones     = Subclassification::where('classification_id', '10')      ->orderBy   ('name', 'ASC')->get();
        $clasi = array() + $subclasificaciones->pluck('name', 'id')->toArray();
        $types0                  = DB::table     ('types')          ->orderBy   ('name', 'ASC')->get();
        $types = array() + $types0->pluck('name', 'id')->toArray();
        //dd($clasi);
        $dishes  = Beer::orderBy   ('name', 'ASC')->get();
        $data = [

        'subclasificaciones' => $subclasificaciones,
        'subclasi'          => $clasi,
        'types'             => $types,
        'product'           => $product,
        'dishes'            => $dishes
        ];
         return view('admin.foods.edit', $data);
    }

    public function postFoodEdit(Request $request, $id)
    {
        $rules = [

        ];

        $messages = [
            'sku.required'                          => 'El Sku del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $c = $request->input('subclassification');
            $d = Subclassification::where('id',$c)->first();

            $product                        = Food::find( $id);
            $product ->status                       =$request->input('status');
            $product ->classification_id            = $d->classification_id;
            $product ->subclassification_id         = $request->input('subclassification');
            $product ->name                         = e($request->input('name'));
            $product ->price                        = e($request->input('price'));
            $product ->description                  = e($request->input('description'));
            $imagepp                        = $product->file_path;
            $imagep                         = $product->file;

            if($request->hasFile('file')):

                $path = '/foods/'.$d->slug;
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;

                $product ->file_path            = $path;
                $product ->file                 = $filename;

            endif;


            if($product->save()):


                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute);
                    $imag->resize(150, 150, function ($constraint) {

                        $constraint->upsize();
                    });

                    $imagm = Image::make($file_absolute);
                    $imagm->resize(500, 500, function ($constraint) {

                        $constraint->upsize();
                    });
                    $imagm->save($upload_path.'/'.$path.'/'.$filename);
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);

                endif;

                return back()->with('message', ' Prodcuto actualizado con éxito.')->with('typealert', 'success')->withInput();

            endif;

        endif;

    }

    public function getFoodDelete($id)
    {
        $product = Food::find( $id);

        if($product->delete()):

            return back()->with('message', ' Producto enviado con éxito a la papeplera.')->with('typealert', 'success')->withInput();

        endif;
    }

    public function getFoodstore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product ->deleted_at   = null;

            if ($product->save()):

                return redirect('/admin/product/'.$product->id.'/edit')->with('message', ' El producto se restauro correctamente.')->with('typealert', 'success')->withInput();

            else:
                return back()->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
            endif;

    }



    //DRINK
    public function getDrinkAdd()
    {
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', 12)      ->get();
        $drinks = Product::get();
        $data = [

        'subclasificaciones' => $subclasificaciones,
        'drinks' => $drinks

        ];

        //dd($subclasificaciones);
        return view('admin.drinks.home', $data);
    }

    public function postDrinkAdd(Request $request)
    {
        $rules = [
            'name'                                   => 'required',
        ];

        $messages = [
            'name.required'                          => 'El nombre del paquete es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $filename = rand(1,99999999);
             if($request->hasFile('file')):

                $path = '/Drinks';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;


            endif;

            $product = new Product();
            $product ->subclassification_id               = e($request->input('subclassification'));;
            $product ->sku                  = 'D-'.$filename;
            $product ->name          = e($request->input('name'));
            $product ->file_path                  = $path;
            $product ->file                       = $filename;
            $product ->alcohol          = e($request->input('alcohol'));
            $product ->price          = e($request->input('price'));
            $product ->status                       ='draft';





            if($product->save()):

                return redirect('/admin/drinks')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getDrinkEdit(Request $request)
    {
        $subclasificaciones     = DB::table     ('subclassifications')      ->where('classification_id', 12)      ->get();
        $drinks = Product::findOrFail($request -> id);
        $clasificacion          = DB::table     ('classifications')         ->where('slug', 'mas-bebidas')         ->first();
        $subclasificaciones     = Subclassification::where('classification_id', $clasificacion->id)      ->orderBy   ('name', 'ASC')->get();
        $clasi = array() + $subclasificaciones->pluck('name', 'id')->toArray();
        $types0                  = DB::table     ('types')          ->orderBy   ('name', 'ASC')->get();
        $types = array() + $types0->pluck('name', 'id')->toArray();
        $data = [

        'subclasificaciones' => $subclasificaciones,
        'cat' => $drinks,
        'subclasi' => $clasi

        ];

        //dd($subclasificaciones);
        return view('admin.drinks.edit', $data);
    }

    public function postDrinkEdit(Request $request)
    {
        $rules = [
            'name'                                   => 'required',
        ];

        $messages = [
            'name.required'                          => 'El nombre del paquete es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $filename = rand(1,99999999);
             if($request->hasFile('file')):

                $path = '/Drinks';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;


            endif;

            $product                        = Product::findOrFail( $request->id);
            $product ->subclassification_id               = e($request->input('subclassification'));;
            $product ->sku                  = 'D-'.$filename;
            $product ->name          = e($request->input('name'));
            $product ->file_path                  = $path;
            $product ->file                       = $filename;
            $product ->alcohol          = e($request->input('alcohol'));
            $product ->price          = e($request->input('price'));
            $product ->status               = $request->input('status');




            if($product->save()):

                return redirect('/admin/drinks')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getDrinkDelete($id)
    {
        $product = Product::find( $id);

        if($product->delete()):

            return back()->with('message', ' Producto enviado con éxito a la papeplera.')->with('typealert', 'success')->withInput();

        endif;
    }




    //PROMOTIONS
    public function getPromotions()
    {
        $principal = Promotion::where('principal', '1')->get();
        $paquetes = Promotion::orderBy('id', 'desc')->where('principal', '0')->get();
        $data = [
            'paquetes' => $paquetes,
            'principal' => $principal

        ];
        return view('admin.promotions.home', $data);
    }

    public function postPromotionAdd(Request $request)
    {
        $rules = [
            'name'                                   => 'required',
        ];

        $messages = [
            'name.required'                          => 'El nombre del paquete es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $filename = rand(1,99999999);


            $product = new Promotion;
            $product ->principal               = $request->input('principal');
            $product ->sku                  = 'P-'.$filename;
            $product ->name          = e($request->input('name'));

            $product ->price               = e($request->input('price'));
            $product ->description               = e($request->input('description'));
            $product ->status                       ='draft';

            if($request->hasFile('file')):

                $path = '/Paquetes';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;
                $product ->file_path                  = $path;
                 $product ->file                       = $filename;

            endif;

            if($request->hasFile('file_icon')):

                 $fileExt = trim($request->file('file_icon')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file_icon')->getClientOriginalName()));
                $filenameicon = rand(1,999).'-'.$name.'.'.$fileExt;
                 $product ->file_icon                       = $filenameicon;

            endif;

            if($product->save()):
                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imagT = Image::make($file_absolute);
                    $imagT->resize(150, 150, function($constraint){
                        $constraint->upsize();
                    });
                    $imagW = Image::make($file_absolute);
                    $imagW->resize(1080, 720, function($constraint){
                        $constraint->upsize();
                    });
                    $imagT->save($upload_path.'/'.$path.'/t_'.$filename);
                    $imagW->save($upload_path.'/'.$path.'/'.$filename);


                endif;

                if($request->hasFile('file_icon')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');

                    $imagH = Image::make($file_absolute);
                    $imagH->resize(480, 640, function($constraint){
                        $constraint->upsize();
                    });
                    $imagH->save($upload_path.'/'.$path.'/'.$filename);
                endif;



                return redirect('/admin/promotions')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getPromotionDelete($id)
    {
        $product = Promotion::find( $id);

        if($product->delete()):

            return back()->with('message', ' Producto enviado con éxito a la papeplera.')->with('typealert', 'success')->withInput();

        endif;
    }

    public function getPromoEdit($id)
    {
        $product        = Promotion::find($id);
        $img = DB::table('c_mobiles')->where('carousel_id', $id)->get();
        $a = DB::table('c_mobiles')->where('carousel_id', $id)->get()->count();
        $principal = Promotion::where('principal', '1')->get()->count();

        $data = ['cat' => $product, 'img' => $img, 'a' => $a, 'principal' => $principal];


       // dd($img);
         return view('admin.promotions.edit0', $data);
    }

    public function postPromoEdit(Request $request, $id)
    {
        $rules = [
            'name'                                   => 'required',
        ];

        $messages = [
            'name.required'                          => 'El nombre del paquete es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $filename = rand(1,99999999);
            $filename2 = rand(1,99999999);


            $product = Promotion::find($id);
            $product ->principal               = $request->input('principal');
            $product ->sku                  = 'P-'.$filename;
            $product ->name          = $request->input('name');

            $product ->price               = $request->input('price');
            $product ->description               = $request->input('description');

            $product ->status               = $request->input('status');
            if($request->hasFile('file')):

                $path = '/Paquetes';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;
                $product ->file_path                  = $path;
                 $product ->file                       = $filename;

            endif;

            if($request->hasFile('file_icon')):
                $path = '/Paquetes';
                 $fileExt = trim($request->file('file_icon')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file_icon')->getClientOriginalName()));
                $filenameicon = rand(1,999).'-'.$name.'.'.$fileExt;
                 $product ->file_icon                       = $filenameicon;
                 $file_absolute = $upload_path.'/'.$path.'/'.$filenameicon;

            endif;


            if($product->save()):
                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imagT = Image::make($file_absolute);
                    $imagT->resize(150, 150, function($constraint){
                        $constraint->upsize();
                    });
                    $imagW = Image::make($file_absolute);
                    $imagW->resize(1080, 720, function($constraint){
                        $constraint->upsize();
                    });
                    $imagT->save($upload_path.'/'.$path.'/t_'.$filename);
                    $imagW->save($upload_path.'/'.$path.'/'.$filename);


                endif;

                if($request->hasFile('file_icon')):
                    $f2 = $request->file_icon->storeAs($path, $filenameicon, 'uploads');

                    $imagH = Image::make($file_absolute);
                    $imagH->resize(480, 640, function($constraint){
                        $constraint->upsize();
                    });
                    $imagH->save($upload_path.'/'.$path.'/'.$filenameicon);
                endif;

                return redirect('/admin/promotions')->with('message', ' Producto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }


}

