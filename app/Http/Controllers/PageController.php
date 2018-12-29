<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
      return view("home");
    }

    public function portfolio() {
      return view("portfolio");
    }

    public function faq() {
      return view("faq");
    }

    public function tos() {
      return view("tos");
    }

    public function pricing() {
      return view("pricing");
    }
}
