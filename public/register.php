<?php

    //configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your passwords do not match.");
        }
        else
        {
            
            if (query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"])) === false)
            {
                apologize("A user already has than username :(");
            }
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                $_SESSION["id"] = $id;
                redirect("/");
            }
        }
    }
    else
    {
        // else render from
        render("register_form.php", ["title" => "Register"]);
    }
    
?>
