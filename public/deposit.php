<?php
    // configuration
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {//todo
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["depo"] , $_SESSION["id"]);
        redirect("/");
    }
    else
        render("deposit_form.php", ["title" => "Deposit"]);
?>