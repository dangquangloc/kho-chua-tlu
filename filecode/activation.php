<?php
include 'demo/connection.php';
$msg='';
//if key is set, not empty ->get information
if(!empty($_GET['code']) && isset($_GET['code']))
{
   //collect value from the url
   $code=$_GET['code'];
   $sql="select id from users where activation='$code'";
   $c=mysqli_query($conn, $sql);
 
   if(mysqli_num_rows($c) > 0)
   {
      $sql="select id from users where activation='$code' and status='0'";
      $c=mysqli_query($conn, $sql);

 
      if(mysqli_num_rows($c) == 1)
      {
         $sql="UPDATE users SET status='1' WHERE activation='$code'";
         $c=mysqli_query($conn, $sql);
         $msg="Your account is activated";
      }
      else
      {
         $msg ="Your account is already active, no need to activate again";
      }
   }
   else
   {
      $msg ="Wrong activation code.";
   }
}
?>
<?php echo $msg;
echo $code ?>
