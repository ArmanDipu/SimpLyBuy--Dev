<?php include('SimplyBuyServer.php');  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SimplyBuy</title>

    <link rel="stylesheet" href="StyleSheet.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <div class="Body">
        <div class="Container">
            <div class="navbar">
                <div class="logo">
                    <img src="Images/Logo.png" width="300px">
                </div>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">Categories</a></li>
                        <li><a href="cart.php?user=<?php
                                if (isset($_SESSION["username"])){
                                    echo $_SESSION["username"];
                                }
                            ?>
                        ">My Cart</a></li>
                        <li><a href="">About Us</a></li>
                        <?php if (isset($_SESSION["username"])) : ?>
                            <li><a href="" style="color: blue">
                                    <?php echo $_SESSION["username"]; ?></a>
                            </li>
                            <li><a href="home.php?logout='1'style=" color">Log Out</a></li>
                        <?php else : ?>
                            <li><a href="Login.php">Login</a></li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>


        <div class="SmallContainer">


        <div class="row row-2">
            <h2>All Products</h2>
            <select>
                <option>Default Shorting</option>
                <option>Short by price</option>
                <option>Short by popularity</option>
                <option>Short by rating</option>
                <option>Short by sale</option>
            </select>
        </div>


        <?php 

            $dbCart = mysqli_connect('localhost','root', '', 'simplybuy');
            if(mysqli_connect_errno()){
                echo 'could not connect to server.';
            }

            $sql = "SELECT * From product;" ;
            $result = mysqli_query($dbCart,$sql) or die("Error in $sql");
            $resultCheck = mysqli_num_rows($result);
        ?>

            <div class="ThreeColumnRow">

                <?php 

                $count = 1;

                if($resultCheck>0):
                while ($row = mysqli_fetch_assoc($result)):
                ?>
                <div class="ThreeColumn">
                    <?php echo "<img src = '{$row['img_dir']}'>"; ?>
                    <h4>
                        <?php echo $row['ProductName'] ;?>            
                    </h4>
                    <div class="rating">
                        <?php
                            $rating = $row['Rating'];
                        ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <?php
                            
                            if($rating == 5):
                        ?>
                        <i class="fa fa-star"></i>
                        <?php
                            elseif($rating == 4.5):
                        ?>
                        <i class="fa fa-star-half-o"></i>
                        <?php
                            else :
                        ?>
                        <i class="fa fa-star-o"></i>
                        <?php
                            endif;
                        ?>
                    </div>
                    <p><?php echo 'Price: '.$row['Price'] ;?> </p>
                </div>

                <?php
                        endwhile;
                    endif;
                ?>

            </div>
            
            <div class="page-btn">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>&#8594;</span>
            </div>

        </div>
    </div>


    <!-- Footer -->

    <div class="Footer">
        <div class="Container">
            <div class="Row">
                <div class="FooterColumn">
                    <h3> Download Related Apps </h3>
                    <p>Download Apps for Android and ios for Mobile Phone</p>
                </div>
                <div class="FooterColumn">
                    <h3> Usefull Links</h3>
                    <ul>
                        <li>Discount Vaucher</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affliate</li>
                    </ul>
                </div>
                <div class="FooterColumn">
                    <h3> Support Us</h3>
                    <ul>
                        <li>FaceBook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p style="text-align: center;">Copyright &copy; 2021 - SimpLyBuy</p>
        </div>
    </div>

</body>

</html>