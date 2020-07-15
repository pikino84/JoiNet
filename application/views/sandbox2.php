<!doctype html>
<html>
    <head>
    	<meta charset="utf-8">
        <title>MercadoPago SDK</title>
        <link href="https://www.massivepc.com/mayoreo/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
        <script src="/mayoreo/assets/js/jquery-1.11.3.min.js"></script>
        <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>

        <script type="text/javascript">

    (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
    s.src = document.location.protocol+"//resources.mlstatic.com/mptools/render.js";
    var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}
    window.$MPC_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();


    function execute_my_onreturn (json) {
	    if (json.collection_status=='approved'){
	        alert ('Pago acreditado');
	    } else if(json.collection_status=='pending'){
	        alert ('El usuario no completó el pago');
	    } else if(json.collection_status=='in_process'){    
	        alert ('El pago está siendo revisado');    
	    } else if(json.collection_status=='rejected'){
	        alert ('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
	    } else if(json.collection_status==null){
	        alert ('El usuario no completó el proceso de pago, no se ha generado ningún pago');
	    }
	}



</script>
    </head>
    <body>
        
        <a href="<?=$button?>" name="MP-Checkout" class="btn btn-primary" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a>


    </body>
</html>