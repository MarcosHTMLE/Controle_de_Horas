<?php

class Funcionario{

    private $nome;
    private $cpf;
    private $data_inicial;
    private $hora_inicial;
    private $data_final;
    private $hora_final;
    private $horas_trabalhadas;


    function setNome($nome){
        $this->nome = $nome;
    }

    function getNome(){
        return $this->nome;
    }

    function setCpf($cpf){
        $this->cpf = $cpf;
    }

    function getCpf(){
        return $this->cpf;
    }

    function setDataInicial($data_inicial){
        $this->data_inicial = $data_inicial;
    }

    function getDataInicial(){
        return $this->data_inicial;
    }

    function setHoraInicial($hora_inicial){
        $this->hora_inicial = $hora_inicial;
    }

    function getHoraInicial(){
        return $this->hora_inicial;
    }

    function setDataFinal($data_final){
        $this->data_final = $data_final;
    }

    function getDataFinal(){
        return $this->data_final;
    }

    function setHoraFinal($hora_final){
        $this->hora_final = $hora_final;
    }

    function getHoraFinal(){
        return $this->hora_final;
    }

    function setHorasTrabalhadas($horas_trabalhadas){
        $this->horas_trabalhadas = $horas_trabalhadas;
    }

    function getHorasTrabalhadas(){
        return $this->horas_trabalhadas;
    }
}




?>