<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login.php?error=needLogin&next=memberHome.php");
    }
    $email = $_SESSION["email"];
    $query = "select * from siteUser where siteUser.Email = '$email'";

    $db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
    if ($db->connect_error):
        die ("Could not connect to db: " . $db->connect_error);
    endif;
    $results = $db->query($query);
    $user = $results->fetch_assoc();
    $isTrainer;
    if($user['Type'] == "trainer"){
        $isTrainer = true;
        $query2 = "select * from trainerTimes where trainerTimes.Email = '$email'";
        $query3 = "select * from userTimes where userTimes.Trainer = '$email'";
        $results2 = $db->query($query2);
        $openTimes = [];
        while($row = $results2->fetch_assoc()){
            $openTimes[] = $row;
        }
        $results3 = $db->query($query3);
        $scheduledTimes = [];
        while($row = $results3->fetch_assoc()){
            $scheduledTimes[] = $row;
        }
    } else {
        $isTrainer = false;
        $query2 = "select * from userTimes where userTimes.Email = '$email'";
        $results2 = $db->query($query2);
        $times = [];
        while($row = $results2->fetch_assoc()){
            $times[] = $row;
        }
    }
    include('header.php');
?>
   <div id="main-wrapper">
        <div class="container">
            <?php include('messaging.php') ?>

            <!-- Content -->
                <article class="box post">
                    <header style="text-align:center">
                        <h2> Welcome, <?php echo($user['Name']); ?>! </h2>
                        <!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
                    </header>

                    <section>
                        <?php
                            if($isTrainer){
                                echo "You are a Trainer";
                                echo "<header><h3>Your Open Times</h3></header>";
                                echo "<table class=\"table\"><thead><tr><th>Date</th><th>Start</th><th>Finish</th><th>Remove Appointment</th></tr></thead><tbody>";
                                for($i =0; $i < sizeof($openTimes); $i++){
                                    echo "<tr><td>".$openTimes[$i]["Date"]."</td><td>".$openTimes[$i]["Start"]."</td><td>".$openTimes[$i]["Finish"]."</td><td><a href=\"deleteTime.php?id=".$openTimes[$i]["trainerTimes__id"]."&type=Trainer\" class=\"button alt\">Delete</a></td></tr>";
                                }
                                echo "</tbody></table>";
                                echo "<header><h3>Your Scheduled Appointments</h3></header>";
                                echo "<table class=\"table\"><thead><tr><th>User Email</th><th>Date</th><th>Start</th><th>Finish</th><th>Remove Appointment</th></tr></thead><tbody>";
                                for($i =0; $i < sizeof($scheduledTimes); $i++){
                                    echo "<tr><td>".$scheduledTimes[$i]["Email"]."</td><td>".$scheduledTimes[$i]["Date"]."</td><td>".$scheduledTimes[$i]["Start"]."</td><td>".$scheduledTimes[$i]["Finish"]."</td><td><a href=\"deleteTime.php?id=".$scheduledTimes[$i]["userTimes__id"]."\" class=\"button alt\">Delete</a></td></tr>";
                                }
                                echo "</tbody></table>";

                            } else {
                                echo "<header><h3>Training Times You Have Signed Up For</h3></header>";
                                echo "<table class=\"table\"><thead><tr><th>Trainer Email</th><th>Date</th><th>Start</th><th>Finish</th><th>Visit Trainer Page</th><th>Remove Appointment</th></tr></thead><tbody>";
                                for($i =0; $i < sizeof($times); $i++){
                                    echo "<tr><td>".$times[$i]["Trainer"]."</td><td>".$times[$i]["Date"]."</td><td>".$times[$i]["Start"]."</td><td>".$times[$i]["Finish"]."</td><td><a href=\"trainerEmailRedirect.php?email=".$times[$i]["Trainer"]."\" class=\"button\">Go</a></td><td><a href=\"deleteTime.php?id=".$times[$i]["userTimes__id"]."\" class=\"button alt\">Delete</a></td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        ?>
                    </section>
                    
                </article>

                <input type="submit" value="Delete Account" class="button">

        </div>
    </div>
            
    
<?php
    include('footer.php');
?>