<?php

interface InterfaceDAORefuge {

    public function selectAll() : array;

    public function select(string $option) : array;

}

?>