<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function edit(Request $request): View
    {
        return view('/admin', [
            'user' => $request->user(),
        ]);
    }
}
