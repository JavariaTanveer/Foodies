<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['house'] .', '.$_POST['street'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['country'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'address saved!';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update address</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php' ?>
<style>

h3 {
  text-align: center;
  margin-bottom: 20px;
}


label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
  font-size: 15px;
}

.required::after {
  content: '*';
  color: red;
  margin-left: 5px;
}
</style>
<section class="form-container">

<form action="" method="post">
   <h3>Your Address</h3>

   <label for="house" align="left">Enter House No:<span class="required"></span></label>
   <input type="text" id="house" class="box" required placeholder="Enter your house no." required maxlength="50" name="house">

   <label for="street" align="left">Enter Street No:<span class="required"></span></label>
   <input type="text" id="street" class="box" required placeholder="Enter your street no." required maxlength="50" name="street">

   <label for="area" align="left">Enter Area Name:<span class="required"></span></label>
   <input type="text" id="area" class="box" required placeholder="Enter your area name" required maxlength="50" name="area">

   <label for="town" align="left">Enter Town Name:<span class="required"></span></label>
   <input type="text" id="town" class="box" required placeholder="Enter your town name" required maxlength="50" name="town">

   <label for="city" align="left">Enter City Name:<span class="required"></span></label>
   <input type="text" id="city" class="box" required placeholder="Enter your city name" required maxlength="50" name="city">

   <label for="country" align="left">Enter Country Name:<span class="required"></span></label>
   <input type="text" id="country" class="box" required placeholder="Enter your country name" required maxlength="50" name="country">

   <input type="submit" value="Save Address" name="submit" class="btn">
</form>


</section>










<?php include 'components/footer.php' ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>