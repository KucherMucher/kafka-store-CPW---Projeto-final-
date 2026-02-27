<!-- 
Objective: make a search system.
plan:
    get the search variable (inserted at the search button submit)
    based on the variable, get the products with filtering them by keyword or by tag
    filter duplicates
    for each product, create a div for the product
-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchText = $_POST['search'] ?? '';
}

include 'connect.php';

$search_element = "SELECT * FROM products WHERE product_name = '$searchText'";
//execute query
$result = $mysqli->query($search_element);
$raw_info = $result -> fetch_assoc(); //array

// get info from the Array ( [id_product], [id_manufacturer], [product_name], [quantity], [price], [about], [specs], [img])
$id_product      = $raw_info['id_product'];
$id_manufacturer = $raw_info['id_manufacturer'];
$product_name    = $raw_info['product_name'];
$quantity        = $raw_info['quantity'];
$price           = $raw_info['price'];
$about           = $raw_info['about'];
$specs           = $raw_info['specs'];
$img             = $raw_info['img'];
echo "<sc"
?>

<main id="search">
    <?php
    print_r($raw_info);
    ?>
</main>


