<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";
if (isset($_GET['query'])) {
    $searchTerm = $connection->real_escape_string($_GET['query']);
    $output = "";

    $queries = [
        'customer' => "SELECT fname, lname, phone, cemail, district, sector, cell, village FROM customer WHERE cid LIKE '%$searchTerm%'",
        'vendor' => "SELECT vfname, vlname, phone, vemail, district, sector, cell, village FROM vendor WHERE vid LIKE '%$searchTerm%'",
        'product' => "SELECT pname, pgrade, price_per_unit, mfd_date, exp_date FROM product WHERE pid LIKE '%$searchTerm%'",
        'product_order' => "SELECT ordate, pid, pquantity, orprice, cid, order_status FROM product_order WHERE orid LIKE '%$searchTerm%'",
        'payment' => "SELECT paydate, pamount, pmethod, orid, pay_status, cid, phone FROM payment WHERE payid LIKE '%$searchTerm%'",
        'sell' => "SELECT sdate, vid, orid, product_name FROM sell WHERE sid LIKE '%$searchTerm%'"
    ];

    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $output .= "<li>";
                    foreach ($row as $key => $value) {
                        $output .= "$key: $value, ";
                    }
                    $output .= "</li>";
                }
                $output .= "</ul>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $connection->error . "</p>";
        }
    }

    echo $output;

    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>