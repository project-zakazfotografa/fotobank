<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    //

    /**
     * @return
     * auth admin user
     */
    public function enter(){
       return view('cms.login');
    }

    public function cmsMain(){
       return view('cms.cms');
    }
}
