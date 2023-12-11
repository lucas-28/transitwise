<?php
//Steven Macaluso
//Transitwise
//Financial Summary/Z Report Page 

// Start the session
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'adminCheck.php'; //checks that user is admin for access to page

// Initialize amounts or retrieve them from sessions
$categories = array(
    "total_sales_before_tax" => isset($_SESSION['total_sales_before_tax']) ? $_SESSION['total_sales_before_tax'] : 0.0,
    "tax" => isset($_SESSION['tax']) ? $_SESSION['tax'] : 0.0,
    "total_sales_after_tax" => isset($_SESSION['total_sales_after_tax']) ? $_SESSION['total_sales_after_tax'] : 0.0,
    "debit" => isset($_SESSION['debit']) ? $_SESSION['debit'] : 0.0,
    "credit" => isset($_SESSION['credit']) ? $_SESSION['credit'] : 0.0,
    "refunds" => isset($_SESSION['refunds']) ? $_SESSION['refunds'] : 0.0,
    "roundtrip_sales" => isset($_SESSION['roundtrip_sales']) ? $_SESSION['roundtrip_sales'] : 0.0,
    "one_way_sales" => isset($_SESSION['one_way_sales']) ? $_SESSION['one_way_sales'] : 0.0,
    "profit" => isset($_SESSION['profit']) ? $_SESSION['profit'] : 0.0,
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update amounts based on form submission
    foreach ($categories as $category => $value) {
        $categories[$category] = isset($_POST[$category]) ? floatval($_POST[$category]) : 0.0;

        // Update session variables
        $_SESSION[$category] = $categories[$category];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Financial Summary (Z Report)</title>
	<!-- add Transitwise Stylesheet and Icon -->
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<body>
<!-- add Transitwise Header -->
<?php include ('../../../includes/leftnav.php'); ?>
<h2>Daily Financial Summary (Z Report)</h2>
<!-- display table and allow user to make changes -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
        <tr>
            <th>Category</th>
            <th>Amount $</th>
        </tr>
        <?php foreach ($categories as $category => $value): ?>
            <tr>
                <td><?php echo str_replace("_", " ", ucwords($category)); ?></td>
                <td><input type="number" step="0.01" name="<?php echo $category; ?>" value="<?php echo $value; ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <input type="submit" value="Submit">
</form>
<!-- add Transitwise Footer -->
	<footer>
    <div class="footer-container">
        <a href="/transitwise/home/portal/login.php">Transitwise Portal</a>
        <a href="contact.html">Contact</a>
        <a href="feedback.html">Feedback</a>
    </div>
</footer>
</body>
</html>
