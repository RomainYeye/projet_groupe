<?php

interface InterfaceServiceEspece {

    public function selectAll() : array;

    public function select(string $option) : array;

    public function selectNomEspeceWhereIdIs(int $idEspece) : string;

} 

?>