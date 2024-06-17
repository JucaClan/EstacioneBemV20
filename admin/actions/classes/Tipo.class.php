<?php

require_once('Banco.class.php');
class Tipo{
    public $id;
    public $tipo;

    public function Listar(){
        $sql = "SELECT * FROM tipo";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }




}



?>