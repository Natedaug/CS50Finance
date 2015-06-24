<a href="quote.php">Quote/Buy</a>   -   <a href="history.php">History</a>   -   <a href="deposit.php">Deposit</a><br><br>
<form action="index.php" method="post">
<table class = "table table-striped table-hover">

       <thead><tr><th>Symbol</th><th>Name</th><th>Shares</th><th>Price</th><th>Total</th><th></th></tr></thead>
       <tbody class = "text-left">
       <?php foreach ($positions as $position): ?>
            <tr>
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["name"] ?></td>
            <td><?= $position["shares"] ?></td>
            <td><?= $position["price"] ?></td>
            <td><?= "$" . $position["price"] * $position["shares"] ?></td>
            <td><button type="submit" class="btn btn-default" name="sellSymb" value=<?= $position["symbol"] ?> style = "width:50px">Sell</button></td>
            </tr>
       <? endforeach ?>
       <tr><td>cash</td><td></td><td></td><td></td><td>$<?= number_format($cash,2) ?></td><td></td></tr>
       </tbody>
</table>
</form>
<div>
    <a href="logout.php">Log Out</a>
</div>
