<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function identifier(Request $request) {
        $request->validate([
            'identifiant' => 'string|required',
        ]);

        if ($request->all()['identifiant'] == 'admin') {
            return redirect()->route('admin.connection');
        }
    }

    public function connection() {
        return view('testsIns/adminconnection');
    }
}  