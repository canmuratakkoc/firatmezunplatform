<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  function kontrol() {
    if(session() -> has('basarili')) {
      return view('feed.akis');
    } else {
      return view('welcome');
    }
  }
}
