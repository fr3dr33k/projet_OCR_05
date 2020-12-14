 Navbaruss = {

    init : function(param){

        switch(param){
            case "email":
                $(".close span").on("click", function(){
                    $(".bloc_send_mail").hide()
                })
                if($(".bloc_send_mail").is(":visible") || $(".bloc_phone").is(":visible")){          
                    $(".bloc_phone").hide()
                    $(".bloc_send_mail").toggle()
                    $(".bloc_button").focus({preventScroll:true})
                }else{
                    $(".bloc_send_mail").toggle()
                    $(".bloc_button").focus({preventScroll:true})
                }
            break;
            case "téléphone":
                $(".close span").on("click", function(){
                    $(".bloc_phone").hide()
                })
                if($(".bloc_send_mail").is(":visible") || $(".bloc_phone").is(":visible")){
                    $(".bloc_send_mail").hide() 
                    $(".bloc_phone").toggle()  
                    $(".bloc_button").focus({preventScroll:true})
                }else{
                    $(".bloc_phone").toggle()
                    $(".bloc_button").focus({preventScroll:true})
                }
            break;
        }

    }

}

Navbaruss.init()