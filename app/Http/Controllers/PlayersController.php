<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayersController extends Controller
{

    public function index(){
    //   $params = [
    //     'test' => 'これはテストです。',
    //     'sample' => 'これはサンプルです。'
    //   ];
    //   // echo "test";
    //
    //   return view('players.index',compact('params'));
      // dd($players);
      $players = Player::all();
      return view('players.index',compact('players'));
    }
}
