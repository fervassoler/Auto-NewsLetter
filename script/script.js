/**
 * Created by Fernanda on 10/01/2015.
 */
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function selectAll(){
   if(document.getElementById("todosChk").checked == true){
	   document.getElementById("todasOfertas").checked = true;
	   document.getElementById("todosEstudos").checked = true;
	   selectOfertas();
	   selectEstudos();
	   showhidefield();
   }else{
       document.getElementById("todosChk").checked = false;
	   document.getElementById("todasOfertas").checked = false;
	   document.getElementById("todosEstudos").checked = false;
	   selectOfertas();
	   selectEstudos();
	   showhidefield();
   }
}


function selectOfertas(){
   if (document.getElementById("todasOfertas").checked == true ||
       document.getElementById("todosChk").checked == true  ){
		document.getElementById("grupon").checked = true;
		document.getElementById("ciplak").checked = true;
		document.getElementById("lwart").checked = true;
	} else{
		document.getElementById("grupon").checked = false;
		document.getElementById("ciplak").checked = false;
		document.getElementById("lwart").checked = false;
	}
}

function selectEstudos(){
   if (document.getElementById("todosEstudos").checked == true ||
	   document.getElementById("todosChk").checked == true){
		document.getElementById("oficinadanet").checked = true;
		document.getElementById("omd").checked = true;

	} else{
		document.getElementById("grupon").checked = false;
		document.getElementById("oficinadanet").checked = false;
		document.getElementById("omd").checked = false;
	}
}


function showhidefield(){  		
       fileldName(); 
	   fileldConstrucao();
	   fileldDDD();
	   fileldTelefone();
  }

function fileldName(){
 if (document.getElementById("omd").checked == true || 
     document.getElementById("lwart").checked == true || 
	 document.getElementById("ciplak").checked == true){
	 
            document.getElementById("labelNome").className="";
			document.getElementById("campoNome").className="form-control";
        }  else{
            document.getElementById("labelNome").className="sr-only";
			document.getElementById("campoNome").className="sr-only";
        }
}

function fileldConstrucao(){
 if (document.getElementById("lwart").checked == true || document.getElementById("ciplak").checked == true){		
            document.getElementById("labelConstrucao").className="";
			document.getElementById("selectConstrucao").className="form-control";
        }  else{
            document.getElementById("labelConstrucao").className="sr-only";
			document.getElementById("selectConstrucao").className="sr-only";
        }
}

function fileldDDD(){
 if (document.getElementById("omd").checked == true ){		
            document.getElementById("labelDDD").className="";
			document.getElementById("campoDDD").className="form-control";
        }  else{
            document.getElementById("labelDDD").className="sr-only";
			document.getElementById("campoDDD").className="sr-only";
        }
}

function fileldTelefone(){
 if (document.getElementById("omd").checked == true ){		
            document.getElementById("labelTelefone").className="";
			document.getElementById("campoTelefone").className="form-control";
        }  else{
            document.getElementById("labelTelefone").className="sr-only";
			document.getElementById("campoTelefone").className="sr-only";
        }
}

















