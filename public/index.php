<?php
    // configuration
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sh = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["sellSymb"]);
        $st = lookup($_POST["sellSymb"]);
        if ($st !== false && $sh !== false)
        { //selling
            $tot = $sh[0]["shares"] * $st["price"];
            query("UPDATE users SET cash = cash + ? WHERE id = ?", $tot , $_SESSION["id"]);
            query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["sellSymb"]);
            //update history
            query("INSERT INTO history (id, bought, symbol, price, num, dnt) VALUES( ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)",$_SESSION["id"], false, $_POST["sellSymb"], $st["price"], $sh[0]["shares"]);
        }
    }
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id =?", $_SESSION["id"]);
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }

    // render portfolio
    render("portfolio.php", ["positions" => $positions,"cash" => $cash[0]["cash"], "title" => "Portfolio"]);

?>
