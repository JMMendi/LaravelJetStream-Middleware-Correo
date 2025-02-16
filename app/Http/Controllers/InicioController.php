<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index() {
        $articulos = Article::with('user', 'tag')->orderBy('id', 'desc')->paginate(5);
        return view('welcome', compact('articulos'));
    }
}
