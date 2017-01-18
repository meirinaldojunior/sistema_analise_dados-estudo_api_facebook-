<?php
/**
 * Created by PhpStorm.
 * User: uneb-meirinaldojunior
 * Date: 16/01/17
 * Time: 11:52
 */

require_once 'login_facebook.php';

$anoo = date('date');
$count = 0;
$limite = 100;

//REFERENCIAS DA PESQUISA
$_cod_page = "camporiuneb";
$_data_inicio = "2016-10-28";
$_data_fim = "2017-01-10";

//MOSTRAR POSTS
if (isset($accessToken)) {
    try {

        $p[1] = $fb->get("$_cod_page/feed?until=$_data_fim&since=$_data_inicio&limit=100");
        $pag[1] = $p[1]->getGraphEdge();
        $count = $pag[1]->count();

                for ( $ii = 2 ; $ii < 1000 ; $ii++){
                    $pag[$ii] = $fb->next($pag[$ii-1]);
                    $count += $pag[$ii]->count();

                    if($pag[$ii]->count() < 100){
                        break;
                    }
                }


       echo $count;

    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}else{
    echo "<script> window.location='login_facebook.php'; </script>";
 }

