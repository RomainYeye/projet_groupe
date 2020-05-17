<?php
class ServiceTemoignages {
    private $dao;

    public function __construct() {
        $this->dao = new DataAccessTemoignages();
    }

    public function getAll() {
        $allTemoignages = $this->dao->getAll();
        return $allTemoignages;
    }

    public function getAllAllowed() {
        $allAllowedTemoignages = $this->dao->getAllAllowed();
        return $allAllowedTemoignages;
    }
    

    public function getIndex() {
        $indexTemoignages = $this->dao->getOneIndex();
        return $indexTemoignages;
    }

    public function getIndexAllowed() {
        $indexTemoignages = $this->dao->getOneIndexAllowed();
        return $indexTemoignages;
    }
    
    public function getId() {
        $listId = $this->dao->getId();
        return $listId;
        
    }

    public function getBySearch($offset) {
        $adminTemoignagesBySearch = $this->dao->getBySearch("%$offset%");
        return $adminTemoignagesBySearch;
    }

    public function majTemoignages($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="majTemoignages") {
                    $id = $val;
                }
             }	
         }
         $temoignages = $this->dao->majTemoignages($post, $val, $id);
         return $temoignages;
     }
     public function delTemoignages($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="delTemoignages") {
                    $id = $val;
                }
             }	
         }
         $Stats = $this->dao->delTemoignages($id);
         return $Stats;
     }

     public function add(Temoignage $temoignage) : void {
         $this->dao->add($temoignage);
     }


}
?>