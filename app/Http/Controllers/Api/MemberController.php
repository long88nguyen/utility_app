<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends ApiController
{
    //
    public function index(){
        return $this->sendSuccess(1233);
    }
}
