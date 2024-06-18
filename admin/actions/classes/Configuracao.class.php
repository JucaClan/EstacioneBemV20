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

    public function MostrarVagasLivres(){
        $sql = "SELECT (SELECT valor FROM configuracoes WHERE id = 2) - (SELECT COUNT(estacionamento.placa) 
        FROM estacionamento WHERE data_saida IS NULL) AS 'Vagas Livres'";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function MostrarVagasOcupadas(){
        $sql = "SELECT (SELECT valor FROM configuracoes WHERE id = 2) - (SELECT COUNT(estacionamento.placa) 
        FROM estacionamento WHERE data_saida IS NULL) AS 'Vagas Livres'";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }
}



?>