<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transitwise</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    
</head>

<?php include ('../includes/topnav.php'); ?>

<body>
    <div class="main-content">
        <h1 class="center">Transitwise</h1>
        <div class="container">
            <form action="reserve/search.php" method="get">
                <div class="location-search-group">
                    <div id="origin">
                        <label for="origin">Origin</label>
                        <input placeholder="3 Letter Code" class= 'airport-input' type="text" id="origin-input"name="origin" value="" type="hidden" autocomplete="off" required/>
                    </div>
                    <div id="destination">
                        <label for="destination">Destination</label>
                        <input placeholder="3 Letter Code" class= 'airport-input' type="text" id="destination-input" name="destination" value="" type="hidden" autocomplete="off" required/>
                    </div>
                </div>
                <div class="date-search-group">
                    <label for="departure-date">Departure Date (of the year 2022)</label>
                    <input type="date" id="departure-date" name="departure-date" value="" type="hidden" required/>
                    
                </div>
                <div class="options-search-group">
                    <div class="passengers-search-group">
                        <label for="passengers">Number of Passengers</label>
                        <input type="number" id="passengers" name="passengers" value="1" min="1" max="8" step=1 required/>
                    </div>
                    
                </div>
                <div class="button-group">
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>
    <script src="/transitwise/js/index.js"></script>
    <script src="/transitwise/js/topnav.js"></script>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
                
