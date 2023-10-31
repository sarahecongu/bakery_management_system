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
                "X-RapidAPI-Key: 0372cd7cbfmshadd6167d443505fp1e67b9jsn52454cd044a5"
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
}