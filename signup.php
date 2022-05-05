<?php
include_once "header.html";?>
<section> 
       <link rel="stylesheet" href="signup.css">
       <center>
    <div class="container">
        <h1>sign up page</h1>
    <form action="includes/signup.inc.php" method="post">
    <input type="text" name="firstname" placeholder="firstname">
    <input type="text" name="surname" placeholder="surname">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="pwd" placeholder="password">
    <input type="password" name="confirm_pwd" placeholder="confirm password">
<button type="submit" name="submit">submit</button>    
</form>
    </div>
    </center>
</section>
