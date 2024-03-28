<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF File Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        body {
  font-family: "Lato", sans-serif;
  width: 100%;
  height: 100vh;
  

}

.sidebar {
  height: 100%;
  width: 0px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;

  padding-top: 5vw;
 
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 150px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
  margin-left:10px;
  position: fixed;
  top:10px;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
  
  
}


/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

        .custom-file-label::after {
            content: "Choose";
        }

        .btn-primary {
            margin-top: 10px;
        }

        /* Custom styles */
        .container {
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .logout{
      position:fixed;
      top:20px;
      right:10px;
    }
    .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #2F2F2F;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 5vw;
            color:black;
          
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            display: block;
            transition: 0.3s;
            color:#FE6F27;
        }

        .sidebar a:hover {
           color:#2F2F2F;
           background-color:#FE6F27;
           border-radius:0 13px 0 30px; 
           transition:all .5s ease;
           transform:translateY(-2px);
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 150px;
            color:#FE6F27;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color:#FE6F27;
            color: white;
            padding: 10px 15px;
            border: none;
           
            position: fixed;
            top: 10px;
            z-index: 999999;
        }

        .openbtn:hover {
           
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
            margin-left: 250px;
        }

        .card {
            margin: 20px;
        }
        a{
            text-decoration:none;
        }
        .dropdown-content,.dropdown-content1{
            display:none;
        }
        .logout{
            position:fixed;
            top:.5vw;
            right:10px;
        }
        .rt{
            position:absolute;
            left:10px;
            background color:#2F2F2F;
        }
        .overlay{
            width:100%;
            height:10vh;
            background-color:#2F2F2F;
            position:absolute;
            left:0;
            top:-10%;
            z-index:-9;
        }
     
    </style>
</head>
<body>
<div class="logout">
<form action="" method="post">
  <button class="logout btn btn-danger" name="logout">Logout</button>
  </form>
</div>
<?php

if(isset($_POST['logout'])){
    session_unset();
    echo "<script>window.open('login.php','_self')</script>";
}
?>
    <?php
    if($_SESSION['email']==true)
    {
        ?>
      <div class="overlay"></div>
<div id="mySidebar" class="sidebar">
 <span class="span" style="background-color:none;font-size:2vw; position:absolute;top : 10px;color:white;left:220px;cursor:pointer;color:#FE6F27" onclick="closeNav()" >x</span>
    <a href="home.php" class="time" >Home</a>
    <a href="time.php" class="time" >Time Table</a>
    <a href="#" class="learn" style="color:white">Learning Material</a>
    <a href="fees.php" class="fees">Fees</a>
    <a href="faculty.php" class="fac">Faculty</a>
    <div class="dropdown">
        <div class="dropdown-content">
            <a href="#" class="add">Add Faculty</a>
            <a href="#" class="check">Check Faculty</a>
        </div>
    </div>
    <a href="students.php" class="st">Students</a>
    <div class="dropdown">
        <div class="dropdown-content1">
            <a href="#" class="addstud" data-target="#addStudentModal" data-toggle="modal">Add Student</a>
            <a href="#check" class="checkstud">Check Students</a>
        </div>
    </div>
</div>

<div id="main">
    <button class="openbtn rt" onclick="openNav()">☰ Admin Panel</button>

</div>
        
</div>
<div class="wrapper" style="overflow:hidden">
<div class="container subdiv">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Learning Material</h2>
            <form action="" method="post" enctype="multipart/form-data">
            <?php

$query = "SELECT DISTINCT course FROM students";

$result = mysqli_query(mysqli_connect('localhost','root','','vtpfinal'), $query);

if (!$result) {
    die("Database query failed.");
}
?>

<div class="form-group">
    <label for="courseSelect">Select Course:</label>
    <select class="form-control" id="courseSelect" name="course">
        <?php
      
        while ($row = mysqli_fetch_assoc($result)) {
            $course = $row['course'];
            echo "<option value='$course'>$course</option>";
        }
        ?>
    </select>
    <div class="maindiv">



                <div class="form-group">
                    <label for="semesterSelect">Select Semester:</label>
                    <select class="form-control" id="semesterSelect" name="semester">
                        <option value="">SELECT SEMESTER</option>
                        <option value="Sem1">Sem1</option>
                        <option value="Sem2">Sem2</option>
                        <option value="Sem3">Sem3</option>
                        <option value="Sem4">Sem4</option>
                        <option value="Sem5">Sem5</option>
                        <option value="Sem6">Sem6</option>
                     
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" id="fileInput" name="file" class="custom-file-input">
                        <label class="custom-file-label" for="fileInput">Choose PDF file</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fileName" name="name" placeholder="Enter File Name">
                </div>
                <input type="submit" value="Upload" name="upload" class="btn btn-primary btn-block">
                <button class="btn btn-block btn-success" style="margin-top:4px;"><a href="learnsee.php" style="color:white;text-decoration:none;">Check Uploaded Materials</a></button>
            </form>
           
        </div>
    </div>
</div>
</div>
</div>
    <?php
        require('conn.php');
        if(isset($_POST['upload'])){
            $file_name = $_FILES['file']['name'];
            $file_temp = $_FILES['file']['tmp_name'];
            $folder = "imge/".$file_name;
            move_uploaded_file($file_temp, $folder);

            $name = $_POST['name'];
            $course= $_POST['course'];
            $semester= $_POST['semester'];

            $sql = "INSERT INTO material (name, file,course,sem) VALUES ('$name', '$folder','$course','$semester')";
            $res = mysqli_query($con, $sql);

            if($res){
                echo "<script>alert('Data inserted.');</script>";
                echo "<script>window.open('learnsee.php', '_self');</script>";
            }
        }
    ?>
    <?php
    }else{
        session_unset();
        header('location:login.php');
    }
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <script src="scr.js">
    </script>
    <script>
      var t1=gsap.timeline();
t1.from('.sidebar',{
    x:-4000,
    opacity:1,
    duration:.6
})
t1.from('.openbtn',{
    y:-100,
   
})
    t1.to('.overlay',{
        y:"65"
    })
    t1.from('.logout',{
        y:"-45"
    })
    t1.from('.gsa',{
        y:190,
        stagger:.2
    })

    t1.from('.timetable',{
        y:-800,
       
    })
    t1.from('.subdiv',{
y:400,
ease: "power4.easeIn"
    })
    </script>
</body>
</html>
