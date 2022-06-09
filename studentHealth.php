<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/main.css" />
    <?php require_once 'process.php';?>
    <title>West Ham United University</title>
</head>

<body>


    <div class="sticky">
        <div class="bar_name">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">West Ham
            United University
        </div>
        <div class="bar_menu">
            <a href="Home.html"><button class="button shadow1 button2">Home</button></a>
            <a href="About.html"><button class="button shadow1 button2">About Us</button></a>
            <a href="Gallery.html"><button class="button shadow1 button2">Gallery</button></a>
            <a href="Contact.html"><button class="button shadow1 button2">Contact Us</button><a>
        </div>
        <div class="dropdown login">
            <button class="button shadow button2">More <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="Courses.php">Courses</a>
                <a href="register.php">Logout</a>
            </div>
        </div>
    </div>
    <div>
        <details>
            <summary>Health and Social Care</summary>
            <div class="content">

                <?php 
	$mysqli=new mysqli('localhost','root','','reg') or die (mysqli_error($mysqli));
  $result= $mysqli-> query("SELECT * FROM courses WHERE course='Health and Social Care'") or die ($mysqli->error);
  //pre_r($result);
  ?>
                <div style="width:1000px" class="data-box1 ">
                    <table class="databoxx">
                        <thead>
                            <tr>
                                <th>Module</th>
                            </tr>
                        </thead>
                        <?php 
			while ($row1 = $result->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $row1['module'];?></td>
                        </tr>
                        <?php endwhile;?>
                    </table>
                </div>



            </div>
        </details>
    </div>