


var email,emailvalidERROR,TEL,TelvalidERROR,BTN,BTN2,BTN3,BTN4,reg1,reg2,name,msg,nameError,msgError;
function validation(){
  email = document.getElementById("email");
  emailvalidERROR=document.getElementById("emailvalidERROR");
  TEL=document.getElementById("TEL");
  TelvalidERROR=document.getElementById("TelvalidERROR");
  msg=document.getElementById("name");
  nameError=document.getElementById("nameError");
  msg=document.getElementById("words");
  msgError=document.getElementById("MSGERROR");
 reg1=/^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/; 
 reg2=/^(?:(\+))?(?:[0-9]{0,3}[\s.\/-]?)?(?:(?:\((?=\d{3}\)))?(\d{3})(?:(?!\(\d{3})\))?[\s.\/-]?)?(?:(?:\((?=\d{3}\)))?(\d{3})(?:(?!\(\d{3})\))?[\s.\/-]?)?(?:(?:\((?=\d{4}\)))?(\d{4})(?:(?!\(\d{4})\))?[\s.\/-]?)?$/;


 if(reg1.test(email.value)) {
            emailvalidERROR.innerHTML = " "; 
           document.getElementById("email").style.border = "2px solid lightgreen";
           BTN=false;
           }
        else{
          document.getElementById("email").style.border = "2px solid red";
          emailvalidERROR.innerHTML = "הכנס כתובת אימייל תקינה"; 
          BTN=true;
   }
         if(email.value===""){
          emailvalidERROR.innerHTML = " ";
          document.getElementById("email").style.border = "2px solid lightgray";
            BTN=true;
    }

        if(reg2.test(TEL.value)) {
          TelvalidERROR.innerHTML = " "; 
          document.getElementById("TEL").style.border = "2px solid lightgreen";
          BTN2=false;}
           else{
           document.getElementById("TEL").style.border = "2px solid red";
           TelvalidERROR.innerHTML = "מספר טלפון לא תקין"; 
           BTN2=true;;
          }
          if(TEL.value===""){
            TelvalidERROR.innerHTML = " "; 
            document.getElementById("TEL").style.border = "2px solid lightgray";
            BTN2=true;}



            if(msg.value!==""){
                msgError.innerHTML=" ";
            
                BTN3=false;
            }
            else{
                msgError.innerHTML="";
                document.getElementById("words").style.border="2px solid lightgray";
                BTN3=true;}
        

                if(name.value===""){
                    nameError.innerHTML="";
                    document.getElementById("name").style.border="2px solid red";
                    BTN4=true;}
            if(name.value!==""){
            nameError.innerHTML="";
            BTN4=false;
            }
           
            

                if(BTN===true||BTN2===true||BTN3===true||BTN4===true){
                    document.getElementById("send").disabled = true;
                }
                else
                document.getElementById("send").disabled = false;
}


function openModel(){
    var modal = document.getElementById("myModal");

span.onclick = function() {
  modal.style.display = "none";
 

}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}
function reset(){
    document.getElementById("email").value= "";
    document.getElementById("words").value="";
    document.getElementById("TEL").value="";
    document.getElementById("name").value="";

    document.getElementById("email").style.border = "2px solid lightgray";
    document.getElementById("words").style.border="2px solid lightgray";
    document.getElementById("TEL").style.border="2px solid lightgray";
    document.getElementById("name").style.border="2px solid lightgray";
}






var BTN  = true;
var BTN5  = true;
var BTN2= true;
var BTN3=true;
var BTN4=true;
function checkEmail(email) {
  if (email == "") {
      document.getElementById("emailvalidERROR").innerHTML = "";
      return;
  } else { 
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
              document.getElementById("emailvalidERROR").innerHTML = this.responseText;
              if(document.getElementById("emailvalidERROR").innerText!==""){
                document.getElementById("pwd").style.border = "2px solid default";
                BTN5 = true;
              }
             
              else if(document.getElementById("emailvalidERROR").innerText===""){
                    BTN5 = false;
            
              }
                  
                  
                  
              if(BTN||BTN2||BTN3||BTN4||BTN5){
                document.getElementById("send").disabled = true;
            }
            else
            document.getElementById("send").disabled = false;
          }
          if(document.getElementById("email").innerText===""||document.getElementById("emailvalidERROR").innerText!=="")
          document.getElementById("send").disabled = true;
      };
      xmlhttp.open("GET","Validation/validEmail.php?email="+email,true);
      xmlhttp.send();
  }
}
function checkUser(user) {
  if (user == "") {
      document.getElementById("USERERROR").innerHTML = "";
      return;
  } else { 
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

            document.getElementById("USERERROR").innerHTML = this.responseText;
            if(document.getElementById("USERERROR").innerText!==""){
              document.getElementById("user").style.border = "2px solid default";
                BTN= true;
              }
                  
                  else {
                    BTN = false;
                  }
            
          
                  if(BTN||BTN2||BTN3||BTN4||BTN5){
                    document.getElementById("send").disabled = true;
                    
                }
                else{
                  
                  document.getElementById("send").disabled = false;
                }
                
                if(document.getElementById("user").innerText===""||document.getElementById("USERERROR").innerText!=="")
                document.getElementById("send").disabled = true;
                else
                document.getElementById("send").disabled = false;
          }
      };
      xmlhttp.open("GET","Validation/validUser.php?user="+user,true);
      xmlhttp.send();
  }
}

function checkTEL(TEL) {
  if (TEL == "") {
      document.getElementById("TelvalidERROR").innerHTML = "";
      return;
  } else { 
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
              document.getElementById("TelvalidERROR").innerHTML = this.responseText;
              
               if(document.getElementById("TelvalidERROR").innerText!==""){
                document.getElementById("pwd").style.border = "2px solid default";
                BTN2 = true;
            
              }
                  
                  else{
                    BTN2 = false;
                  }
                  
                  if(BTN||BTN2||BTN3||BTN4||BTN5){
                    document.getElementById("send").disabled = true;
                }
                else
                document.getElementById("send").disabled = false;
          }
          if(document.getElementById("TEL").innerText===""||document.getElementById("TelvalidERROR").innerText!=="")
          document.getElementById("send").disabled = true;
          else
          document.getElementById("send").disabled = false;
      };
      xmlhttp.open("GET","Validation/validTEL.php?TEL="+TEL,true);
      xmlhttp.send();
  }
  
}
function Checkpass(pass) {
  if (pass == "") {
      document.getElementById("PASSERROR").innerHTML = "";
  ;
      return;
  } else { 
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
              document.getElementById("PASSERROR").innerHTML = this.responseText;
   
               if(document.getElementById("PASSERROR").innerText!==""){
                document.getElementById("pwd").style.border = "2px solid default";
                BTN3 = true;
            
              }
              
                  
                  else{
                    
                    BTN3 = false;
                  }
                  
                  
          }
          if(BTN||BTN2||BTN3||BTN4||BTN5){
            document.getElementById("send").disabled = true;
        }
        else
        document.getElementById("send").disabled = false;
        }
        if(document.getElementById("pwd").innerText===""||document.getElementById("PASSERROR").innerText!=="")
        document.getElementById("send").disabled = true;
        
      };
      xmlhttp.open("GET","Validation/validPass.php?pass="+pass,true);
      xmlhttp.send();
  }
  
  function CheckFN_LN_BOD(value) {
    if (value == "") {
        document.getElementById("LNERROR").innerHTML = "";
        document.getElementById("FNERROR").innerHTML = "";
        document.getElementById("BODERROR").innerHTML = "";
    ;
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              
                document.getElementById("LNERROR").innerHTML = this.responseText;
                document.getElementById("FNERROR").innerHTML = this.responseText;
                document.getElementById("BODERROR").innerHTML = this.responseText;

                 if(document.getElementById("LNERROR").innerText!=="")
                 {
                  document.getElementById("LN").style.border = "2px solid default";      
                   BTN4 = true;
              

                }
                else{
                  BTN4 = false;
                }
                if(document.getElementById("FNERROR").innerText!=="")
                {
                  document.getElementById("FN").style.border = "2px solid default";
                      BTN4 = true;
              
                }
                else{
                  
                  BTN4 = false;
                }
                if(document.getElementById("BODERROR").innerText!=="")
                {
                  document.getElementById("BOD").style.border = "2px solid default";
                  BTN4 = true;
              
                }
                else{
                  BTN4 = false;
                }
                    
                    
                    
            }
           
            if(BTN||BTN2||BTN3||BTN4||BTN5){
              document.getElementById("send").disabled = true;
          }
          else
          document.getElementById("send").disabled = false;
          }
          if(document.getElementById("LN").innerText===""|| document.getElementById("FN").innerText===""||
              document.getElementById("BOD").innerText==="")
              document.getElementById("send").disabled = true;
          
        };
        xmlhttp.open("GET","Validation/validOthers.php?value="+value,true);
        xmlhttp.send();
    }


 


