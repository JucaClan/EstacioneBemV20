<?php

require_once('Banco.class.php');
class FilaDeServicos {
    public $id;
    public $id_estacionamento;
    public $id_servico;

    public function Listar(){
        $sql = "SELECT * FROM fila_de_servicos";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

}

?>