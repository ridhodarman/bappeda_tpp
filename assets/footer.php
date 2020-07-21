                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="assets/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <div style="background-color: lightgray; top: 0; position: fixed; right: 0;">
        <small><b><?php echo $_SESSION['nama'] ?></b></small>
        
        <small>(<?php echo $_SESSION['role'] ?>)</small>
        
        <b><a href="logout.php" style="color: white">Logout</a></b>
        <br/>
    </div>
    
</html>