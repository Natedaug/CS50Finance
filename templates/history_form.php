
<a href="quote.php">Quote/Buy</a>   -   <a href="deposit.php">Deposit</a>   -   <a href="index.php">Portfolio</a><br><br>

<table class = "table table-striped">
    <thead><tr><th>Date</th><th>Transaction</th><th>Shares</th><th>Symbol</th><th>Price</th></tr></thead>
       <tbody class = "text-left">
       <?php foreach ($positions as $position): ?>
    <tr>
        <td><?= date( "m/d/y h:ia", strtotime($position["dnt"])) ?></td>
        <td><?= $position["bos"] ?></td>
        <td><?= $position["num"] ?></td>
        <td><?= $position["symbol"] ?></td>
        <td>$<?= number_format($position["price"], 2) ?></td>
    </tr>
<? endforeach ?>
<tr><td></td><td></td><td></td><td></td><td></td></tr>
</tbody>
</table>

<div>
    <a href="logout.php">Log Out</a>
</div>