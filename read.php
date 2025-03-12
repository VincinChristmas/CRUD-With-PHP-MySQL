<?php 
   require('database.php');
   //create new user
   
   if($_GET["show"] == "all") {
    try{
        $statement = $pdo->prepare(
            'SELECT * FROM users;'
        );
        $statement->execute();
        echo "Read from table users</br>";
        $results = $statement->fetchAll(PDO::FETCH_OBJ); 
        
    } catch(PDOException $e){
        echo "<h4 style = 'color:red;'>".$e -> getMessage()."</h4>";
   }
   } else if($_GET["show"] == "one" && isset($_GET["id"])) { 
    $id = $_GET["id"];
    try{
        $statement = $pdo->prepare(
            'SELECT * FROM users where id = :id;'
        );
        $statement->execute(["id" => $id]);
        echo "Read from table users</br>";
        $results = $statement->fetchAll(PDO::FETCH_OBJ); 
        
    } catch(PDOException $e){
        echo "<h4 style = 'color:red;'>".$e -> getMessage()."</h4>";
   }
    
    

   }
   ?>

   <html>
    <head>
        <title>Simple CRUD</title>
    </head>
    <body>
        <table>
            <tr>
                <th>id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>age</th>
                <th>edit</th>
                <th>delete</th>
            </tr>    
       <?php foreach($results as $user) { ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->first_name; ?></td>
            <td><?php echo $user->last_name; ?></td>
            <td><?php echo $user->age; ?></td>
            <td><a href="/update.php?id=<?php echo $user->id; ?>">edit</a></td>
            <td><a href="/delete.php?id=<?php echo $user->id; ?>" onclick="confirm()">delete</a></td>
        
       </tr>

        <?php } ?>

       
    </body>
    </html>