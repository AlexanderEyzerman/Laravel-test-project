<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Service\Post\Service;

class BaseController extends Controller
{
//  service
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
