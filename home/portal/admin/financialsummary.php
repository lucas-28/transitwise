<!DOCTYPE html>
<html>
<head>
<?php //set up table ?>
	<title>Daily Financial Summary (Z Report)</title>
    <style>
        h1, table {
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>
<?php // create table labels ?>
    <h1>Daily Financial Summary (Z Report)</h1>
    <table border="1">
        <tr>
            <th>Category</th>
            <th>Amount($)</th>
        </tr>
        <tr>
<?php // instantiate all variables. Values are set to 0.0 as a placeholder. Will later communicate with backend for information. ?>
            <td>total sales before tax</td>
            <td><?php $total_sales_before_tax = 0.0; echo $total_sales_before_tax; ?></td>
        </tr>
        <tr>
            <td>tax</td>
            <td><?php $tax = 0.0; echo $tax; ?></td>
        </tr>
        <tr>
            <td>total sales after tax</td>
            <td><?php $total_sales_after_tax = 0.0; echo $total_sales_after_tax; ?></td>
        </tr>
        <tr>
            <td>debit</td>
            <td><?php $debit = 0.0; echo $debit; ?></td>
        </tr>
        <tr>
            <td>credit</td>
            <td><?php $credit = 0.0; echo $credit; ?></td>
        </tr>
        <tr>
            <td>refunds</td>
            <td><?php $refunds = 0.0; echo $refunds; ?></td>
        </tr>
        <tr>
            <td>roundtrip sales</td>
            <td><?php $roundtrip_sales = 0.0; echo $roundtrip_sales; ?></td>
        </tr>
        <tr>
            <td>one-way sales</td>
            <td><?php $one_way_sales = 0.0; echo $one_way_sales; ?></td>
        </tr>
        <tr>
            <td>profit</td>
            <td><?php $profit = 0.0; echo $profit; ?></td>
        </tr>
    </table>
</body>
</html>


