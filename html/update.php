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
    <link rel="stylesheet" href="../css/canteenhomepage.css">
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

    <div class="body">
        <div class="sidebar">
                <div class="header">Rassasy<br></div>
                <u>
                    <?php
                    session_start();
                    echo "Hey, " . $_SESSION['username'];
                    ?> </u>
                <hr>
                <a href="canteenhomepage.php">Pending Orders</a>
                <a href="allorder.php">All Orders</a>
                <a href="menu.php">Menu</a>
                <a href="update.php">Update</a> 
                <a href="../php/logout.php">Logout</a>
        </div>
        <div class="update"> Update the availabilty of food items in your menu: 
        <div class="menu">
            <div id="menutablediv">

                <table id="menutable" border="1">
                    <thead>
                        <tr>
                            <td>S. No.</td>
                            <td>Item No</td>
                            <td>Item Name</td>
                            <td>Availabilty</td>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        include('conn.php');
                        session_start();
                        $canteenname = $_SESSION['username'];
                        $id = $_SESSION['id'];

                        $sql = "select * from menu_$canteenname; ";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){

                            while($r=$result->fetch_assoc()){
                                echo " <tr class='table_entry'>
                                <td class='table_data' id='itemid'>$r[id]</td>
                                <td class='table_data'>$r[itemno]</td>
                                <td class='table_data'>$r[itemname]</td>
                                <td><input type='toggle' id='updatebutton' value='availability' /></td>
                                </tr> "; }

                        ?>                        
                    </tbody>
                </table>
            </div>       
        </div>
    </div>
</div>
<script>
    /* 1.check for on off of toggle button. update availability acc
    2.update availabilty to 1 on every successful logout of canteen
    3. add row in table
    4. add canteen on off in table */


$("#updatebutton").click(function(event) {
            var itemid = $("#itemid").val();
            
            $.ajax({
                type: "post",
                url: "../php/updatedb.php",
                data: {
                    'itemid' : id 
                },
                success: function(response) {
                    if (response==true) {
                        alert("updated");
                    } else {
                        alert("Connection Error");
                    }
                }
            });
        });

    </script>

</body>

</html>
