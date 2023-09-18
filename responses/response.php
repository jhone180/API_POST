<?php

class Response{
    public static function responseActulizar(){
        header('Content-Type: application/json');
        $response = [
            'success' => true,
            'message' => 'Se ha actualizado correctamente los datos.'
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseEliminar(){
        header('Content-Type: application/json');
        $response = [
            'success' => true,
            'message' => 'Se ha eliminado correctamente el registro.'
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseRegistrar($id){
        header('Content-Type: application/json');
        $response = [
            'success' => true,
            'message' => 'Se ha registrado correctamente los datos.',
            'data' => [
                'id' => $id
            ]
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseErrorInstancia(IModel $obj, $instancia){
        header('Content-Type: application/json');
        $response = [
            'success' => false,
            'message' => 'Se esperaba una instancia de la clase ' . get_class($instancia) . ' pero llego ' .  get_class($obj)
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseErrorLlave(){
        header('Content-Type: application/json');
        $response = [
            'success' => false,
            'message' => 'Debe especificar la llave primaria.'
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseErrorAccion(){
        header('Content-Type: application/json');
        $response = [
            'success' => false,
            'message' => 'Accion no corresponde a alguna existente.'
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseErrorHTTP(){
        header('Content-Type: application/json');
        $response = [
            'success' => false,
            'message' => 'Metodo no corresponde a alguna existente.'
        ];
        $json = json_encode($response);
        return $json;
    }

    public static function responseErrorGeneral($msg){
        header('Content-Type: application/json');
        $response = [
            'success' => false,
            'message' => 'Hubo un error: ' . $msg
        ];
        $json = json_encode($response);
        return $json;
    }
}

?>