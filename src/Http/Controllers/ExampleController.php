<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'textarea' => 'required',
            'select' => 'required',
            'select' => 'required',
            'password' => 'required',
            'number' => 'required',
            'file' => 'required',
            'email' => 'required',
            'date' => 'required',
            'checkbox' => 'required',
        ]);
    }

}
