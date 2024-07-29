<?php
declare(strict_types=1);
# if vendor file is not present, notify developer to run composer install.
require __DIR__.'/vendor/autoload.php';

use Flutterwave\Controller\PaymentController;
use Flutterwave\EventHandlers\ModalEventHandler as PaymentHandler;
use Flutterwave\Flutterwave;
use Flutterwave\Library\Modal;

# start a session.
session_start();
error_reporting(0);
try {
    Flutterwave::bootstrap();
    $customHandler = new PaymentHandler();
    $client = new Flutterwave();
    $modalType = Modal::POPUP; // Modal::POPUP or Modal::STANDARD
    $controller = new PaymentController( $client, $customHandler, $modalType );
} catch(\Exception $e ) {
    echo $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $request = $_REQUEST;
    $request['redirect_url'] = $_SERVER['HTTP_ORIGIN'] . $_SERVER['REQUEST_URI'];
    try {
        $controller->process( $request );
    } catch(\Exception $e) {
        echo $e->getMessage();
    }
}

$request = $_GET;
# Confirming Payment.
if(isset($request['tx_ref'])) {
    $controller->callback( $request );
} else {
    
}

if($_GET['status'] == "cancelled"){
    session_destroy();
    ?><script>
    var allowed=function(){window.location='../../login';}
    setTimeout(allowed,1);
    </script><?php
}
exit();
