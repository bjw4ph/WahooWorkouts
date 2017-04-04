<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login.php?error=needLogin&next=memberHome.php");
    }
    include('header.php');
?>
   <div id="main-wrapper">
        <div class="container">
            <?php include('messaging.php') ?>

            <!-- Content -->
                <article class="box post">
                    <header style="text-align:center">
                        <h2>Member Home</h2>
                        <!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
                    </header>

                    <section>
                        Only Members can view this page
                    </section>
                    
                </article>

                <input type="submit" value="Delete Account" class="button">

        </div>
    </div>
            
    
<?php
    include('footer.php');
?>