<?php

require_once 'model/ContactsLogic.php';
require_once 'model/Display.php';

class ContactsController {
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->Display = new Display();

    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $op = isset($_GET['op']) ? $_GET['op'] : '';
            
            switch ($op) {              
                default:
                    $this->collectReadallContacts();
                    break;

                case "update":
                    $this->collectUpdateContact();
                    break;

                case "delete":
                    $this->collectDeleteContact();
                    break;

                case "create":
                    $this->collectCreateContact();
                    break;                    

                case "read":
                    $this->collectReadContact();
                    break;

                case "order":
                    $this->orderProducts();
                    break;
            }
            

        } catch (Exception $e) {
            throw $e;
        }

    }
        public function collectReadPagedContacts($P) {
            $res = $this->ContactsLogic->readAllContacts($P);
            $contacts = $this->ContactsLogic->createTable($res[0]);
            $pages = $res[1];
            $msg = "Showing Page ($P) of all contacts";
            include 'view/reads.php';
        }


        public function collectReadContact(){
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->ContactsLogic->readContact($id);
            $html = $this->Display->createTable($res, true);
            include 'view/read.php';
        }

        public function collectCreateContact(){
            include 'view/create.php';            
            
            if(isset($_POST['createSubmit'])){            
                $res = $this->ContactsLogic->createContact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);                
                header('Location: index.php');
        }     

            
        }

        public function collectReadallContacts(){
            $res = $this->ContactsLogic->readallContacts();
            $html = $this->Display->createTable($res, true);
            include 'view/reads.php';
            $newres = $res->fetchAll(PDO::FETCH_ASSOC);
            header("content-type: application/json");
            echo json_encode($newres);
        }

        public function collectUpdateContact(){
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $res = $this->ContactsLogic->readContact($id);
            $result = $res->fetch(PDO::FETCH_ASSOC);
        
            include 'view/update.php';
     
            $editRes = $this->ContactsLogic->readContact($id);            

            if(isset($_POST['updateSubmit'])){
                    $res = $this->ContactsLogic->updateContact($id, $_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
                    var_dump($res);
                    if ($res == 1) {

                    }
                    header('Location: index.php?op=read&id=' . $id . '');
            }                    

        }


        public function collectDeleteContact(){
            include 'view/delete.php';
            
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            
            if(isset($_POST['deleteSubmit'])){

                $res = $this->ContactsLogic->deleteContact($id);
                header('Location: index.php');
            }
        
        }

        public function orderProducts() {

            $res = $this->ContactsLogic->readProducts();
            $html = $this->Display->createOrderTable($res);
            include 'view/order.php';
        }
}