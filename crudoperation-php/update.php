<?php
    include 'header.php';
    include 'config.php';
    include 'Database.php';
?>

<?php
$id = $_GET['id'];
$db = new Database();

$query = "select * from tblOne where id=$id";
$getData = $db->selectData($query)->fetch_assoc();

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($db->link,  $_POST['name']);
  $email = mysqli_real_escape_string($db->link, $_POST['email']);
  $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
  if($name=='' || $email=='' || $skill==''){
    $error = "Field must not be empty";
  } else {
    $query ="UPDATE tblOne SET
            name     = '$name',
            email    = '$email',
            skill    = '$skill'
            where id =  $id";

    $update = $db->updateData($query);
  }
}
?>

<section class="mainContent">
  <hr>
   PHP CRUD Operation :
  <hr>

<?php
  if (isset($_POST['delete'])) {
    $query = "DELETE FROM tblOne WHERE id=$id";
    $deleteData = $db->deleteData($query);
  }
?>

<form action="" method="post">
  <table>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" value="<?php echo $getData['name']; ?>"> </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" value="<?php echo  $getData['email']; ?>"> </td>
    </tr>
    <tr>
      <td>Skill</td>
      <td><input type="text" name="skill" value="<?php echo  $getData['skill']; ?>"> </td>
    </tr>
     <tr>
      <td></td>
      <td>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Cancel">
        <input type="submit" name="delete" value="Delete">
      </td>
    </tr>
  </table>
</form>
<br>

<?php
if (isset($error)) {
    echo "<span style='color:red'>".$error."</span>";
}
?>

<br>
<a href="index2.php"> Go Back to Home</a>
</section>

<?php
    include 'footer.php';
?>
