<?php

require_once('Banco.class.php');
class Servico{
    public $id;
    public $servico;
    public $valor;

    public function Listar(){
        $sql = "SELECT * FROM servicos";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function ListarPorID(){
        $sql = "SELECT * FROM servicos WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function Editar()
    {
        $cont = 0;
        $sql = "UPDATE servicos SET valor=? WHERE id=1";
        $sql2 = "UPDATE servicos SET valor=? WHERE id=2";
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

?>