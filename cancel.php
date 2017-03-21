<?php
    /*
        * Cancel Order page
    */

    if (session_id() == "")
        session_start();

    include('header.php');
?>
    <div id="main-wrapper">
        <div class="container">
            <article class="box post">
                <header style="text-align:center">
                    <h2>Order Cancelled</h2>
                    <!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
                </header>
                <section>
            
                    <h4>
                        You cancelled the order.
                    </h4>
                    <br/>
                    Return to <a href="index.php">home page</a>.
                </section>
            </article>
        </div>
            
    </div>
            
    
<?php
    include('footer.php');
?>