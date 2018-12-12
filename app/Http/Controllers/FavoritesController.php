<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function store(Reply $reply)
    {
       $reply->favorite(auth()->id());

       return back();
        
    }

    public function destroy(Favorite $favorite)
    {
       
       $favorite->where('user_id', auth()->id())->delete();

       return back();
        
    }
}
