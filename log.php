<?php 
session_start();
include "configue.php"; 

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    //verifie email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connexion, $sql);//demande de recherche
// $var = $connexion->prepare($sql);
// $var->execute();


    if($result && mysqli_num_rows($result) > 0){ //calcule lensemble des recherche

        $user = mysqli_fetch_assoc($result);

        // verify password
        if(password_verify($password, $user["password"]) && $user["role"]=="user" ){
            $_SESSION['email'] = $email; 
           header("Location: home.php");
            exit();
        } elseif(password_verify($password, $user["password"]) && $user["role"]=="admin" ){
            $_SESSION['email'] = $email; 
           header("Location: admin.php");
            exit();
        }
        else {
            echo "<p style='color:red;text-align:center;'>Password error!</p>";
        }

    } else {
        echo "<p style='color:red;text-align:center;'>Email does not exist!</p>";
    }
}
?>


<div class="container">
    <h2>Login</h2>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
   
      <p style="text-align:center; margin-top:10px;">
        Don't have an account? 
        <a href="register.php" style="color:#4A90E2; text-decoration:none;">Register here</a>
    </p>
     </form>
</div>


    <style>body {
    margin: 0;
    padding: 0;
    background: #f0f2f5;
    font-family: Arial, sans-serif;
}

.container {
    width: 350px;
    background: white;
    padding: 25px;
    border-radius: 10px;
    margin: 80px auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 7px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
}

button {
    width: 100%;
    padding: 10px;
    background: #4A90E2;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background: #357ABD;
}
</style>
 

