<?php

interface InterfaceDAORace {

    public function selectAll() : array;

    public function selectAllWhereEspeceIs(int $idEspece) : array;

    public function selectRacesWhereEspeceIs(int $idEspece) : array;

    public function selectNomRaceWhereIdIs(int $idRace) : string;

}

?>