<?php

require_once('Banco.class.php');
class Configuracao
{
    public $id;
    public $nome_configuracao;
    public $valor;

    public function Listar()
    {
        $sql = "SELECT * FROM configuracoes";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function ListarVagasLivres()
    {
        $sql = "SELECT (SELECT valor FROM configuracoes WHERE id = 2) - (SELECT COUNT(estacionamento.placa) 
        FROM estacionamento WHERE data_saida IS NULL) AS 'Vagas Livres'";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function ListarVagasOcupadas()
    {
        $sql = "SELECT COUNT(estacionamento.placa) AS 'Vagas Ocupadas' FROM estacionamento WHERE data_saida IS NULL";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function Editar()
    {
        $cont = 0;
        $sql = "UPDATE configuracoes SET valor=? WHERE id=1";
        $sql2 = "UPDATE configuracoes SET valor=? WHERE id=2";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        try {
            $comando->execute([$this->valor[0]]);
            $cont += $comando->rowCount();
            $comando = $banco->prepare($sql2);
            $comando->execute([$this->valor[1]]);
            $cont += $comando->rowCount();
            Banco::desconectar();
            return $cont;
        } catch (PDOException $e) {
            Banco::desconectar();
            return $cont;
        }
    }

}
