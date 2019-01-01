<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsAPIController extends Controller
{
    public function update(Request $request) {
      $key = $request->input('key');
      $value = $request->input('value');

      setEnv($key, $value);

      return ['success' => true];
    }
}
