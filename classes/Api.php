<?php
class Api
{
    public $id;
    public $endpoint;
    public $details_endpoint;
    public $curl;
    public function __construct()
    {
        $this->endpoint = "https://the-birthday-cake-db.p.rapidapi.com/";

        $this->curl = curl_init();

        curl_setopt_array($this->curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: the-birthday-cake-db.p.rapidapi.com",
                "X-RapidAPI-Key: 8ae6f1eabbmshf011e0743a53b74p163922jsn805e0f89742e"
            ],
        ]);

    }

    public function all()
    {

        curl_setopt_array($this->curl, [
            CURLOPT_URL => $this->endpoint,
        ]);

        $response = curl_exec($this->curl);
        $response = (object) json_decode($response, 1);

        $err = curl_error($this->curl);
        curl_close($this->curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function details()
    {

        curl_setopt_array($this->curl, [
            CURLOPT_URL => $this->endpoint . $this->id,
        ]);

        $response = curl_exec($this->curl);
        $response = (object) json_decode($response, 1);

        $err = curl_error($this->curl);
        curl_close($this->curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function apiStoreRecipes()
    {
        $prod = new Product;
        //  ["0"] => array(4) {
        //     ["id"] => string(1) "1"
        //     ["title"] => string(29) "Raspberry and custard muffins"
        //     ["difficulty"] => string(4) "Easy"
        //     ["image"] => string(48) "https://apipics.s3.amazonaws.com/cakes_api/1.jpg"
        // }

        foreach ($this->all() as  $product) {

            $product = (object) $product;
            // var_dump($product);die;
            if($prod->create([
                "id"=> $product->id,
                'name'=> $product->title,
                'price'=> rand(100000,5000000),
                'image'=> $product->image,
                'quantity'=>rand(1,10),
            ])){
                echo '+'. $product->id .''. $product->title ;
            }else{
                echo '<span style="color:red">'. $product->id .''. $product->title . '</span>';
            };
           
        }
    }
}