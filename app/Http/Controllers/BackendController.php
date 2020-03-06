<?php

namespace App\Http\Controllers;

use App\Entities\Config;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function managerFile(){
    	return view('backend.manager-file');
    }
    public function runCommand(){
        return view('backend.command');
    }
    public function postCommand(Request $request){
        $command = $request->command;

        echo shell_exec('touch abcádassad');
        $abc = shell_exec('touch abcádasd');
        printf($abc);
        dd($command);
        return redirect()->back();
    }
    public function deleteMenuItem($id){
        dd($id);
        return view('menus.index');
    }
    public function google(){
        $data['google'] = Config::where('key','google')->first();
        return view('backend.analytic',$data);
    }
    public function facebook(){
        $data['facebook'] = Config::where('key','facebook')->first();
        return view('backend.facebookPixel',$data);
    }
    public function javascript(){
        $data['javascript'] = Config::where('key','javascript')->first();
        return view('backend.javascript',$data);
    }
}
