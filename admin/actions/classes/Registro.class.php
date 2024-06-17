<?php

require_once('Banco.class.php');
class Registro{
    public $id;
    public $tipo;
    public $horario;
    public $id_estacionamento;

    public function Registrar(){
        $sql = "INSERT INTO registro(tipo, horario, id_estacionamento) 
        VALUES (?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        try{
        $comando->execute([$this->tipo, $this->horario, $this->id_estacionamento]);
        Banco::desconectar();
        return $comando->rowCount();
        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Apagar(){
        $sql = "DELETE FROM registro WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }



}

?>