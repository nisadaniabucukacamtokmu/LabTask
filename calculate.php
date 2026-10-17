<?php

$showBill = false;
$error = "";

$block1 = "";
$block2 = "";
$block3 = "";
$block4 = "";
$block5 = "";

if (isset($_POST['calculate'])) {

    $block1 = $_POST['block1'];
    $block2 = $_POST['block2'];
    $block3 = $_POST['block3'];
    $block4 = $_POST['block4'];
    $block5 = $_POST['block5'];

    if ($block1 == "") {
        $block1 = 0;
    }
    if ($block2 == "") {
        $block2 = 0;
    }
    if ($block3 == "") {
        $block3 = 0;
    }
    if ($block4 == "") {
        $block4 = 0;
    }
    if ($block5 == "") {
        $block5 = 0;
    }



    if (!is_numeric($block1) || !is_numeric($block2) || !is_numeric($block3) || !is_numeric($block4) || !is_numeric($block5)) {
        $error = "Please enter numbers only.";
    } else if ($block1 < 0 || $block2 < 0 || $block3 < 0 || $block4 < 0 || $block5 < 0) {
        $error = "kWH cannot be a negative number. Try again.";
    } else if ($block1 + $block2 + $block3 + $block4 + $block5 == 0) {
        $error = "Please enter your electricity usage.";
    } else if ($block1 > 200) {
        $error = "Please enter less than 200kwH.";
    } else if ($block2 > 100) {
        $error = "Please enter less than 100kwH.";
    } else if ($block3 > 300 || $block4 > 300) {
        $error = "Please enter less than 300kwH.";
    } else {
        $charge1 = $block1 * 0.218;
        $charge2 = $block2 * 0.344;
        $charge3 = $block3 * 0.516;
        $charge4 = $block4 * 0.546;
        $charge5 = $block5 * 0.571;

        $totalKwh = $block1 + $block2 + $block3 + $block4 + $block5;
        $totalCharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

        if ($totalCharge < 3.00) {
            $totalCharge = 3.00;
        }


        if ($totalKwh > 600) {
            $sst = $totalCharge * 0.06;
        } else {
            $sst = 0;
        }

        $totalBill = $totalCharge + $sst;

        $showBill = true;
    }
}
