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
use App\Kit;
use App\Proyect;
use App\Subclassification;
use App\User;
use App\Carousel;
use App\Filmography;
use Config;
use Str;
use Image;

class DashboardController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getDashboard()
    {
        $users = User::count();
        $categories = Category::count();
        $subclasificaciones = Subclassification::count();


        $data           = ['news'=> $news, 'carousel'=> $carousel, 'filmografia'=> $filmografia,'warehouse'=> $warehouse, 'users' => $users, 'categories' => $categories, 'products' => $products, 'cotizaciones' => $cotizaciones, 'cotizacionesall' => $cotizacionesall, 'familias' => $familias, 'kits' => $kits, 'subclasificaciones' => $subclasificaciones, 'subarea' => $subarea];
        return view('admin.dashboard', $data);

    }

}
