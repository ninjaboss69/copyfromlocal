<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;


class ItemsController extends Controller
{
    public static function isMobileDev(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
           $user_ag = $_SERVER['HTTP_USER_AGENT'];
           if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
              return true;
           };
        };
        return false;
    }

    public function store(Request $request){ 
        if($request->hasFile('file')){
            $tt = $request->file('file')->store('files','public');
            $name=$request->file('file')->getClientOriginalName();
            $extension=$request->file('file')->clientExtension();
            Items::create([
                'name'=>$name,
                'url'=>$tt,
                'type'=>$extension,
                'owner_name'=>'Device',
            ]);
            return back()->with('status','uploaded successfully');
        }else{
           
            return back()->with('status','please select file to upload');
        }
   }

   public function index(){

        $items=Items::latest()->get();
        return view('index',['items'=>$items]);

   }

   public function download($id){

        $item=Items::find($id);
       
        return Storage::download('public/'.$item->url,$item->name);

   }

   public function delete($id){
    if(Items::find($id)){
        $item=Items::find($id);
        Storage::delete('public/'.$item->url);
        $item->delete();
       // return back()->with(json_encode(['message'=>'ok']));
        //return back();
        // return [
        //     'message'=>'deleted successfully to '.$id,
        // ];
        //return redirect('/')->with('status','deleted successfully');
    }
    return [
        'message'=>'Unknown ID '.$id,
    ];
    }

    public function deleteAll(){
        $items=Items::latest()->get();
        foreach($items as $item){
          Storage::delete('public/'.$item->url);
          $item->delete();


        }
        return back()->with('status','deleted all successfully');
    }

  
}
