<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RouterosAPI;
use Illuminate\Support\Facades\Config;
use StdClass;

class SystemDataRoute extends Controller
{
    private $API;
    private $upNet;
    

  
    function __construct(){
        $this->API=new RouterosAPI();
        $this->upNet= $this->API->connect(Config::get("constantes.IP_MIKROTIK"),Config::get("constantes.USER_MIKROTIK"),Config::get('constantes.PASSWORD_MIKROTIK'));
        
  
    }
    public function getInfo(){
        
       // $data=new StdClass();
      
        if(($this->upNet)==true){
        $this->API->write('/system/resource/print');  
        $READ= $this->API->read(false);
        $ARRAY= $this->API->parseResponse($READ); 
        $this->API->disconnect();
        $datos=[
        'time' => $ARRAY[0]['uptime'],
        'version' => $ARRAY[0]['version'],
        'cpu' => $ARRAY[0]['cpu'],
        'boar' => $ARRAY[0]['board-name']
         ];
 
         return response()->json($datos);
        }
       
       return response()->json("No se pudo hacer la solicitud");
    }

    public function getSimpleQueue (){
        function chageCharsetUtf8($string){
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã",
            "Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã",
            "ÃŠ","ÃŽ","Ã","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã","Ã‹","Ñ","*","%","@\x{FFFD}@u","�");		
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O",
            "U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O",
            "i","a","e","U","I","A","E","N",".",".",".","ñ");		
            
            
            $string=str_replace($no_permitidas,$permitidas,$string);			
            return strtoupper(utf8_encode($string));
        }
        if($this->upNet==true){
            $this->API->write('/queue/simple/print');
            $READ= $this->API->read(false);
            $ARRAY= $this->API->parseResponse($READ); 
            $this->API->disconnect();

            $count=0;
            $count = count($ARRAY);
            
            
        
            $i=0;
            $da=[];
            if($count>0){
                foreach ($ARRAY as $key) {
                   
                  /*  $ip = explode('/', $key['target']);
                    $speed = explode('/', $key['max-limit']);
                    $data->id[] = $key['.id'];
                    $data->ip[] = $ip[0];
                    $data->name[] = chageCharsetUtf8($key['name']);
                    $data->up[] = $speed[0]/1000000 .'MG';
                    $data->down[] = $speed[1]/1000000 .'MG';  */
                    
                    
                    $ARRAY[$i]['name'] = chageCharsetUtf8($key['name']);     
                    $i++;   
              }

            }
          //  $data=array_merge($data);
         	
          
            return response()->json($ARRAY);
        }
    }

    public function getDataRoute(){
     $this->API->write('/ip/route/print');
     $READ = $this->API->read(false);
     $ARRAY= $this->API->parseResponse($READ);
     $this->API->disconnect();

     return response()->json($ARRAY);


    }
}
