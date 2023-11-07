<!DOCTYPE html>
<html>
<head>
    <title>Refund Ticket</title>
    <style>
        body {
            background-color: #cff5ff;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #036;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #036;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #036;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #036;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #003;
        }
    </style>
</head>
<body>
    <h1>Refund Ticket</h1>
    
    <form action="refund_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern="[a-zA-Z0-9]+" required><br><br>

        <label for="flight_id">Flight ID:</label>
        <input type="text" id="flight_id" name="flight_id" pattern="[a-zA-Z0-9]+" required><br><br>

        <input type="submit" value="Refund">
    </form>
</body>
</html>
