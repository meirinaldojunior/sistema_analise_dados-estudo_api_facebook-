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
$offset = 0;

//REFERENCIAS DA PESQUISA
$_cod_page = "bradesco";
$_data_inicio = "2006-01-28";
$_data_fim = "2017-01-28";

//MOSTRAR POSTS
if (isset($accessToken)) {
    try {



                for ( $ii ; $ii < 10000 ; $ii++){

                    $pagina_rp = $fb->get("".$_cod_page."/feed?until=".$_data_fim."&since=".$_data_inicio."&limit=".$limite."&offset=".$offset."");
                    $pagina = $pagina_rp->getGraphEdge();
                    $count += $pagina->count();

                    $offset += $limite;

                    //verifica se terminou
                    if ($pagina->count() < $limite) {

                        echo "terminou";
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

