


<html>
    <title>
        Book Management System
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        /* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>

    <body>
        <nav class="navbar fixed-top navbar-light bg-light">
            
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="admin.php" >Book List</a>
            <a href="addbook.html">Add New Books</a>
            <a href="#">Books on Rent</a>
            <a href="#">Requests</a>
          </div>
          
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()"><img src="m.jpg" height="30px" width="40px"></span>
        <a class="navbar-brand" href="#">Book Management System</a>
         <button class="btn btn-sm btn-outline-secondary" type="button">Log Out</button>
        </nav>
        <br><br> <br>
        <h2 style="padding-left: 80px;">Add New Book...</h2>

        <br><br>
        <u><h3 align="center">Register New Book</h3>
        </u>
   <br><br>
   <?php 
    if(isset($_POST['submit']))
      { $bname=$_GET['bname'];
        $bauthor=$_GET['bauthor'];
        $btype=$_GET['btype'];


        $conn = new mysqli('127.0.0.1','root','','BMS');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        
            $sql="INSERT INTO book (bname,bauthor,btype) VALUES ('$bname','$bauthor','$btype')";   
            $conn->query($sql); 
            $sql = "SELECT bid, bname,bauthor,copies FROM Book where bname='$bname' and bauthor='$bauthor'";
            $result = $conn->query($sql);
            

            echo"<br><h4 align=\"center\">Your Book Has been successfully Registered...</h4>";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<br><h5 align=\"center\">Generated id  :  " . $row["bid"]. " <br> <h5 align=\"center\">Book Name : " . $row["bname"]. "<br><h5 align=\"center\"> Book Author :  " . $row["bauthor"]. "<br><h5 align=\"center\"> Available Copies :  " . $row["copies"];
                }
            } else {
                echo "0 results";
            }
            
        

          }
    ?>



    </body>
</html>
<script>
    function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>