<?php 
require('includes/Dbconfig.php');
include('includes/session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Intelligent Dietician System - Smart Diet Recommendations</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <meta name="description" content="Transform your lifestyle with personalized diet recommendations. Get custom meal plans based on your health profile and goals."/>
	<link href="css/main.css" rel='stylesheet' type='text/css'/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
</head>
<body>

    <div class="header-section nv">
        <div class="mob-div">
            <div class="m-inner-div">
                <div class="left">
                     <li><a href="#" onclick="openNav()"><img src="images/menu-bar.png"/></a></li>
                     <li><a href="#"><img src="images/icon-logo.png" width="32px" height="32px"/></a></li>
                </div>
                <div class="right">
                    <li><a href="#">join us</a></li>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
        <div class="outer-div">
            <div class="inner-div">
                <div class="n-brand">
                    <div class="n-logo">
                        <a href="index.php"><img src="images/IDS-logo.png" class="nv-logo" alt="IDS-logo"/></a>
                    </div>
                </div>
                <div class="n-menu">
                    <div class="n-nav" id="mySidenav">
                        <ul>
                            <li><img src="images/logo_new_icon.png" class="sm-logo"></li>
                            <!-- <li><a href="menu.php">menu</a></li> -->
                            <li><a href="diet-plan.php">diet recommendation</a></li>
                            <li><a href="visit-us.php">visit us</a></li>
                            <li><a href="join-us.php" class="ext-join">join us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    <div class="welcome-section">
        <div class="content-wrapper-n2">
            <div class="hero-section">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 n2-xs-6">
                    <div class="welcome-dish-container">
                        <div class="green-bg-box">
                            <img src="images/n2-green-box-dish.png" alt="Image"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 n2-xs-6">
                    <div class="welcome-text-container">
                        <span>welcome to</span>
                        <h2>Intelligent Dietician System
                        </h2>
                        <div class="green-line"></div>
                        <p class="intro-para">Your personalized diet and nutrition platform</p>
                        <p class="intro-para">Get customized meal plans based on your health profile</p>
                        <a href="diet-plan.php">Start Your Journey</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="about-section">
        <div class="content-wrapper-n3">
                <div class="col-md-7 col-sm-6">
                    <div class="mini-title">about us</div>
                    <h2 class="h2-heading">Smart Nutrition Planning</h2>
                    <div class="n3-line"></div>
                    <p class="intro-para">We combine nutrition science with artificial intelligence to create personalized diet plans that work for you.</p>
                    <p class="sec-para">Our advanced system analyzes your health metrics, lifestyle, and goals to provide tailored meal recommendations and dietary guidance. We help you achieve your health goals through smart, sustainable nutrition planning.</p>
                    <div class="features">
                        <div class="feature-item">✓ Personalized Meal Plans</div>
                        <div class="feature-item">✓ Scientific Nutrition Analysis</div>
                        <div class="feature-item">✓ Progress Tracking</div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="grey-circle"></div>
                </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="location-section">
        <div class="content-wrapper n3-container">
            <div class="col-md-6 col-sm-6 col-xs-6 loc-col1">
                <div class="loc-img">
                    <img src="images/n4-location.jpeg" height="320px"/>
                </div>
                <div class="loc-name">
                    <div class="lc1 lc11">&</div>
                    <div class="lc1 lc12">
                        <h5>virtual consultations</h5>
                        <p>Available Worldwide</p>
                    </div>
                    <div class="clear-crowd"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 loc-col2">
                <div class="mini-title">our service</div>
                <h2 class="h2-heading">Online Support</h2>
                <div class="n4-line"></div>
                <p class="intro-para">Get personalized nutrition guidance from anywhere in the world. Our virtual consultation service connects you with expert nutritionists who can help customize your diet plan and provide ongoing support.</p>
                <a href="join-us.php">schedule consultation</a>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="test-section">
        <div class="n5-container">
            <div class="test-image respo-img"><img src="images/diet-w.png" height="550px"></div>
            <div class="test-respo respo-img">
                <div class="mini-title">success stories</div>
                <h2>Transforming Lives<br>
                Through Smart<br>
                Nutrition</h2>
                <div class="n5-line"></div>
                <p class="intro-para">Our personalized diet recommendations have helped thousands achieve their health and fitness goals.</p>
                <p class="sec-para">"The personalized meal plans and nutrition guidance from IDS helped me achieve my ideal weight. The recommendations were practical and easy to follow in my daily routine."</p>
                <p class="user-para"><span>Tamara</span> <img src="images/n5-starrate.png" width="90px" height="16px"/></p>
                <a href="join-us.php">start your journey</a>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="menu-section">
        <div class="content-wrapper n6-container">
            <div class="col-md-6 col-sm-6 col-xs-6 menu-col1">
                <div class="menu-sub-col">
                    <div class="mini-title">healthy recipes</div>
                    <h2 class="h2-heading">Nutritious<br><span>Meals</span></h2>
                    <p class="intro-para">Discover our collection of healthy, balanced recipes designed to support your nutrition goals while satisfying your taste buds.</p>
                    <a href="menu.php">view recipes</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 menu-col2"><img src="images/n6-menu.png"></div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="ing-section">
        <div class="n9-container content-wrapper">
            <div class="sec1">
                <div class="mini-title">our approach</div>
                <h2 class="h2-heading">Scientific Nutrition Planning</h2>
                <hr class="hr" align="center">
                <p class="intro-para">We use a comprehensive approach to create nutrition plans that are personalized, sustainable, and based on scientific research.</p>
            </div>
            <div class="sec2">
                <div class="col-md-4 col-sm-4">
                    <div><img src="images/n9-ing-1.png" width="230px" height="230px"/></div>
                    <div class="mini-title">analyze</div>
                    <h2 class="h2-heading">Health<br>Metrics</h2>
                    <p class="intro-para">We analyze your BMI, activity level, and health goals to create a baseline for your nutrition plan.</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div><img src="images/n9-ing2.png"  width="230px" height="230px"/></div>
                    <div class="mini-title">customize</div>
                    <h2 class="h2-heading">Personal<br>Plans</h2>
                    <p class="intro-para">Get meal recommendations tailored to your dietary preferences and nutritional needs.</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div><img src="images/n9-ing3.png" width="230px" height="230px"/></div>
                    <div class="mini-title">track</div>
                    <h2 class="h2-heading">Progress<br>Monitoring</h2>
                    <p class="intro-para">Monitor your progress and receive adjustments to your plan based on your results.</p>
                </div>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
      <div class="recommend-section">
        <div class="n10-container content-wrapper">
            <div class="sec1">
                <div class="mini-title">recommended meals</div>
                <h2 class="h2-heading">Healthy Choices</h2>
                <hr class="hr" align="center">
                <p class="intro-para">Explore our selection of nutritionist-approved meals, designed to provide balanced nutrition while keeping your taste buds satisfied.</p>
            </div>
            <div class="sec2">
                                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend1.jpeg"  alt="Image"/>
                        <h2 class="h2-heading">Vanilla Pot de Almonds Creme</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">DESSERT</span></div>
                        <p class="intro-para">A delightful blend of creamy vanilla pudding and roasted almonds, creating a perfect balance of smooth and crunchy textures.</p>
                        <div class="cal">Calories: 478 <span class="dash">|</span> Rs: 120/-</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend2.jpeg" alt="Image"/>
                        <h2 class="h2-heading">Iced Tea With Fresh Red Berries</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">BEVERAGE</span></div>
                        <p class="intro-para">A refreshing iced tea infused with a medley of fresh red berries, perfect for a hot summer day. A delightful blend of fruity flavors.</p>
                        <div class="cal">Calories: 450 <span class="dash">|</span> Rs: 50/-</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend3.jpeg"  alt="Image"/>
                        <h2 class="h2-heading">Trio of Seasoned Deviled Eggs</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">APPETIZER</span></div>
                        <p class="intro-para">Classic deviled eggs with three unique seasonings, creating a perfect appetizer trio. Each variety offers a distinct and delicious flavor profile.</p>
                        <div class="cal">Calories: 300 <span class="dash">|</span> Rs: 35/-</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend2.jpeg" alt="Image"/>
                        <h2 class="h2-heading">Iced Tea With Fresh Red Berries</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">KOSHER</span></div>
                        <p class="intro-para">Crispy and crunchy on the outside and juicy on the inside, that’s how I would describe this awesome dish. The wings were simply seasoned with grated ginger, salt and pepper and then rolled in potato starch.</p>
                        <div class="cal">Calories: 450 <span class="dash">|</span> Rs: 50/-</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 n10-recomend">
                    <div class=" n10-recepie">
                        <img src="images/n10-recomend3.jpeg"  alt="Image"/>
                        <h2 class="h2-heading">Trio of Seasoned Deviled Eggs</h2>
                        <div style="text-align:left;margin-left:20px;"><span class="dish-type">SPICY</span><span class="dish-type">KOSHER</span><span class="dish-type">VEGAN</span></div>
                        <p class="intro-para">Crispy and crunchy on the outside and juicy on the inside, that’s how I would describe this awesome dish. The wings were simply seasoned with grated ginger, salt and pepper and then rolled in potato starch.</p>
                        <div class="cal">Calories: 300 <span class="dash">|</span> Rs: 35/-</div>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
            <div class="clear-crowd"></div>
        </div>
    </div>
    
    <div class="findus-section">
        <div class="n14-container content-wrapper">
            <center><p>as seen on</p></center>
            <div class="sec2">
                <div class="col-md-4 col-sm-4 col-xs-4 n14-find">
                    <a href="#"><img src="images/n14-findus11.png" width="80%" height="70px"/></a>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 n14-find">
                    <a href="#"><img src="images/n14-findus21.png" width="80%" height="70px"/></a>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 n14-find">
                     <a href="#"><img src="images/n14-findus31.png" width="80%" height="70px"/></a>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <div class="footer-section">
        <div class="n15-container content-wrapper">
            <div class="sec2">
                <div class="col-md-3 col-sm-3 col-xs-3 n15-logo">
                    <div class="f-content">
                        <img src="images/IDS-logo.png" width="150px" height="80px" style="margin-top:60px;" alt="IDS-logo">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 n15-sm-4 n15-time">
                    <div class="f-content">
                        <div class="mini-title">support hours</div>
                        <p class="time">24/7 Online Platform Access<br><br>Nutrition Support:<br>Mon-Fri: 8am-8pm<br>Sat-Sun: 9am-5pm<br><br>Chat Support: 24/7</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 n15-sm-4 n15-social">
                    <div class="f-content">
                        <div class="mini-title">connect with us</div>
                        <p class="email ape"><img src="images/em.png" /> support@ids.com</p>
                        <p class="phone ape"><img src="images/ca.png"/>24/7 Chat Support</p>
                        <p class="address ape"><img src="images/loc.png"/> Available Worldwide<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Virtual Consultations</p>
                        <p class="s-link">
                            <a href="#"><img src="images/fb.png" width="24px" height="24px"/></a>
                            <a href="#"><img src="images/insta.png"  width="24px" height="24px"/></a>
                            <a href="#"><img src="images/li.png" width="24px" height="24px"/></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 n15-sm-4 n15-and">
                    <div class="f-content">
                        <div class="mini-title">mobile app</div>
                        <p class="app-desc">Track your nutrition goals on the go with our mobile app</p>
                        <a href="#"><img src="images/google-play.png" width="180px" height="80px"/></a>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    <center><div class="copyright">© 2025 ids.com - All Rights Reserved.</div></center>
    </div>
    
<script>
function openNav() {
    //document.getElementById("mySidenav").style.width = "250px";
    //document.getElementById("main").style.marginLeft = "250px";
    //document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    //document.getElementById("mySidenav").style.width = "0";
    //document.getElementById("main").style.marginLeft= "0";
    //document.body.style.backgroundColor = "white";
}
</script>
    
</body>
</html>
    