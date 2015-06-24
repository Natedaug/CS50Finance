<?php
    // configuration
    require("../includes/config.php");

    $rows = query("SELECT bought, symbol, price, num, dnt FROM history WHERE id =?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $positions[] = [
        "bos" => $row["bought"] ? "Bought" : "Sold",
        "symbol" => $row["symbol"],
        "price" => $row["price"],
        "num" => $row["num"],
        "dnt" => $row["dnt"]
        ];

    }
    render("history_form.php", ["positions" => $positions]);
?>