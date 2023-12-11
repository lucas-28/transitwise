<div class="error-message" id="error-message">
    <?php
    if (isset($_SESSION["error"]) && $_SESSION["error"] == true) {
        $error_message = $_SESSION["error-message"];
        echo '<style type="text/css">
                 #error-message {
                    display: block;
                }
                </style>';
        echo '<p id="error-message">' . $error_message . '</p>';
    }
    unset($_SESSION['error']);
    ?>
</div>