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
    .dropdown-content1 {}

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
<div id="mySidebar" class="sidebar" style="position:relative;">
 <span class="span" style="position:absolute;top:-0.5vw;left:210px;font-size:3vw;color:#FE6F27;cursor:pointer;" onclick="closeNav()" >x</span>
 <a href="factime.php" class="time">Time Table</a>
        <a href="faclearn.php" class="learn">Learning Material</a>
        <a href="faclearnsee.php" class="learn">Check Learning Material</a>
        <a href="facatt.php" class="">Attendance</a>
  
</div>

<div id="main">
    <button class="openbtn rt" onclick="openNav()" style="position:fixed;">☰ Admin Panel</button>

    <?php
  } else {
    echo "<script>window.open('../faclogin.php','_self')</script>";
  }
    ?>



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
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('studentTableBody').getElementsByTagName('tr');

        searchInput.addEventListener('input', function() {
          const searchTerm = searchInput.value.toLowerCase();

          for (let i = 0; i < tableBody.length; i++) {
            const row = tableBody[i];
            let found = false;
            for (let j = 0; j < row.cells.length; j++) {
              const cellValue = row.cells[j].textContent.toLowerCase();
              if (cellValue.includes(searchTerm)) {
                found = true;
                break;
              }
            }
            row.style.display = found ? '' : 'none';

          }
        });
      });
    </script>

</body>

</html>