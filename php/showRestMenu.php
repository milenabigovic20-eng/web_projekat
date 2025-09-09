<?php

require 'connection.php';
global $conn;


$sql = "SELECT fr.price, r.restaurant_title, r.location, f.food_title, fc.category_name, f.id
FROM food_restaurant fr
JOIN restaurant r ON fr.restaurant_id = r.id
JOIN food f ON fr.food_id = f.id
JOIN food_category fc ON fc.id = f.food_category_id
WHERE r.id = ?";

$stmt = $conn->prepare($sql);
$current_restaurant = $_GET['current_restaurant'];
$stmt->bind_param("i", $current_restaurant);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>" . $row['restaurant_title'] . "</h1>";

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $categoryNames = array_column($rows, 'category_name');

    $categories = array_unique($categoryNames);

    echo "<h2>Location: " . $row['location'] ."</h2>";
    echo "<br>";
    echo "<div class='menu-style'>";
    echo "<h4>Menu</h4>";
    foreach($categories as $category) {
        echo "<br>";
        echo "<h2>Food Category: " . $category ." </h2>";
        echo "<table class='menu-table'>";
        foreach($rows as $row) {
            if($row['category_name'] == $category) {
                $link = 'order.php?foodId='. $row['id'];
                echo "<tr>";
                echo "<td>" . $row['food_title'] . "</td>";
                echo "<td>" . $row['price'] . "€</td>";
                echo "<td><a href='" . $link . "'>Add To Cart</a></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    echo "</div>";
}