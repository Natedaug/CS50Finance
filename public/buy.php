<?php
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $tot = $_POST["shares"] * $_POST["price"];
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);

        if (preg_match("/^\d+$/", $_POST["shares"]) && ($cash[0]["cash"] > $tot))
        {
            query("INSERT INTO portfolio (id, symbol, shares) VALUES( ?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",$_SESSION["id"], $_POST["symbol"], $_POST["shares"]);
            query("UPDATE users SET cash = cash - ? WHERE id = ?", $tot , $_SESSION["id"]);
            //update history
            query("INSERT INTO history (id, bought, symbol, price, num, dnt) VALUES( ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)",$_SESSION["id"], true, $_POST["symbol"], $_POST["price"], $_POST["shares"]);
            redirect("/");
        }
        else
            apologize("Could not compute!");
    }

?>