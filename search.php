<!-- 
Objective: make a search system.
plan:
    get the search variable (inserted at the search button submit)
    based on the variable, get the products with filtering them by keyword or by tag
    filter duplicates
    for each product, create a div for the product
-->


<main class="" id="search">
    
    <div class="container-fluid d-flex" id="searchContainer">
        
    </div>
    <?php

    ?>
    <script src="./js/search.js"></script>
</main>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchText = $_POST['search'] ?? '';
}

include 'connect.php';

$search_element = "SELECT * FROM products WHERE product_name = '$searchText'";

$thelist = [];
//execute query
$result = $mysqli -> query($search_element);
if ($result -> num_rows > 0){ // get very element that meets the criteria (for now, only by name. Later, with tags)
    while ($raw_info = $result -> fetch_assoc()){ //gets the row and then deletes it from $result, this way, you can get every row
        /*$id_product      = $raw_info['id_product'];
        $id_manufacturer = $raw_info['id_manufacturer'];
        $product_name    = $raw_info['product_name'];
        $quantity        = $raw_info['quantity'];
        $price           = $raw_info['price'];
        $about           = $raw_info['about'];
        $specs           = $raw_info['specs'];
        $img             = $raw_info['img'];*/

        $thelist[] = $raw_info;
        echo "\n".$id_product;

        // echo '<script>myJsFunction(' . json_encode($array) . ');</script>'; or echo '<script>myJsFunction(' . $num . ');</script>'; to execute a function.
        
    }
    echo'<script>initSearchContainer('.json_encode($thelist).');</script>';
} else {
    echo "0 results";
}


?>


