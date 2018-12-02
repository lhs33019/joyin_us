<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    const VALIDATION_FAILED = 412;
    const AUTHENTICATE_FAILED = 401;
    const PERMISSION_DENIED = 403;
    const RESOURCE_NOT_FOUND = 404;
    const RESOURCE_ALREADY_EXIST = 409;
    const SERVER_ERROR = 500;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
