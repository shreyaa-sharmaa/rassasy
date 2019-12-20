<?php
session_start();
if (!(isset($_SESSION['username'])))
{
    header("Location: ../html/login.html");
}
?>

<html>
  <head>
    <title>
      Rassasy
    </title>
    <link rel="stylesheet" href="../css/userhomepage.css" />
  </head>

  <body>
  
    <div class="user-container">
      <div class="body">
        <div class="sidebar">
          <div class="header">Rassasy<br /></div>
          <a href="userhomepage.php">Ongoing Orders</a>
          <a href="ordernow.php">Order Now</a>
          <a href="pastorder.php">Past Orders</a>
          <a href="userprofile.php">Profile</a>
          <a href="../php/logout.php">Logout</a>
        </div>
        <div class="orders">
          <div class="content">
            EDIT YOUR PROFILE:
            <br>
            <form method="POST" class="form">
              <div>Password: <input type="password" name="password" /></div>
              <div>Bhawan:
              <select class="bhawan" id="bhawan">
                <option value="1">one</option>
                <option value="2">two</option>
                <option value="3">three</option>
                <option value="4">four</option> </select>
              </div>
              <div>Room no: <input type="text" name="roomno" /></div>
              <div>Email Address: <input type="email" name="email" /></div>
              <div><br></div>
              <div><input type="submit" value="Submit Changes" formaction="" /></div>
            </form>
            <button class="deleteaccount">Delete Account</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
