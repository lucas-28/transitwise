<?php include "/transitwise/privacy/adminCheck.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Home page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">

</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>

<body>
<!--Creates the navigation side bar of links to edit/view account.-->
<?php include ('../../../includes/leftnavadmin.php'); ?>

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

    <!-- footer -->
    <?php include('../../../includes/footer.php'); ?>
</body>
</html>


