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

        $file = fopen("code/$id/code.c", "w") or die("Unable to open file!");
        fwrite($file, $request->input);
        fclose($file);

        exec("sudo ./script.sh -a 10.42.0.3 -i $id");

        if(filesize("code/$id/output.txt")) {
            $file = fopen("code/$id/output.txt", "r");
            $result = fread($file,filesize("code/$id/output.txt"));
            fclose($file);
        } else {
            $result = "";
        }
        

        exec("rm -rf code/$id");

        // $result = $request->input;
        return response()->json($result);
    }
}
