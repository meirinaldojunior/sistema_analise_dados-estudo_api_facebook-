<?php
/**
 * Created by PhpStorm.
 * User: uneb-meirinaldojunior
 * Date: 16/01/17
 * Time: 11:52
 */

require_once 'login_facebook.php';

$anoo = date('date');
$count2 = 0;
$fim = 0;

//REFERENCIAS DA PESQUISA
$_cod_page = "333720355130";
$_data_inicio = "2016-05-10";
$_data_fim = "2017-01-10";

//MOSTRAR POSTS
if (isset($accessToken)) {
    try {


        $p[1] = $fb->get("546166512248915/likes?fields=name,id");
        $pag[1] = $p[1]->getGraphEdge()->ge;
        $count += $pag[1]->count()->;

        print_r($pag[1]);

        if($pag[1]->count() >= 100){
            for ( $ii = 2 ; $ii < 1000 ; $ii++){
                $pag[$ii] = $fb->next($pag[$ii-1]);
                $count += $pag[$ii]->count();

                if($pag[$ii]->count() < 100){
                    break;
                }
            }
        }



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

