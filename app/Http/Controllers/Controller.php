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

    public $request;

    public $current_uri;

    public $current_user;

    public $action;

    public function __construct(Request $request)
    {
				$this->request      = $request;
				$this->uri          = $this->request->route()->getUri();
				$this->current_user = Auth::user();
				$this->action       = null;

				if ($this->request->route()  && array_key_exists('as', $this->request->route()->getAction())) {
					$this->action = $this->request->route()->getAction()['as'];
				}

        view()->share(['action' => $this->action, 'current_uri' => $this->uri, 'current_user' => $this->current_user]);
    }
}
