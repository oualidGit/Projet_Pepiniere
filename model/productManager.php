<?php
require_once("model/Manager.php");
class ProductManager extends Manager
{
    public function getAllProducts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM tblproduit order by nom asc');
        $produits=$req;
       
        return $produits;
    }

	public function getProduct($idProduit){
		
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM tblproduit WHERE id = ?');
        $req->execute(array($idProduit));
        $produit = $req->fetch();

        return $produit;		
    }
}
