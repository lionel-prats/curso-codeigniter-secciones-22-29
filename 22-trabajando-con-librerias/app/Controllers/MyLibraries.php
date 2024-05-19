<?php

namespace App\Controllers;

class MyLibraries extends BaseController
{
    // GET http://22-trabajando-con-librerias.test/lib/curl_get (v198)
    public function curl_get()
    {
        $client = \Config\Services::curlrequest();
        $endpoint = "http://0_codeigniter4.test/api/pelicula";
        // $endpoint = "http://0_codeigniter4.test/api/pelicula/5";
        // $endpoint = "https://codeigniter.com/user_guide/libraries/curlrequest.html";
        $response = $client->get(
            $endpoint,
            [
                'headers' => [
                    'Accept'     => 'application/json',
                    // 'Accept'     => 'application/xml',
                ]
            ],
        );
        $code = $response->getStatusCode();
        $body = json_decode($response->getBody());
        // ddl($code, "v");
        ddl($body, "p");
        // echo $response->getBody();
    }
    // GET http://22-trabajando-con-librerias.test/lib/curl_get2 (v198)
    public function curl_get2()
    {
        $client = \Config\Services::curlrequest();
        $endpoint = "http://0_codeigniter4.test/api/pelicula/5";
        $options = [
            'headers' => [
                'Accept'     => 'application/json',
            ]
        ];
        $response = $client->request("get", $endpoint, $options);
        $code = $response->getStatusCode();
        $body = json_decode($response->getBody());
        ddl($code, "v");
        ddl($body, "p");
    }
    // GET http://22-trabajando-con-librerias.test/lib/curl_remove (v198)
    public function curl_remove()
    {
        $client = \Config\Services::curlrequest();
        $endpoint = "http://0_codeigniter4.test/api/pelicula/3";
        $options = [
            'headers' => [
                // 'Accept'     => 'application/json',
                'Accept'     => 'application/xml',
            ]
        ];
        $response = $client->delete($endpoint, $options);
        $code = $response->getStatusCode();
        $body = json_decode($response->getBody());
        // echo $response->getBody();
        ddl($code);
        echo $response->getBody();
        ddl($body, "v");
        ddl($response);
    }
    // GET http://22-trabajando-con-librerias.test/lib/curl_post (v199)
    public function curl_post()
    {
        $client = \Config\Services::curlrequest();
        $endpoint = "http://0_codeigniter4.test/api/pelicula";
        $options = [
            "form_params" => [
                "titulo" => "terminator",
                "descripcion" => "Shuarzeneger es un androide del futuro",
                // "categoria_id" => 6,
            ]
        ];
        try {
            $response = $client->post($endpoint, $options);
            // $response = $client->request("POST", $endpoint, $options);
            ddl($response->getStatusCode());
            ddl($response->getBody());
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Manejar el error de validación aquí
            echo 'Error: ' . $e->getMessage();
        }        
    }
    // GET http://22-trabajando-con-librerias.test/lib/curl_put (v199)
    public function curl_put()
    {
        $client = \Config\Services::curlrequest();
        $endpoint = "http://0_codeigniter4.test/api/pelicula/414";
        $options = [
            "form_params" => [
                "titulo" => "bart simpson",
                "descripcion" => "Shuarzeneger es mongol",
                "categoria_id" => 1,
            ]
        ];
        try {
            // $response = $client->put($endpoint, $options);
            $response = $client->request("PUT", $endpoint, $options);
            ddl($response->getStatusCode());
            ddl($response->getBody());
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Manejar el error de validación aquí
            echo 'Error: ' . $e->getMessage();
        }        
    }
    // GET http://22-trabajando-con-librerias.test/lib/agent (v200)
    public function agent()
    {
        $agent = $this->request->getUserAgent();
        $data = [
            "title" => "User Agent Class", 
            "agent" => $agent,
        ];
        return view('my_agent', $data);
    }
}