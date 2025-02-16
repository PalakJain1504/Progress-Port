<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Port</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS-folder/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 
</head>
<body>
    <nav>
        <div class="logo-image">
            <img src="images/logo.svg" alt="">
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><button >Log Out</button></li>
        </ul>
    </nav>

    <?php 
    include 'php-files/index.php'; 
    // Fetch data from the database
    $users = app_db()->select('SELECT * FROM users');
    ?>

    <!-- <div class="container">
        <h2>Users List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Row ID</th>
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Title</th>
                    <th>Domain</th>
                    <th>Faculty Mentor</th>
                    <th>Industry Mentor</th>
                    <th>PPT</th>
                    <th>Presentation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the fetched users and display them in rows
                // if ($users) {
                //     foreach ($users as $user) {
                //         echo "<tr>";
                //         echo "<td>{$user['row_id']}</td>";
                //         echo "<td>{$user['roll']}</td>";
                //         echo "<td>{$user['name']}</td>";
                //         echo "<td>{$user['email']}</td>";
                //         echo "<td>{$user['phone']}</td>";
                //         echo "<td>{$user['title']}</td>";
                //         echo "<td>{$user['domain']}</td>";
                //         echo "<td>{$user['fmentor']}</td>";
                //         echo "<td>{$user['indmentor']}</td>";
                //         echo "<td>{$user['ppt']}</td>";
                //         echo "<td>{$user['presentation']}</td>";
                //         echo "</tr>";
                //     }
                // } else {
                //     echo "<tr><td colspan='11'>No users found</td></tr>";
                // }
                // ?>
            </tbody>
        </table>
    </div> 
     -->
	



    






    <script src="script.js"></script>
</body>
</html>