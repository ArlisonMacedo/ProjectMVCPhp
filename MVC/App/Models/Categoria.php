<?php

namespace App\Models;


class Categoria {


    private $ID;
    private $nome;

    /**
     * 
     * Setters
     */

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * 
     * Getters
     */

    public function getID()
    {
        return $this->ID;
    }

    public function getNome()
    {
        return $this->nome;
    }

}