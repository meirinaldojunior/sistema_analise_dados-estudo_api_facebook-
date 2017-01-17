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
$fim = 0;

//REFERENCIAS DA PESQUISA
$_cod_page = "333720355130";
$_data_inicio = "2016-01-10";
$_data_fim = "2017-01-10";

//MOSTRAR POSTS
if (isset($accessToken)) {
    try {

        $pagina_rp = $fb->get("".$_cod_page."/likes?until=".$_data_fim."&since=".$_data_inicio."&limit=100");
        $pagina = $pagina_rp->getGraphEdge();

        $count += $pagina->count();

            if($count >= 100) {
                for ( $ii ; $ii < 1000 ; $ii++){
                        $count += $fb->next($pagina)->count();

                        //pega a próxima e transforma em array
                        $prox_page = $fb->next($pagina)->asArray();

                    //verifica se terminou
                    if (isset($prox_page[0]['id'])) {
                        $fim = 1;
                        echo "terminou";
                        break;
                    }
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

