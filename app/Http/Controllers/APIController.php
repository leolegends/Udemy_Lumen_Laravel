<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class APIController extends Controller
{
	protected $client;

	public function __construct()
	{
	   	$this->client = new Client(); 
	}

    public function getClientesAPI()
    {
    	$result = $this->client->get('http://localhost/lumen/public/clientes');
    		
    //	echo $result->getBody();
        
    	$resultado = json_decode($result->getBody()->getContents());

    	foreach($resultado as $result){
    		echo "<p>" . $result->nome . " - <b>".  $result->cnpj ."</b></p><br>";
    	}

    }


    public function getClienteAPI($id)
    {
    	$result = $this->client->get('http://localhost/lumen/public/clientes/' . $id);

    //	echo $result->getBody();

    	$resultado = json_decode($result->getBody()->getContents());

    		echo "<p>" . $resultado->nome . " - <b>".  $resultado->cnpj ."</b></p><br>";
    	

    }

   public function removeClienteAPI($id)
    {
    	$result = $this->client->delete('http://localhost/lumen/public/clientes/' . $id);

        echo $result->getBody();

    	//$resultado = json_decode($result->getBody()->getContents());
    }

 	public function alteraCliente()
 	{
    	$result = $this->client->put('http://localhost/lumen/public/clientes',[
    	'form_params' => [
    	'nome'	=> 'TESTE',
    	'cnpj' => 1111111111,
    	'id' => 44
    	]
    	]);
       echo $result->getBody();

//    	$resultado = json_decode($result->getBody()->getContents());
 	}


 	public function cadastraCliente()
 	{
    	$result = $this->client->post('http://localhost/lumen/public/clientes',[
    	'form_params' => [
    	'nome'	=> 'TESTE',
    	'cnpj' => 1111111111
    	]
    	]);
    	       echo $result->getBody();
//    	$resultado = json_decode($result->getBody()->getContents());
// 		dd($resultado);
 	}

}
