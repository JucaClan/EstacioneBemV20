<?php

require_once('Banco.class.php');
class Configuracao{
    public $id;
    public $nome_configuracao;
    public $valor;

    public function Listar(){
        $sql = "SELECT * FROM configuracoes";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function ConfigVagas(){
        $sql = "SELECT * FROM configuracoes";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }
}



?>