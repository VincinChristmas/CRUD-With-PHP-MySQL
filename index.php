<?php 
   require('database.php');
   initMigration($pdo);
   ?>

   <html>
    <head>
        <title>Simple CRUD</title>
    </head>
    <body>
        <a href="create.php?show=all">Create Users</a>
        <a href="read.php?show=all">Show All Users</a>

    </body>
    </html>