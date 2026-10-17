<?php
include 'calculate.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Calculator Electricity Bill</title>
</head>

<body>
    <h2>Calculator Electricity Bill</h2>

    <?php
    // Show the warning only when there is an error.
    if (!empty($error)) {
        echo "<p><b>Warning:</b> " . htmlspecialchars($error) . "</p>";
    }
    ?>

    <div style="margin-bottom: 30px;">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Block Tariff (per month)</th>
                <th>Unit</th>
                <th>Rate</th>
            </tr>
            <tr>
                <td>For the first 200 kWh (1-200 kWh) per month</td>
                <td>1 - 200 kWh</td>
                <td>0.218</td>
            </tr>
            <tr>
                <td>For the next 100 kWh (201-300 kWh) per month</td>
                <td>201 - 300 kWh</td>
                <td>0.344</td>
            </tr>
            <tr>
                <td>For the next 300 kWh (301-600 kWh) per month</td>
                <td>301 - 600 kWh</td>
                <td>0.516</td>
            </tr>
            <tr>
                <td>For the next 300 kWh (601-900 kWh) per month</td>
                <td>601 - 900 kWh</td>
                <td>0.546</td>
            </tr>
            <tr>
                <td>For the next kWh (901 kWh onwards) per month</td>
                <td>901 kWh onwards</td>
                <td>0.571</td>
            </tr>
            <tr>
                <td colspan="3">The minimum monthly charge is RM 3.00</td>
            </tr>
        </table>
    </div>

    <form method="POST" action="">
        <label>Enter your first 200 kWh (1-200 kWh) per month :</label>
        <input type="text" name="block1" value="<?php echo htmlspecialchars($block1); ?>"><br><br>

        <label>Enter next 100 kWh (201-300 kWh) per month :</label>
        <input type="text" name="block2" value="<?php echo htmlspecialchars($block2); ?>"><br><br>

        <label>Enter next 300 kWh (301-600 kWh) per month :</label>
        <input type="text" name="block3" value="<?php echo htmlspecialchars($block3); ?>"><br><br>

        <label>Enter next 300 kWh (601-900 kWh) per month :</label>
        <input type="text" name="block4" value="<?php echo htmlspecialchars($block4); ?>"><br><br>

        <label>Enter next kWh (901 kWh onwards) per month :</label>
        <input type="text" name="block5" value="<?php echo htmlspecialchars($block5); ?>"><br><br>

        <div class="buttons">
            <input type="submit" name="calculate" value="Calculate Bill">
            <input type="button" value="Reset" onclick="window.location.href=window.location.pathname;">
        </div>
    </form>

    <?php
    if ($showBill) {
    ?>
        <hr>
        <h3>Your Electricity Bill Calculation</h3>
        <br>1 - 200 kWh: <?php echo $block1; ?> kWh x 0.218 = RM <?php echo number_format($charge1, 2); ?>
        <br>201 - 300 kWh: <?php echo $block2; ?> kWh x 0.344 = RM <?php echo number_format($charge2, 2); ?>
        <br>301 - 600 kWh: <?php echo $block3; ?> kWh x 0.516 = RM <?php echo number_format($charge3, 2); ?>
        <br>601 - 900 kWh: <?php echo $block4; ?> kWh x 0.546 = RM <?php echo number_format($charge4, 2); ?>
        <br>901 kWh onwards: <?php echo $block5; ?> kWh x 0.571 = RM <?php echo number_format($charge5, 2); ?>
        <hr>
        <br>Total Consumption: <?php echo number_format($totalKwh, 2); ?> kWh<br>
        <br>Total Usage Amount: RM <?php echo number_format($totalCharge, 2); ?><br>
        <br>SST (6%): RM <?php echo number_format($sst, 2); ?><br>
        <br>Total Bill: RM <?php echo number_format($totalBill, 2); ?></b><br>
    <?php
    }
    ?>

</body>

</html>