<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;

class HomeController extends Controller
{
    public function index(HomeRequest $request)
    {
        $request = $request->validated();
        return $request;
    }
}
