<?php

require 'connection.php';
global $conn;


$sql = "DELETE FROM user_food WHERE user_id = ? AND id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $_POST['user_id'], $_POST['food_user_id']);
$stmt->execute();

$sqlSelect = "SELECT food_title, uf.id FROM user_food uf
                JOIN users u ON uf.user_id = u.id
                JOIN food f ON uf.food_id = f.id
                WHERE u.id = ?";
$stmtSelect = $conn->prepare($sqlSelect);
$stmtSelect->bind_param('i', $_POST['user_id']);
$stmtSelect->execute();
$resultSelect = $stmtSelect->get_result();

$div = "<div class='main_container'>";
if($resultSelect->num_rows > 0) {
    $div .= "<table>";
    while ($row = $resultSelect->fetch_assoc()) {
        $div .= "<tr>";
        $div .= "<input type='hidden' value='" . $row['id'] . "' id='food-user-id'>";
        $div .= "<td>" . $row['food_title'] . "</td>";
        $div .= "<td id='remove'><a>Remove</a></td>";
        $div .= "</tr>";
    }
    $div .= "<table>";

    $div .= "<br>";
    $div .= "<br>";
    $div .= "<a id='order'>Order</a>";
} else {
    $div .= "<table><tr><td>Cart is empty.</td></tr></table>";
}
$div .= "</div>";


$response = array(
    'status' => 'success',
    'table' => $div
);
header('Content-Type: application/json');
echo json_encode($response);