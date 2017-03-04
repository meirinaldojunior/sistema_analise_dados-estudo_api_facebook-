<?php
/**
 * Created by PhpStorm.
 * User: uneb-meirinaldojunior
 * Date: 16/01/17
 * Time: 11:52
 */

session_start();

require_once 'login_facebook.php';
require_once 'lista_busca.php';

$anoo = date('date');
$count = 0;
$limite = 100;


//REFERENCIAS DA PESQUISA
$_data_inicio = "2010-01-01";
$_data_fim = "207-12-30";

echo "data_inicio = $_data_inicio - data_fim = $_data_fim<br>";

//MOSTRAR POSTS
    if (isset($accessToken)) {
        try {
        for($ee; $ee < 200; $ee++) {

            $count = 0;
            $count2++;

            $dados_page = $fb->get("" . $lista[$count2] . "?fields=name");
            $dados_convert = $dados_page->getGraphUser();
            echo $dados_convert->getField('name') . ": ";

            $p[1] = $fb->get("" . $lista[$count2] . "/posts?fields=name&until=$_data_fim&since=$_data_inicio&limit=$limite");
            $pag[1] = $p[1]->getGraphEdge();
            $count += $pag[1]->count();


            echo $count."<br>";
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
    } else {
        echo "<script> window.location='login_facebook.php'; </script>";
    }

