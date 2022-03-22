<?php

namespace App\Http\ViewComposer;

use App\Classification;
use App\Subclassification;
use Illuminate\Contracts\View\View;


class BlogComposer
{
    public function compose(View $view)
    {
       $areas = Classification::where('status', 1)->get();
       $subareas = Subclassification::where('status', 1)->get();
       $cartcoun = count($areas);
        $view->with([   'areas' => $areas,
                        'subareas' => $subareas,
                        'cartcoun' => $cartcoun
                    ]);
    }
}
