<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time; // v203
use CodeIgniter\Files\File; // v205

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
    // GET http://22-trabajando-con-librerias.test/lib/send-email (v201)
    public function form_email()
    {
        $data = [
            "title" => "Formulario de contacto",
        ];
        return view('mail/form', $data);   
    }
    // POST http://22-trabajando-con-librerias.test/lib/send-email (v201)
    public function send_email()
    {
        $post = $this->request->getPost(["email-content"]);

        if(! $this->validateData($post, [
            "email-content" => "required|max_length[255]|min_length[3]"
        ])) {
            $data = [
                "title" => "Error Email",
                "error" => "errores de validacion"
            ];
            return view('mail/error', $data);
        }

        // cargo el servicio
        $email = \Config\Services::email();
        
        // remitente
        $email->setFrom('legales@armstrong_municipio.com.ar', 'legales'); 
        
        // destinatario
        // $email->setTo('pablo@gmail.com'); 
        $email->setTo('lionel.prats.c@gmail.com'); 
        
        // asunto
        $email->setSubject('Notificación de infracción de tránsito'); 
        
        // contenido
        $email->setMessage($post["email-content"]); 
        
        // Carbon Copy | Con Copia
        $email->setCC('tesoreria@armstrong_municipio.com.ar'); 
        
        // Blind Carbon Copy | Con Copia Oculta
        $email->setBCC('direccion@armstrong_municipio.com.ar'); 
        
        // sign logo
        $email->attach('assets/img/logo.jpg'); 
     
        // defino que quiero mandar el mail en formato html (por default esta seteado en "text")
        $email->setMailType("html"); 

        if($email->send()) {
            $data = [
                "title" => "Success Email",
            ];
            return view('mail/success', $data); 
        } else { // Manejo de errores en el envío
            $data = [
                "title" => "Error Email",
                "error" => $email->printDebugger(['headers'])
            ];
            return view('mail/error', $data);
        }
    }
    // GET http://22-trabajando-con-librerias.test/lib/encrypter (v202)
    public function encrypter()
    {
        // para que el encriptado funcione correctamente tengo que setear el atributo $key del archivo de configuracion /app/Config/Encryption.php
        // esta es una forma de setear el atributo en el archivo, desde el controlador vvv
        $config         = new \Config\Encryption();
        $config->key    = 'aBigsecret_ofAtleast32Characters';
        // $config->driver = 'OpenSSL'; // podria setear otros atributos del archivo
        
        // cargo el servicio pasando como argumento el seteo de los atributos, definido arriba
        $encrypter = \Config\Services::encrypter($config);
        
        // tambien podria setear el atributo $key manualmente desde el archivo en vez de hacerlo desde el controlador, y cargar el servicio sin pasarle ningun argumento
        // $encrypter = \Config\Services::encrypter();

        $plainText  = 'This is a plain-text message!';
        $ciphertext = $encrypter->encrypt($plainText);

        echo $ciphertext . "<br>";
        echo $encrypter->decrypt($ciphertext);
    }
    // GET http://22-trabajando-con-librerias.test/lib/time (v203)
    public function time()
    {
        // ambas formas de usar la clase Time son validas
        // $myTime = new Time('now');
        // $myTime = Time::parse('now');
        // echo $myTime;
        // ddl($myTime);

        // $myTime = Time::parse('+3 week');
        // $myTime = Time::parse('-3 years');
        // $myTime = Time::parse('2024-01-01 12:00:00');

        $chicago = Time::parse('now', 'America/Chicago');
        $baires = Time::parse('now');
        $tokyo = Time::parse('-12 hours', 'Asia/Tokyo');
        $auckland = Time::parse('now', 'Pacific/Auckland');
        echo "Fecha y hora actual en Chicago: $chicago";
        echo "<br>";
        echo "Fecha y hora actual en Buenos Aires: $baires";
        echo "<br>";
        echo "Fecha y hora actual en Tokyo (12 horas de delay): $tokyo";
        echo "<br>";
        echo "Fecha y hora actual en Auckland: $auckland";
        echo "<br>";
        echo $chicago->humanize();
        echo "<br>";
        echo $tokyo->humanize();
        echo "<hr>";

        // $time = Time::parse('August 12, 2016 4:15:23pm');
        $time = Time::parse('March 06, 1985 12:45:23pm');
        // The output may vary based on locale.
        echo "Anio: " . $time->getYear() . "<br>";   
        echo "Mes: " . $time->getMonth() . "<br>";  
        echo "Dia: " . $time->getDay() . "<br>";    
        echo "Hora: " . $time->getHour() . "<br>";   
        echo "Minutos: " . $time->getMinute() . "<br>"; 
        echo "Segundos: " . $time->getSecond() . "<br>"; 
        echo "<hr>";
        echo "Anio: " . $time->year . "<br>";   
        echo "Mes: " . $time->month . "<br>";  
        echo "Dia: " . $time->day . "<br>";    
        echo "Hora: " . $time->hour . "<br>";   
        echo "Minutos: " . $time->minute . "<br>"; 
        echo "Segundos: " . $time->second; 
        echo "<hr>";

        $current = Time::parse('now', 'America/Argentina/Buenos_Aires');
        $born    = Time::parse('March 06, 1985 12:45:23pm', 'America/Argentina/Rio_Gallegos');
        $diff = $current->difference($born);
        echo $diff->humanize();
    }
    // GET http://22-trabajando-con-librerias.test/lib/uri (v204)
    public function uri()
    {
        $uri = $this->request->getUri();
        // http://22-trabajando-con-librerias.test/index.php/lib/uri
        
        $uri = new \CodeIgniter\HTTP\URI('https://sijuzna.armstrong.com.ar:8480/sentencia-multicausa?id-acta=24144&concurso=1#instructivo');
        $data = [
            "title" => "Uri", 
            "uri" => $uri, 
        ];
        return view('uri', $data);        
    }
    // GET http://22-trabajando-con-librerias.test/lib/file (v205)
    public function file()
    {
        // otra forma valida de importar e instanciar la clase File
        // $file = new \CodeIgniter\Files\File($path);

        $path = "C:/laragon/www/22-trabajando-con-librerias/public/assets/img/logo.jpg";
        $path = dirname(__DIR__, 2) . "/public/assets/img/logo.jpg";
        $path = "assets/img/logo.jpg";
        $file = new File($path);
        
        $path2 = dirname(__DIR__, 2) . "/writable/uploads/cppa.jpeg";
        $path_file_in_writable_folder = new File($path2);
        
        ddl($file);
        ddl($path_file_in_writable_folder);
        
        $data = [
            "title" => "File", 
            "file" => $file, 
            "path_file_in_writable_folder" => $path_file_in_writable_folder, 
        ];
        return view('file', $data);        
    }
}