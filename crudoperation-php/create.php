<?php
    include 'header.php';
    include 'config.php';
    include 'Database.php';
?>
<?php
$db = new Database();
if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($db->link,  $_POST['name']);
  $email = mysqli_real_escape_string($db->link, $_POST['email']);
  $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
  if($name=='' || $email=='' || $skill==''){
    $error = "Field must not be empty";
  } else {
    $query = "INSERT INTO tblOne(name, email, skill) VALUES('$name', '$email', '$skill')";
    $insert = $db->insertData($query );
  }
}
?>

<section class="mainContent">
  <hr>
   PHP CRUD Operation :
  <hr>
<form action="" method="post">
  <table>
    <tr>
      <td>Name:</td>
      <td><input type="text" name="name" placeholder="Enter name"> </td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" name="email" placeholder="Enter email"> </td>
    </tr>
    <tr>
      <td>Skill:</td>
      <td><input type="text" name="skill" placeholder="Enter skill"> </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Cancel">
      </td>
    </tr>
  </table>
</form>
<br>
<?php
if (isset($error)) {
    echo "<span>".$error."</span>";
}
?>
<br>
<a href="index2.php"> Go Back to Home</a>
</section>

<?php
    include 'footer.php';
?>
