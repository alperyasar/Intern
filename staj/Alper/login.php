<?php
// Initialize the session
 require 'header.php';

?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center gosterge">Sign In</h5>
                        <div class="form-label-group">
                            <input name="email"  type="email" id="mail" class="form-control" placeholder="Email address" autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input name="password" type="password" id="pass" class="form-control" placeholder="Password">
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button onclick="islem(1)" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Giriş Yap</button>
                        <hr class="my-4">
                        <button class="btnG btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Login via Google</button>
                        <button class="btnF btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Login via Facebook</button>
                        <button class="btnT btn-lg btn-twitter btn-block text-uppercase" type="submit"><i class="fab fa-twitter mr-2"></i> Login via Twitter</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php
include 'footer.php';
?>
</body>
<script>
    function islem(id) {
        var mail = $("#mail").val();
        var pass = $("#pass").val();
        $.post("insert.php",{mail: mail, pass: pass, islem: id}, function( data ) {
            console.log(data);
            if(data == 1){
            window.location.href = "ouz.php";
            }
            else{

            }
        });
    }
</script>
</html>