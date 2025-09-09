<?php
require_once ('includes/Dbconfig.php');
include('includes/session.php');

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user data from database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM nutrinoz_users_info WHERE info_user_id = '$user_id'";
$result = mysqli_query($con, $query);

// Set variables from either POST data (if coming from diet-plan) or database (if coming from user-profile)
if(isset($_POST['submit_diet_plan'])) {
    // Coming from diet-plan form
    $gender = $_POST['gender'];
    $phy_act = $_POST['physical_activity'];
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $height = mysqli_real_escape_string($con, $_POST['height']);
    $tar_weight = mysqli_real_escape_string($con, $_POST['target_weight']);
    $meal_num = $_POST['meal_number'];
    $d_life = $_POST['daily_life'];
    $nutri_type = $_POST['nutri_typo'];
    if($nutri_type[0]== 'Vegetarian'){
        $ntype = 'Vegetarian';
    }
    else{
        $ntype = 'Non-Vegetarian';
    }
} else if(mysqli_num_rows($result) > 0) {
    // Coming from user-profile, use database data
    $user_data = mysqli_fetch_assoc($result);
    $gender = strtolower($user_data['user_gender']);
    $phy_act = strtolower($user_data['user_phy_activity']);
    $age = $user_data['user_age'];
    $weight = $user_data['user_weight'];
    $height = $user_data['user_height'];
    $tar_weight = $user_data['user_tar_weight'];
    $d_life = $user_data['user_everyday'];
    $ntype = $user_data['user_veg_type'];
    $meal_num = 3; // Default to 3 meals if coming from profile
} else {
    // No POST data and no user data
    header('Location: user-profile.php');
    exit();
}

$bmi = round(($weight*10000)/($height*$height), 2);

$bmr = 0;
if($gender == 'male'){
    $bmr = 66 + (13.7 * $weight ) + (5 * $height ) - (6.8 * $age );
}else if($gender == 'female' ){
    $bmr = 655 + (9.6 * $weight ) + (1.8 * $height ) - (4.7 * $age );
}

$cal = 0;
if ($phy_act == 'sedentary'){
    $cal = $bmr * 1.2;
}else if ($phy_act == 'lightly active') {
    $cal = $bmr * 1.375;
}else if ($phy_act == 'moderatetely active') {
    $cal = $bmr * 1.55;
}else if ($phy_act == 'very active') {
    $cal = $bmr * 1.725;
}else if ($phy_act == 'extra active') {
    $cal = $bmr * 1.9;
}

$cal_range1 = round($cal-100, 0);
$cal_range2 = round($cal+100, 0);
$cal_range = $cal_range1 . ' - ' . $cal_range2;
$recommend = floor($cal/100) * 100;

$height_in = $height * 0.3937008;
$height_ft = $height * 0.0328084;

$dev_ideal_weight = 45.5 + 2.3 * ($height_in - 60 );

if ($gender == 'male'){ //all in kg
    $dev_ideal_weight = round(50 + 2.3 * ($height_in - 60 ), 1); //devine formula
    $rob_ideal_weight = round(52 + 1.9 * ($height_in - 60 ), 1); //robinson formula
    $mil_ideal_weight = round(56.2 + 1.41 * ($height_in - 60 ), 1); //The Miller formula
    $ham_ideal_weight = round(48 + 2.7 * ($height_in - 60 ), 1); //The Hamwi formula
}else if($gender == 'female') {
    $dev_ideal_weight = round(45.5 + 2.3 * ($height_in - 60 ), 1); //devine formula
    $rob_ideal_weight = round(49 + 1.7 * ($height_in - 60 ), 1); //robinson
    $mil_ideal_weight = round(53.1 + 1.36 * ($height_in - 60 ), 1); //The Miller formula
    $ham_ideal_weight = round(45.5 + 2.2 * ($height_in - 60 ), 1); //The Hamwi formula
}

$bmi_ideal_weight_range1 = round((18.5 * $height * $height )/10000, 1);
$bmi_ideal_weight_range2 = round((25 * $height * $height )/10000, 1);
$bmi_ideal_weight_range = $bmi_ideal_weight_range1 . ' - ' . $bmi_ideal_weight_range2;
$bmi_iw_circle = ($bmi_ideal_weight_range1 + $bmi_ideal_weight_range2)/2;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diet Plan - IDS</title>
    <link rel="icon" href="images/icon-logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/joinus.css" rel="stylesheet" type="text/css"/>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script type="text/javascript">WebFont.load({
       google: {
         families: ["Montserrat:400,700","Unna:regular","Source Sans Pro:regular,italic,700","Raleway:300,regular,500,600,700,800,900","Libre Baskerville:regular,italic,700"]
       } });
    </script>
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="p-n1-menu">
        <div class="p-n1-content p-n-m-content">
            <p class="n1-title n-m-title">Diet plan</p>
            <p class="n1-subtitle n-m-subtitle">Your Diet Plan</p>
            <hr style="border-top:2px solid #57b63a;width:20%;" align="left"/>
        </div>
    </div>
    

    <div class="profile-section3 ps3">
        <div class="data-all">
            <div class="outer-div">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div><h3>BMI</h3></div>
                    <div id="f-circle"><strong class="circle-strong1"><?php echo $bmi; ?><br>kg/m<sup>2</sup></strong></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div><h3>Calories</h3></div>
                    <div id="s-circle"><strong class="circle-strong2"><?php echo $cal_range; ?> <br><span class="center1">kCal</span></strong></div>
                </div>
                <div class="col-md-4 col-xs-4">
                    <div><h3>Ideal Weight</h3></div>
                    <div id="t-circle"><strong class="circle-strong3"><?php echo $bmi_ideal_weight_range; ?> <br><span class="center2">Kg</span></strong></div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <div class="profile-section4 ps4">
        <div class="outer-div">
            <div class="part1">
                <h1>Our Recommended Diet Plan</h1>
                <?php if(isset($user_data['user_allergy1']) || isset($user_data['user_allergy2'])): ?>
                <div class="health-alerts">
                    <?php if(!empty($user_data['user_allergy1']) && $user_data['user_allergy1'] != 'None'): ?>
                        <div class="alert alert-warning">
                            <strong>Health Consideration 1:</strong> <?php echo htmlspecialchars($user_data['user_allergy1']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($user_data['user_allergy2']) && $user_data['user_allergy2'] != 'None'): ?>
                        <div class="alert alert-warning">
                            <strong>Health Consideration 2:</strong> <?php echo htmlspecialchars($user_data['user_allergy2']); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="part2">
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="inner-div">
                        <a href="recommend-meal.php?v1=<?php echo $ntype;?>&v2=<?php echo $meal_num;?>&v3=<?php echo $recommend;?>">
                            <div class="title">
                                <h3>Diet Plan 1 - <?php echo $recommend; ?> kCal</h3>
                                <p class="plan-desc">Balanced nutrition plan with essential nutrients</p>
                            </div>
                            <div class="desc">
                                <img src="images/ps45.jpg" alt="Balanced Diet Plan"/>
                                <div class="plan-overlay">
                                    <ul>
                                        <li>Balanced macronutrients</li>
                                        <li>Rich in fiber</li>
                                        <li>Suitable for beginners</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="inner-div">
                        <a href="recommend-meal.php?v1=<?php echo $ntype;?>&v2=<?php echo $meal_num;?>&v3=<?php echo $recommend+100;?>">
                            <div class="title">
                                <h3>Diet Plan 2 - <?php echo $recommend+100; ?> kCal</h3>
                                <p class="plan-desc">Enhanced protein for muscle maintenance</p>
                            </div>
                            <div class="desc">
                                <img src="images/ps44.jpeg" alt="Protein-Rich Diet Plan"/>
                                <div class="plan-overlay">
                                    <ul>
                                        <li>Higher protein content</li>
                                        <li>Moderate carbs</li>
                                        <li>Perfect for active lifestyle</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="inner-div">
                        <a href="recommend-meal.php?v1=<?php echo $ntype;?>&v2=<?php echo $meal_num;?>&v3=<?php echo $recommend+200;?>">
                            <div class="title">
                                <h3>Diet Plan 3 - <?php echo $recommend+200; ?> kCal</h3>
                                <p class="plan-desc">Energy-dense for high activity</p>
                            </div>
                            <div class="desc">
                                <img src="images/ps46.jpg" alt="High-Energy Diet Plan"/>
                                <div class="plan-overlay">
                                    <ul>
                                        <li>Higher caloric intake</li>
                                        <li>Complex carbohydrates</li>
                                        <li>Ideal for intense workouts</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>
    
    <!-- Add CSS for enhanced styling -->
    <style>
        .health-alerts {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 15px;
        }
        .alert {
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffecb5;
            color: #856404;
            padding: 12px 20px;
        }
        .plan-desc {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }
        .inner-div {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .inner-div:hover {
            transform: translateY(-5px);
        }
        .plan-overlay {
            position: absolute;
            bottom: -100%;
            left: 0;
            right: 0;
            background: rgba(87, 182, 58, 0.9);
            padding: 15px;
            color: white;
            transition: bottom 0.3s ease;
        }
        .inner-div:hover .plan-overlay {
            bottom: 0;
        }
        .plan-overlay ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .plan-overlay li {
            padding: 5px 0;
            font-size: 14px;
        }
        .title h3 {
            margin-bottom: 5px;
        }
        .desc img {
            width: 100%;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        .inner-div:hover .desc img {
            transform: scale(1.05);
        }
    </style>
    
    </div>

    <div class="reference-section">
        <div class="outer-div">
            <h2 class="section-title">Quick Reference Guide: Diet Plans for Common Health Conditions</h2>
            
            <div class="table-responsive">
                <table class="table table-bordered health-table">
                    <thead>
                        <tr>
                            <th>Health Condition</th>
                            <th>Recommended Foods</th>
                            <th>Foods to Limit/Avoid</th>
                            <th>Special Considerations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="condition">Diabetes</td>
                            <td>
                                • Leafy greens<br>
                                • Whole grains<br>
                                • Lean proteins<br>
                                • Low-glycemic fruits<br>
                                • Greek yogurt
                            </td>
                            <td>
                                • Refined sugars<br>
                                • White bread<br>
                                • Sugary drinks<br>
                                • Processed snacks<br>
                                • High-fat dairy
                            </td>
                            <td>
                                • Monitor carbohydrate intake<br>
                                • Eat at regular intervals<br>
                                • Include fiber-rich foods<br>
                                • Check blood sugar levels<br>
                                • Stay hydrated
                            </td>
                        </tr>
                        <tr>
                            <td class="condition">Hypertension</td>
                            <td>
                                • Bananas (potassium)<br>
                                • Fish (omega-3)<br>
                                • Berries<br>
                                • Leafy greens<br>
                                • Oats
                            </td>
                            <td>
                                • High sodium foods<br>
                                • Processed meats<br>
                                • Pickled foods<br>
                                • Caffeine<br>
                                • Alcohol
                            </td>
                            <td>
                                • Follow DASH diet<br>
                                • Limit sodium intake<br>
                                • Regular exercise<br>
                                • Stress management<br>
                                • Monitor blood pressure
                            </td>
                        </tr>
                        <tr>
                            <td class="condition">Heart Disease</td>
                            <td>
                                • Fatty fish<br>
                                • Nuts and seeds<br>
                                • Olive oil<br>
                                • Whole grains<br>
                                • Fresh fruits
                            </td>
                            <td>
                                • Trans fats<br>
                                • Processed foods<br>
                                • Red meat<br>
                                • Full-fat dairy<br>
                                • Salty snacks
                            </td>
                            <td>
                                • Mediterranean diet style<br>
                                • Low sodium options<br>
                                • Portion control<br>
                                • Heart-healthy fats<br>
                                • Regular exercise
                            </td>
                        </tr>
                        <tr>
                            <td class="condition">Obesity</td>
                            <td>
                                • Lean proteins<br>
                                • Vegetables<br>
                                • Complex carbs<br>
                                • Low-fat dairy<br>
                                • High-fiber foods
                            </td>
                            <td>
                                • Sugary foods<br>
                                • Processed snacks<br>
                                • Fried foods<br>
                                • Sweetened drinks<br>
                                • High-calorie desserts
                            </td>
                            <td>
                                • Calorie monitoring<br>
                                • Regular physical activity<br>
                                • Portion control<br>
                                • Meal planning<br>
                                • Adequate hydration
                            </td>
                        </tr>
                        <tr>
                            <td class="condition">Chronic Kidney Disease</td>
                            <td>
                                • Low-potassium fruits<br>
                                • Rice<br>
                                • Lean meats<br>
                                • Bell peppers<br>
                                • Cabbage
                            </td>
                            <td>
                                • High-potassium foods<br>
                                • Excess protein<br>
                                • Phosphorus-rich foods<br>
                                • Salt<br>
                                • Processed foods
                            </td>
                            <td>
                                • Monitor fluid intake<br>
                                • Control protein portions<br>
                                • Track minerals<br>
                                • Regular testing<br>
                                • Consult dietitian
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .reference-section {
            padding: 40px 0;
            background: #f8f9fa;
        }
        .section-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
        }
        .health-table {
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .health-table th {
            background: #57b63a;
            color: white;
            padding: 15px;
            font-size: 16px;
            border: none;
        }
        .health-table td {
            padding: 15px;
            vertical-align: top;
            line-height: 1.6;
        }
        .condition {
            font-weight: bold;
            color: #2c5282;
        }
        @media (max-width: 768px) {
            .health-table {
                font-size: 14px;
            }
            .health-table td, .health-table th {
                padding: 10px;
            }
        }
    </style>
    
<script src="js/circle-progress.js"></script>
<script>
  $('#f-circle').circleProgress({
    value: <?php echo round($bmi/40, 2);?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
    $('#s-circle').circleProgress({
    value: <?php echo $cal/4000; ?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
  $('#t-circle').circleProgress({
    value: <?php echo $bmi_iw_circle/200; ?>,
   size: 200, 
   startAngle: 3.14 *3/2,
   thickness: 20,
  });
</script>
</body>
</body>
</html>