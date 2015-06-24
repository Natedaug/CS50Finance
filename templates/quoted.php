<form action="buy.php" method="post">
    <p class="text-center" style = "font-size: 24pt; color: midnightblue">
       A share of <?= $stockName ?> costs $<?= $stockPrice ?><br><br>
        <button type="submit" class="btn btn-default">Buy</button>
        <input autofocus class="form-control" name="shares" placeholder="# of shares" type="text" style = "width:100px"/>
        <input type="hidden" name="symbol" value=<?= $symbol ?>>
        <input type="hidden" name="price" value=<?= $stockPrice ?>>
        <input type="hidden" name="cash" value=<?= $cash ?>>
        <br><br>
    </p>
    <p class = "tesxt-center" style="font-size: 20pt; color: coral">
        Your cash: $<?= $cash ?>
        <br>
    </p>
</form>
<a href="javascript:history.go(-1);">Back</a>
