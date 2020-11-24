 Navbaruss =  {

   init : function(param){
       switch(param){
            case "email":
                if($("#form").is(":visible")){
                    $("#form").hide()
                }else{
                    $("#form").toggle()
                }
                break;
            case "téléphone":
                
            break;

       }
   }

}

$('.carousel').carousel()