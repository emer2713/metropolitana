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
use App\User;
use Config;
use Str;
use Image;

class UserController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getUsers($status)
    {

        if($status == 'all'):

            $users = User::orderBy('id', 'Desc')->paginate(25);

        else :

            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(25);

        endif;

        $data           = ['users' => $users];
        return view('admin.users.home', compact('users'));

    }

    public function getUserEdit($id)
    {
        $user           = User::findOrFail($id);
        $data           = ['user' => $user];
        return view('admin.users.users_edit', $data);

    }

    public function postUserEdit(Request $request, $id)
    {
        $user           = User::findOrFail($id);

        $user->role = $request->input('user_type');
        if($request->input('user_type') == "1"):
            if(is_null($user->permissions)):
                $permissions = [

                    'dashboard'                     => true,

                ];
                $permissions = json_encode($permissions);
                $user->permissions = $permissions;
            endif;
        else:
            $user->permissions = null;
        endif;

        if ($user->save()):

            if($request->input('user_type') == "1"):
                return redirect('/admin/user/'.$user->id.'/permissions')->with('message', 'El rango del usuario se actualizo con éxito.')->with('typealert', 'success');
            else:
                return back()->with('message', 'El rango del usuario se actualizo con éxito.')->with('typealert', 'danger');
            endif;

        endif;

    }

    public function getUserBanned($id)
    {
        $user    = User::findOrFail($id);
        if($user->status == "100"):

            $user->status = "1";
            $msg = "Usuario activado con éxito.";

        else :

            $user->status = "100";
            $msg = "Usuario suspendido con éxito.";

        endif;

        if($user->save()):

            return back()->with('message', $msg)->with('typealert', 'success');

        endif;

        $data           = ['user' => $user];
        return view('admin.users.users_edit', $data);

    }

    public function getUserPermissions($id)
    {
        $user    = User::findOrFail($id);

        $data           = ['user' => $user];
        return view('admin.users.users_permissions', $data);

    }


    //validations
    public function postUserPermissions(Request $request, $id)
    {
        $user    = User::findOrFail($id);

        $permissions = [

                    'dashboard'                     => $request->input('dashboard'),
                    'dashboard_small_stats'         => $request->input('dashboard_small_stats'),

                    'user_list'                     => $request->input('user_list'),
                    'users_edit'                    => $request->input('users_edit'),
                    'users_banned'                  => $request->input('users_banned'),
                    'users_permissions'             => $request->input('users_permissions'),
                    
                    'classifications'            => $request->input('classifications'),
                    'classifications_add'        => $request->input('classifications_add'),
                    'classifications_edit'       => $request->input('classifications_edit'),
                    'classifications_delete'     => $request->input('classifications_delete'),

                    'subclassifications'            => $request->input('subclassifications'),
                    'subclassifications_add'        => $request->input('subclassifications_add'),
                    'subclassifications_edit'       => $request->input('subclassifications_edit'),
                    'subclassifications_delete'     => $request->input('subclassifications_delete'),

                    'beers'                      => $request->input('beers'),
                    'beers_add'                  => $request->input('beers_add'),
                    'beers_edit'                 => $request->input('beers_edit'),
                    'beers_delete'               => $request->input('beers_delete'),
                    'beers_search'               => $request->input('beers_search'),

                    'foods'                      => $request->input('foods'),
                    'foods_add'                  => $request->input('foods_add'),
                    'foods_edit'                 => $request->input('foods_edit'),
                    'foods_delete'               => $request->input('foods_delete'),
                    'foods_search'               => $request->input('foods_search'),

                    'drinks'                      => $request->input('drinks'),
                    'drinks_add'                  => $request->input('drinks_add'),
                    'drinks_edit'                 => $request->input('drinks_edit'),
                    'drinks_delete'               => $request->input('drinks_delete'),
                    'drinks_search'               => $request->input('drinks_search'),

                    'promotions'                      => $request->input('promotions'),
                    'promotions_add'                  => $request->input('promotions_add'),
                    'promotions_edit'                 => $request->input('promotions_edit'),
                    'promotions_delete'               => $request->input('promotions_delete'),
                    'promotions_search'               => $request->input('promotions_search'),

                    'multimedia'                      => $request->input('multimedia'),
                    'multimedia_add'                  => $request->input('multimedia_add'),
                    'multimedia_edit'                 => $request->input('multimedia_edit'),
                    'multimedia_delete'               => $request->input('multimedia_delete'),
                    'multimedia_search'               => $request->input('multimedia_search'),

                    'carousels'                     => $request->input('carousels'),
                    'carousels_add'                 => $request->input('carousels_add'),
                    'carousels_edit'                => $request->input('carousels_edit'),
                    'carousels_delete'              => $request->input('carousels_delete'),

                    ];
        $permissions = json_encode($permissions);
        $user->permissions = $permissions;

        if ($user->save()):
            return back()->with('message', 'Los permisos de ususario fueron actualizados con exito')->with('typealert', 'success');
        endif;

    }





}

