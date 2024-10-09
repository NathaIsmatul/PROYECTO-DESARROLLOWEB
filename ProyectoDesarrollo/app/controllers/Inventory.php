<?php

require_once 'app/models/InventoryModel.php';


class InventoryController {
    private $inventoryModel;

    public  function __construct(){
        $this->inventoryModel = new InventoryModel();
    }

    public function index(){
        $inventory = $this->inventoryModel->getAllInventory();
        require 'app/views/inventory/index.php';
    }

    public function addProduct($data){
        $this->inventoryModel->addProduct($data);
        header("Location: /inventory");
    }
}

?>