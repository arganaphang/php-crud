<?php
if (isset($_POST['Submit'])) {
  include "functions.php";
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  create(connection(), $full_name, $email, $address);

  header("Location: index.php");
}
?>

<html>

<head>
  <title>Add Contact</title>
</head>

<body>
  <a href="index.php">Go to Home</a>
  <br /><br />
  <form method="post">
    <table width="25%" border="0">
      <tr>
        <td>Full Name</td>
        <td><input type="text" name="full_name"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <textarea name="address" cols="30" rows="10"></textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Add"></td>
      </tr>
    </table>
  </form>
</body>

</html>