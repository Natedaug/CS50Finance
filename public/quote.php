<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        // query database for user
        $stock = lookup($_POST["symbol"]);
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        if ($stock===false)
        {
            apologize("Not a valid symbol");
        }
        else
            render("quoted.php", ["title" => "Quote","symbol" => $stock["symbol"], "stockName" => $stock["name"] , "stockPrice" => number_format($stock["price"],2), "cash" => number_format($cash[0]["cash"],2)]);
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }

?>