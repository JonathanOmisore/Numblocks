<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/mathjs/3.4.1/math.min.js"></script>
<title>4mul8</title>
<script>
	/**TODO: -Detect if cell is calculating self. 
	-Prevent calculations on cells that are equations.
    -Include JSON **/
function updateblock(blocknumber,value){
	
	$.post("process",
        {
          block: blocknumber,
          value: value,
            _token: "<?php echo csrf_token(); ?>"
        });
	
	
	
	
	
	
	
	
	
	
	
}
function sendequation(blocknumber, value){
	$.post("equation",
        {
          block: blocknumber,
          value: value,
            _token: "<?php echo csrf_token(); ?>"
        });
	
	
	
}



function findvar(eq){
var arr = [];
var replace = [];

		var ajax = function(){	var tmpdata;	$.ajax({
  mimeType: 'application/json',
  url:         "data",
  'async': false,
  type:        "GET",
  dataType:    "json",
  cache:       false,
  success:     function(data){
	 tmpdata = data;
	 
  }}
  );
   return tmpdata;
   }
  ();
   for(var x = 0; x < ajax["blocks"].length; x++){
	 
	  arr.push(ajax["blocks"][x]["block"]);
	
	  
	  
	  
  }
  for(var x = 0; x < arr.length; x++){
	  if(eq.indexOf(arr[x]) > -1){

	  replace.push(arr[x]);
	  
  }
	  
	  
  }

  if(replace.length > 0){
	  
	  
	  
  }
  if(replace.length > 0){
	
	   for(var x = 0; x<= replace.length; x++){
	 if(eq.indexOf(replace[x]) > -1){
		
	  var re = new RegExp(replace[x],"ig");
	  eq = eq.replace(re,$("#"+replace[x]).val());
	
	
  }
}

}
console.log(eq);
return eq;
  }




function createnewcell(){
     var number = 0;
     $(".form-control").each(function(){
		 var block = $(this).attr("id");
		
		 if(block.indexOf("block") > -1 ){
			 number+=1;
		 }
		 
	 });
	
	$('#new').on("focusout",function(){
			
		    number+=1;
		    
		   var newcellhtml = "<div class='form-group'><label for='usr'>Block "+String(number)+":</label><input type='text'class='form-control' id='block"+String(number)+"'></div>";
		   var newcell = newcellhtml.replace("toreplace",$("#new").val());
		   $(".container").append(newcell);
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			});
			
	
	
	
	
	
	
	
	
	
	
	
}


function calculate(equation){
	
	if(equation.charAt(0) == "="){
				
	            
				var thing = math.eval(findvar(equation.substring(1)));                 
	            return thing;
	
	
	
	
	
	
	
	
}}

function init(){
	function look(input){
	
		$(".form-control").each(function(){
			
			
			
			var thing = $(this).val();
			if (thing.indexOf(input) > -1){
				
				$("p").text((calculate($(this).val())));
				
				
				
				
				
				
				
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		});
		
		
		
		
		
		
		
		
		
	}
	function variable(){
	
	$(document).on("focusout","input.form-control", function(){
		var elem = $(this).attr("id");
		look(elem);
		
				

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	});
	
	
	
	
	
	
	
	
	
	
	
}
	$(document).on("focusout","input.form-control",function(){
			
		    
		    if($(this).val().indexOf("=") > -1){
		    $("p").text(calculate($(this).val()));
		}
		    updateblock($(this).attr("id"),$(this).val());
			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			});

			
			
			variable();
			
			createnewcell();
			
			
			
			
			
			
		
	}
$(document).ready(function(){

		
					
					
					
				init();	
					
					
					
					
				
		
		
		
	});
	
	
	

	






</script>
</head>
<body>
	<h1>Numblocks</h1>
	<div class="container">
	<div class="form-group">
  <label for="usr">Block 1:</label>
  <input type="text" class="form-control" id="block1">
</div>
<div class="form-group">
  <label for="usr">Block 2:</label>
  <input type="text" class="form-control" id="block2">
</div>
<div class="form-group">
  <label for="usr">Block 3:</label>
  <input type="text" class="form-control" id="block3">
  
</div>
<div class="form-group">
  <label for="usr">New block:</label>
  <input type="text" class="form" id="new">
  
</div>
	</div>
<p></p>
<h1></h1>
</body>
</html>
