<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Core\Traits\ResponseMessage;

class BaseController extends Controller
{
    use ResponseMessage;
}
