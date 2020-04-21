<?php

namespace hotelya\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Login Instructions - Step 4
     * 1. This is the last step (IMPORTANT!), check login and routhe
     * 2. Any route called by user or app is going to be checked for user authentication, that's what me want here.
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
}

