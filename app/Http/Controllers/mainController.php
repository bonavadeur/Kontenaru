<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function home() {
        return view("home");
    }

    public function exec(Request $request) {
        $input = $request->input;
        $id = $request->id;
        exec("mkdir code/$id");
        exec("touch code/$id/code.c");
        exec("chmod -R 777 code/*");
        exec("echo '$request->input' > code/$id/code.c");

        // $file = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        // $result = fread($file,filesize("webdictionary.txt"));
        // fclose($file);

        $result = $request->input;
        return response()->json($result);
    }
}
