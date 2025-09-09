<?php

require 'connection.php';
global $conn;

$sql = "SELECT r.id, f.food_title, r.restaurant_title
FROM food_restaurant fr
JOIN restaurant r ON fr.restaurant_id = r.id
JOIN food f ON fr.food_id = f.id
WHERE f.food_title LIKE ?";

$stmt = $conn->prepare($sql);
$search = "%" . $_GET['query'] . "%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $link = 'menu.php?menuId='.$row['id'];
        echo "<tr>
        <td>" . $row['food_title'] ."</td>
        <td> " . $row['restaurant_title'] . " </td>
        <td><a href='" . $link ."'>Details</a></td>
        </tr>";
    }
} else {
    echo "<tr>
    <td>No Results Found</td>
    </tr>";
}