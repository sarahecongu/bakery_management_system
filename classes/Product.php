<?php
Class Product extends Model{
    protected  $table  = "products";
    public $name;
    public $price;
    public $quantity;
    public $image;
    public $health_benefit_id;
    public $category_id;

    public function getProductsByCategory($categoryId) {
        // Prepare the SQL statement with a question mark as a placeholder
        $sql = "SELECT products.*
                FROM products
                JOIN product_sub_categories ON products.product_sub_category_id = product_sub_categories.id
                JOIN product_categories ON product_sub_categories.product_category_id = product_categories.id
                WHERE product_categories.id = ?";
    
        // Prepare and execute the statement
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$categoryId]);
    
        // Fetch the results into an object
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
    
        return $result;
    }

    public function getRecipy($id) {
        // Prepare the SQL statement with a question mark as a placeholder
        $sql = "SELECT recipes.*
        FROM recipes
        JOIN recipe_product ON recipes.id = recipe_product.recipe_id
        JOIN products ON recipe_product.product_id = products.id
        WHERE products.id = ?";
    
        // Prepare and execute the statement
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    
        // Fetch the results into an object
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
    
        return $result;
    }


}