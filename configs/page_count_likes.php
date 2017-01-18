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

        $pagina_rp_like = $fb->get("333720355130/likes?since=2016-01-01&until=2017-01-10&limit=50");
        $pagina_link = $pagina_rp_like->getGraphEdge();

        $count2 += $pagina_link->count();

            if($count2 >= 49) {
                for ( $iii ; $ii < 150 ; $iii++){
                        $count2 += $fb->next($pagina_link)->count();

                        //pega a próxima e transforma em array
                        $prox_page = $fb->next($pagina_link)->asArray();



                    //verifica se terminou
                    if (isset($prox_page[0]['name'])) {
                        print_r($prox_page);

                        $fim = 1;
                        echo "terminou";
                        break;
                    }
                }
            }


        echo $count2;

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

