<?php

namespace App\WebService;

class ViaCEP
{


    /**
     * METODO RESPONSAVEL POR CONSULTAR O CEP
     * @param string $cep
     * @return string
     */
    public static function consultaCEP($cep)
    {
        // INICIA O CURL
        $curl = curl_init();

        // CONFIGURAÇOES DO CURL
        curl_setopt_array($curl,[
           CURLOPT_URL => "https://viacep.com.br/ws/$cep/json/",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        // RESPONSE
        $response = curl_exec($curl);

        curl_close($curl);
        // CONVERTE O JSON PARA ARRAY
        $array = json_decode($response,true);

        return isset($array['cep']) ? $array: "Cep invalido ou Não Encontrado";


    }


}