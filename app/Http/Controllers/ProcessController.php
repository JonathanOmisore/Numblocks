<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProcessController extends Controller
{
	public function isvalid($postblock, $postvalue){
	if(is_numeric($postvalue) && is_numeric(str_replace("block","",$postblock)) && strpos($postblock,"block") === 0){
		
		
		return true;
		
		
		
		
		
		
	}
	
	
	else if(strpos($postvalue,"=") === 0){
		if(strpos($postvalue,"<") <= -1 && is_numeric(str_replace("block","",$postblock)) && strpos($postblock,"block") === 0){
		return true;
	}
		
		
		
	}
	
	
	else{
	return false;
	
	
}

}

    public function process(Request $request){
		$block = $request->input('block');
$value = $request->input('value');

if($this->isvalid($block,$value)){
$blocklist= array();
$valuelist = array();
$dataread = file_get_contents("/opt/lampp/htdocs/2numblocks/resources/views/data");
$handle = fopen("/opt/lampp/htdocs/2numblocks/resources/views/data","w");
$json = json_decode($dataread, true);

if(empty($json["blocks"])){
echo "hi";
	$arr = array_push($json["blocks"], array('block' => $block,'value' => $value));
	fwrite($handle, json_encode($json));

	
	
	
}
else{

for($x = 0; $x < count($json["blocks"]); $x++){
	array_push($blocklist,$json["blocks"][$x]["block"]);
	array_push($blocklist,$json["blocks"][$x]["value"]);
	
	
	
}
if(!in_array($block,$blocklist)){
	$arr = array_push($json['blocks'], array('block' => $block,'value' => $value));
	fwrite($handle, json_encode($json));
	
}
else if(in_array($block,$blocklist) && !in_array($value,$valuelist)){
	for($x = 0; $x < count($json["blocks"]); $x++){
		if($block == $json["blocks"][$x]["block"]){
			
			$json["blocks"][$x]["value"] = $value;
			fwrite($handle, json_encode($json));
			
			break;
			
			
			
			
			
		}
		
		
		
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
}


	

	fclose($handle);
}

}
		
		
	}
}
