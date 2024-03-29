<?php
session_start();


?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
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
            margin-left: 10px;
            position: fixed;
            top: 10px;
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
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

          .st {
            color: white;
        }

        .logout {
            position: fixed;
            top: 20px;
            right: 10px;
        }

        .student {
            width: 100%;
            height: 100%;
            padding: 0 15vw;
            margin-top: 3vw;
            /* display:none; */



        }

        .heading {
            width: 100%;
            height: 100%;
            text-align: center;
            color: black;
            font-weight: 900;
            text-decoration: underline;


        }

        .tabless {
            margin-top: 5vw;
        }

        table {
            color: rgb(131, 131, 131);
        }

        .dropdown-content,
        .dropdown-content1 {
            display: none;
        }

        i {
            font-size: 30px;
        }

        .display_student {
            margin-top: 5vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        tr,
        td,
        th {
            border: 2px solid black;




        }

        .se {
            display: flex;
            margin-bottom: 5vw;
            gap: 2vw;

        }
        .logout {
            position: fixed;
            top: 1vw;
            right: 10px;
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
    if (isset($_POST['logout'])) {
        session_unset();
        echo "<script>window.open('../faclogin.php','_self')</script>";
    }


    ?>
    <?php
    if ($_SESSION['facultyid'] == true) {
    ?>


<div class="overlay" style="position:fixed;"></div>
<div id="mySidebar" class="sidebar">
 <span class="span" style="background-color:none;font-size:2vw; position:fixed;top:10px;color:white;left:220px;cursor:pointer;color:#FE6F27" onclick="closeNav()" >x</span>
 <a href="factime.php" class="time" >Time Table</a>
        <a href="faclearn.php" class="learn">Learning Material</a>
    
        <a href="#" style="color:white;">Attendance</a>
</div>

<div id="main">
    <button class="openbtn rt" onclick="openNav()" style="position:fixed;">☰ Admin Panel</button>




            <div class="student">
                <div class="heading">
                    <div class="stu">
                        <h1>Students</h1>
                    </div>

                </div>

                <div class="display_student">
                    <div class="container mt-5">
                        <!-- <input type="text" class="form-control mb-3" id="searchInput" placeholder="Search..."> -->
                        <div class="se">
                            <form action="" method="post" enctype="multipart/form-data">

                                <label for="">Course</label>
                                <select name="course" id="">
                                    <option value="BCA">BCA</option>
                                    <option value="BCOM">BCOM</option>
                                    <option value="BBA">BBA</option>
                                </select>
                                <label for="">Semester</label>
                                <select name="sem" id="">
                                    <option value="Sem1">Sem1</option>
                                    <option value="Sem2">Sem2</option>
                                    <option value="Sem3">Sem3</option>
                                    <option value="Sem4">Sem4</option>
                                    <option value="Sem5">Sem5</option>
                                    <option value="Sem6">Sem6</option>

                                </select>
                                <label for="">Section</label>
                                <select name="section" id="">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <input type="submit" name="search" value="search" class="btn btn-primary">


                                <div>
                                    Subject Name:<input type="text" name="subject" placeholder="enter name of subject"></div>
                                Date: <input type="date" name="date">
                        </div>


                        <div class="">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Section</th>
                                        <th>Course</th>

                                        <th>Semester</th>

                                        <th>Update</th>

                                    </tr>
                                </thead>
                                <tbody id="studentTableBody">
                                    <?php
                                    require('conn.php');
                                    if (isset($_POST['search'])) {
                                        $course = $_POST['course'];
                                        $semester = $_POST['sem'];
                                        $sec = $_POST['section'];

                                        $sel = "SELECT * FROM students WHERE course='$course' AND semester='$semester' AND sec='$sec'";
                                        $result = mysqli_query($con, $sel);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <tr>
                                                <td><input style="width:100px" type="text" value="<?php echo $row['student_id'] ?>" name="id_<?php echo $row['student_id']; ?>" readonly></td>
                                                <td><input style="width:230px" type="text" value="<?php echo $row['name'] ?>" name="name_<?php echo $row['student_id']; ?>" readonly></td>
                                                <td><input style="width:30px" type="text" value="<?php echo $row['sec'] ?>" name="sec_<?php echo $row['student_id']; ?>" readonly></td>
                                                <td><input style="width:50px" type="text" value="<?php echo $row['course'] ?>" name="course_<?php echo $row['student_id']; ?>" readonly></td>
                                                <td><input style="width:50px" type="text" value="<?php echo $row['semester'] ?>" name="semester_<?php echo $row['student_id']; ?>" readonly></td>
                                                <td>
                                                    <input type="checkbox" name="p_<?php echo $row['student_id']; ?>" value="p"> P
                                                    <input type="checkbox" name="p_<?php echo $row['student_id']; ?>" value="A"> A
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <input type="submit" name="submit" value="Attendance Submit" class="btn btn-primary">

                            <?php
                            if (isset($_POST['submit'])) {
                                require('conn.php');
                                foreach ($_POST as $key => $value) {
                                    if (strpos($key, 'id_') === 0) {
                                        $student_id = substr($key, 3); // Extract student ID from the input name
                                        $name = $_POST["name_$student_id"];
                                        $sec = $_POST["sec_$student_id"];
                                        $course = $_POST["course_$student_id"];
                                        $semester = $_POST["semester_$student_id"];
                                        $status = $_POST["p_$student_id"];
                                        $sub = $_POST['subject'];
                                        $date = $_POST['date'];
                                        $sql = "INSERT INTO attendence VALUES('$student_id', '$name', '$sec', '$course', '$semester', '$status','$sub','$date')";
                                        $result = mysqli_query($con, $sql);
                                        if ($result) {
                                            echo "Record inserted successfully";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                        }
                                    }
                                }
                            }
                            ?>

                        <?php
                    } else {
                        echo "<script>window.open('../faclogin.php','_self')</script>";
                    }
                        ?>

                        </form>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
                        <script src="scr.js"></script>

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
                            function openNav() {
                                document.getElementById("mySidebar").style.width = "250px";
                                document.getElementById("main").style.marginLeft = "250px";
                            }

                            // Function to close the sidebar
                            function closeNav() {
                                document.getElementById("mySidebar").style.width = "0";
                                document.getElementById("main").style.marginLeft = "0";
                            }

                            //  document.addEventListener('DOMContentLoaded', function () {
                            //     const searchInput = document.getElementById('searchInput');
                            //     const tableBody = document.getElementById('studentTableBody').getElementsByTagName('tr');

                            //     searchInput.addEventListener('input', function () {
                            //         const searchTerm = searchInput.value.toLowerCase();

                            //         for (let i = 0; i < tableBody.length; i++) {
                            //             const row = tableBody[i];
                            //             let found = false;
                            //             for (let j = 0; j < row.cells.length; j++) {
                            //                 const cellValue = row.cells[j].textContent.toLowerCase();
                            //                 if (cellValue.includes(searchTerm)) {
                            //                     found = true;
                            //                     break;
                            //                 }
                            //             }
                            //             row.style.display = found ? '' : 'none';

                            //         }
                            //     });
                            // });
                        </script>

</body>

</html>