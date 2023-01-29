<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\customer_scores;

use DB;

class scoresForOrdersController extends Controller
{
    function orderProcessing(Request $request) {
        $order = $request->json()->all();
        $scores = 0;
        for ($i = 0; $i < count($order['items']); $i++) {
            if ($order['items'][$i]['article'] == "3005-13") {
                $scores = 3 * $order['items'][$i]['quantity'];
            }
            $this::writeOrder($order['id'],
                              $order['client_id'],
                              $order['items'][$i]['article'],
                              $order['items'][$i]['name'],
                              $order['items'][$i]['price'],
                              $order['items'][$i]['quantity'],
                              $order['status']);
        }
        $response = response()->json(['client_id' => $order['client_id'],
                                      'scores' => $scores,
                                      'order_id' => $order['id']
                                     ])->content();
        
        $this::writeScores($order['id'], $scores, $order['client_id']);
        var_dump($response);
    }
    
    protected static function writeOrder($id, $client_id, $article, $name, $price, $quantity, $status) {
        $art = DB::table('orders')->where([['article', $article], ['order_id', $id]])->value('article');
        if (!is_null($art)) {
            DB::table('orders')->where([['article', $article], ['order_id', $id]])->update(['client_id' => $client_id,
                                                                                            'article' => $article,
                                                                                            'name' => $name,
                                                                                            'price' => $price,
                                                                                            'quantity' => $quantity,
                                                                                            'status' => $status]);
        }
        else {
            $order_ = new orders();
            $order_->order_id = $id;
            $order_->client_id = $client_id;
            $order_->article = $article;
            $order_->name = $name;
            $order_->price = $price;
            $order_->quantity = $quantity;
            $order_->status = $status;
            $order_->save();
        }
    }
    
    protected static function writeScores($id, $scores, $client_id) {
        $ord = DB::table('customer_scores')->where('order_id', $id)->value('order_id');
        if (!is_null($ord)) {
            DB::table('customer_scores')->where('order_id', $id)->update(['order_id' => $id,
                                                                           'scores' => $scores,
                                                                           'client_id' => $client_id]);
        }
        else {
            $scores_ = new customer_scores();
            $scores_->client_id = $client_id;
            $scores_->scores = $scores;
            $scores_->order_id = $id;
            $scores_->save();
        }
    }
}