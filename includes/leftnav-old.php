<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left Nav Bar Example</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        #navbar {
            background-color: #333;
            color: #fff;
            width: 250px;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        #navbar ul {
            list-style-type: none;
            padding: 0;
        }

        #navbar li {
            padding: 10px;
        }

        #navbar li a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        #navbar li a:hover {
            background-color: #555;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="navbar">
        <ul>
            <li><a href="about.php">About Us</a></li>
            <li><a href="account_creation.php">Create Account</a></li>
            <li><a href="#section3">Employee Portal</a></li>
        </ul>
    </div>

    <div id="content">
        <h1>Welcome to Our Website</h1>
        <p>This is the main content of your page. You can add more sections and content here.</p>

        <section id="section1">
            <h2>Section 1</h2>
            <p>This is the content of Section 1.</p>
        </section>

        <section id="section2">
            <h2>Section 2</h2>
            <p>This is the content of Section 2.</p>
        </section>

        <section id="section3">
            <h2>Section 3</h2>
            <p>This is the content of Section 3.</p>
        </section>
    </div>
</body>
</html>


