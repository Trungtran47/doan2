<?php
include 'inc/header.php';

?>

<?php
    $login_check = Session::get('customer_login');
    if($login_check ==false){
        header("<script type='text/javascript'>window.location.href = 'login.php'</script>");
    }
?> 

<style>
    .not_found{
        font-size: 30px;
        font-weight: bold;
        color: red;
    }
</style>
<div class="main">
    <div class="content">
        <div class="cartoption">
        <div class="cartpage">
            <div class="not_found">
                <h3>Order Page</h3>
            </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php'
?>

