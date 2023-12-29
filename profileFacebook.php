<?php 
session_start();
if(isset($_SESSION['user_info_facebook'])) { ?>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <h1>Hello <?php echo $_SESSION['fb_name']; ?></h1>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <img src="<?php echo $_SESSION['fb_pic']; ?>" class="card-img-top" alt="Profile Picture">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $_SESSION['fb_name']; ?></h4>
                    <p class="card-text"><?php echo $_SESSION['fb_email']; ?></p>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{
    echo "no entre";
    echo $_SESSION['user_info_facebook'];
} ?>
