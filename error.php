<?php
    /*
        * Cancel Order page
    */

    if (session_id() == "")
        session_start();

    include('header.php');
	
	$arr = $_SESSION["error"];
	
?>
    <div id="main-wrapper">
        <div class="container">
            <article class="box post">
                <header style="text-align:center">
                    <h2>Something Went Wrong</h2>
                    <!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
                </header>
                <section>
            
                    <div class="alert alert-danger" role="alert">                    
                        <p class="text-center"><strong>The payment could not be completed.</strong></p>
                    </div>

                    <br />
                    <strong>Reason: </strong> <?php echo $arr["json"]["name"]; ?> <br />
                    <br />
                    <strong>Message: </strong> <?php echo $arr["json"]["message"]; ?> <br />
                    
                    <br />
                    <br />

                    Return to <a href="index.html">home page</a>.
                </section>
            </article>
        </div>
            
    </div>
    
<?php
    include('footer.php');
?>