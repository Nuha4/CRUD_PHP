<?php
    include 'header.php';
    include 'config.php';
    include 'Database.php';
?>
<?php
$db = new Database();
$query = "select * from tblOne";
$read = $db->selectData($query);
?>

<section class="mainContent">
  <hr style="color: #23B5DE">
   PHP CRUD Operation :
  <hr style="color: #23B5DE">

  <table class="tbOne">
    <tr>
      <th>Name </th>
      <th>Email</th>
      <th>Skill</th>
      <th>Update Data</th>
    </tr>
    <?php ?>
    <?php if($read){?>
    <?php while($row = $read->fetch_assoc()){?>
    <tr>
        <td> <?php echo $row['name']; ?> </td>
        <td> <?php echo $row['email'];?> </td>
        <td> <?php echo $row['skill'];?> </td>
        <td><a href="update.php?id=<?php echo urlencode($row['id']) ; ?>"> Update </a></td>
    </tr>
    <?php } ?>
    <?php } else {?>
    <p> Data is not available!! </p>
    <?php } ?>
  </table>
  <br>
  <?php
    if (isset($_GET['msg'])) {
        echo "<span style='color: green'>".$_GET['msg']."</span>";
    }
  ?>
  <br>
  <td><a href="create.php"> Create Data</a></td>
</section>
<?php
    include 'footer.php';
?>
