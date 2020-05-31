
    const inputs = document.getElementsByTagName('input');
    for(input of inputs){
      input.addEventListener('keyup', function(e){
        if(e.target.hasAttribute('error')){
          var idSpanError = e.target.getAttribute('error');
          document.getElementById(idSpanError).innerText = "";
        }
      })
    }
    
document.getElementById("control-form").addEventListener('submit',function(e){
    const inputs = document.getElementsByTagName('input');
    var error=false;
          for(input of inputs){
              if(input.hasAttribute("error")){
                 var idSpanError = input.getAttribute("error");
                 if(!input.value){
                   document.getElementById(idSpanError).innerText = "Ce champ est obligatoire";
                   error = true;
                 }
            }
          }
          if(error){
            e.preventDefault();
            return 0;
          }
 })