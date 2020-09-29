<?php

namespace app\commands;

use app\models\Product;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use GuzzleHttp\Client;
use yii\helpers\Url;

class ProductController extends Controller
{
    public function actionAdd()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://alfa.kz/');
        $body = $res->getBody();
        $document = \phpQuery::newDocumentHTML($body);
        $news = $document->find(".product-item-holder");

        foreach ($news as $elem) {
            $product = new Product();
            $pq = pq($elem);
            $product->name = $pq->find('.product-item .body .header a')->text();
            $product->price = $pq->find('.product-item .prices .price-current')->text();
            $product->created_at = date('Y-m-d H:i:s');
            if ($product->save()) {
                Console::output('saved');
            } else {
                var_dump($product->errors);
                Console::output("not saved");
            }
        }
    }
}
