<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
    {
    		$this->request = $request;
				$uri = $this->request->route()->getUri();
				$current_user = Auth::user();
				$action = $this->request->route() !== null ? $this->request->route()->getAction()['as'] : null;
        view()->share(['action' => $action, 'current_uri' => $uri, 'current_user' => $current_user]);
    }
}
