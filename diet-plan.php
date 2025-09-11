<?php 
include('includes/session.php');
require('includes/Dbconfig.php');

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if user has already submitted their information
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM nutrinoz_users_info WHERE info_user_id = '$user_id'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {
    // User has already submitted their information, redirect to diet results
    header("Location: diet-result.php");
    exit();
}

// If user hasn't submitted their information, redirect to profile page
header("Location: user-profile.php");
exit();

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diet plan - IDS</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
</head>
<body>
    
	<?php include ('includes/header.php'); ?>
	
	<div class="p-n1-menu">
        <div class="p-n1-content p-n-d-content">
            <p class="n1-title n-m-title">Diet plan</p>
            <p class="n1-subtitle n-m-subtitle">Choose Your Personalized Diet Plan</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
	
	<div class="p-n2-diet" id="diet-page">
        <div class="p-n1-content p-n-d-content">
		    <div class="diet-p-bar">
<form id="msform" method="POST" action="diet-result.php">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active"><span class="diet-sm-ia">Gender</span></li>
    <li><span class="diet-sm-ia">Physical Activities</span></li>
    <li><span class="diet-sm-ia">Disease</span></li>
    <li><span class="diet-sm-ia">Daily Life</span></li>
    <li><span class="diet-sm-ia">Nutrition type</span></li>
    <li><span class="diet-sm-ia">Measurements</span></li>
  </ul>
  <!-- fieldsets -->
    <fieldset class="fs1 fs">
        <h2 class="fs-title">Choose Your Gender</h2>
        <label><input type="radio" value="male" class="gender" name="gender"/><div class="rad-gender1"><img src="images/diet-m.png" width="200px" height="200px"/></div></label>
        <label><input type="radio" value="female" class="gender" name="gender"/><div class="rad-gender"><img src="images/diet-w.png" width="200px" height="200px"/></div></label><br>
        <input type="button" name="next" class="next action-button next_btn" value="Next" />
    </fieldset>
    <fieldset class="fs2 fs">
        <h2 class="fs-title">Specify Physical Activity</h2>
        <label><input type="radio" value="sedentary" name="physical_activity" class="phy-act" /><div class="check-pa">Little or almost no physical activity</div></label><br>
        <label><input type="radio" value="lightly active" name="physical_activity" class="phy-act"/><div class="check-pa">Exercise/Sports 1-3 times in a week</div></label><br>
        <label><input type="radio" value="moderatetely active" name="physical_activity" class="phy-act"/><div class="check-pa">Exercise/Sports 4-5 times in a week</div></label><br>
        <label><input type="radio" value="very active" name="physical_activity" class="phy-act"/><div class="check-pa">Exercise/Sports 6-7 times in a week</div></label><br>
        <label><input type="radio" value="extra active" name="physical_activity" class="phy-act"/><div class="check-pa">Very hard exercise/sports & physical job or 2x training</div></label><br>
        <input type="button" name="previous" class="previous action-button pre_btn" value="Previous" />
        <input type="button" name="next" class="next action-button next_btn" value="Next" />
    </fieldset>
	<fieldset class="fs4 fs">
        <h2 class="fs-title">Disease</h2>
        <label><input type="radio" value="1" name="meal_number" class="phy-act" /><div class="check-pa">Heart Failure</div></label><br>
        <label><input type="radio" value="2" name="meal_number" class="phy-act" /><div class="check-pa">Diabetes</div></label><br>
        <label><input type="radio" value="3" name="meal_number" class="phy-act" /><div class="check-pa">Obesisy</div></label><br>
        <label><input type="radio" value="4" name="meal_number" class="phy-act" /><div class="check-pa">Hypertension (High Blood Pressure)</div></label><br>
        <label><input type="radio" value="5" name="meal_number" class="phy-act" /><div class="check-pa">Coronary Artery Disease (Heart Disease)</div></label><br>
        <label><input type="radio" value="6" name="meal_number" class="phy-act" /><div class="check-pa">Asthma</div></label><br>
        <input type="button" name="previous" class="previous action-button pre_btn" value="Previous" />
        <input type="button" name="next" class="next action-button next_btn" value="Next" />
    </fieldset>
	<fieldset class="fs5 fs">
        <h2 class="fs-title">Describe About Your Typical Day</h2>
        <label><input type="radio" value="I mostly stay at home" name="daily_life" class="phy-act" /><div class="check-pa">I mostly stay at home</div></label><br>
        <label><input type="radio" value="At office" name="daily_life" class="phy-act" /><div class="check-pa">At office</div></label><br>
        <label><input type="radio" value="I spend most of day on foot" name="daily_life" class="phy-act"/><div class="check-pa">I spend most of day on foot</div></label><br>
        <label><input type="radio" value="Manual Labor" name="daily_life" class="phy-act" /><div class="check-pa">Manual Labor</div></label><br>
        <label><input type="radio" value="Other" name="daily_life" class="phy-act"/><div class="check-pa">Other</div></label><br>
        <input type="button" name="previous" class="previous action-button pre_btn" value="Previous" />
        <input type="button" name="next" class="next action-button next_btn" value="Next" />
    </fieldset>
	<fieldset class="fs7 fs">
        <h2 class="fs-title">Speicfy Your Non-Veg</h2>
        <h3 class="fs-subtitle">You can select multiple options</h3>
        <label><div class="bad-hab">Fish</div><input type="checkbox" value="Fish" name="nutri_typo[]" class="b-habits jq-check" /></label><br>
        <label><div class="bad-hab">Chicken</div><input type="checkbox" value="Chicken" name="nutri_typo[]" class="b-habits jq-check" /></label><br>
        <label><div class="bad-hab">Eggs</div><input type="checkbox" value="Eggs" name="nutri_typo[]" class="b-habits jq-check" /></label><br>
        <label><div class="bad-hab">Shrimp</div><input type="checkbox" value="Shrimp" name="nutri_typo[]" class="b-habits jq-check" /></label><br>
        <label><div class="bad-hab">I am vegetarian</div><input type="checkbox" value="Vegetarian" name="nutri_typo[]" class="b-habits jq-uncheck" checked/></label><br>
        <input type="button" name="previous" class="previous action-button pre_btn" value="Previous" />
        <input type="button" name="next" class="next action-button next_btn" value="Next" />
    </fieldset>
    <fieldset class="fs3 fs">
        <h2 class="fs-title">Measurements</h2>
        <input type="text" name="age" placeholder="Age" required/>
        <input type="text" name="weight" placeholder="Weight(KG)" required/>
        <input type="text" name="height" placeholder="Height(CM)" required/>
        <input type="text" name="target_weight" placeholder="Target Weight(KG)- Optional" /><br>
		<input type="button" name="previous" class="previous action-button pre_btn" value="Previous" />
        <input type="submit" name="submit_diet_plan" class="submit action-button" value="Submit" />
    </fieldset>
	
</form>
</div>
		</div>
	</div>
	
	<?php include ('includes/footer.php') ?>
    <script type="text/javascript" src="js/stepper.js"></script>
    
</body>
</html>
  