<?php
require_once 'model/products-logic.php';

class WebsiteController
{
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function handleRequest()
    {
        try {
            $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
            switch ($page) {
                case 'home':
                    include 'view/home.php';
                    break;
                case 'productoverzicht':
                    include 'view/ProductOverzicht.php';
                    break;
                case 'winkelwagen':
                    include 'view/ShoppingCart.php';
                    break;
                case 'contact':
                    include 'view/contact.php';
                    break;
                case 'admin':
                    include 'view/Restricted/admin_home.php';
                    break;
                default:
                    include 'view/home.php';
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }

    }

    public function collectCreateProducts($request)
    {
        $products = $this->ProductsLogic->createContact($request);
        include 'view/insert_products.php';
    }

    public function collectUpdateContact()
    {
        include 'view/update.php';
    }

    public function collectReadContact($id)
    {
        $products = $this->ProductsLogic->readContact($id);
        include 'view/ViewProducts.php';

    }

    public function collectReadContacts()
    {
        $result = $this->ProductsLogic->readContacts();
        $products = $this->Utilities->createTable($result);

        include 'view/ViewProducts.php';
    }

    public function collectDeleteContact($id)
    {
        //echo "Gebruiker is verwijderd";
        $products = $this->ProductsLogic->deleteContact($id);
        include 'view/delete.php';

    }

}
