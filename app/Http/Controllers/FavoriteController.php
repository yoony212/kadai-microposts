<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store($favoriteId) {
        \Auth::user()->register_favorite($favoriteId);
        return back();
    }
    public function destroy($favoriteId) {
        \Auth::user()->delete_favorite($favoriteId);
        return back();
    }
}
