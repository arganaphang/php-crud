<html>

<head>
  <title>Homepage</title>
</head>

<body>
  <a href="create.php">Add Contact</a>
  <br />
  <br />
  <table width='80%' border=1>
    <tr>
      <th>Full Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Actions</th>
    </tr>
    <?php
    include "functions.php";
    foreach (listAll(connection()) as $data) {
      echo "<tr>";
      echo "<td>" . $data['full_name'] . "</td>";
      echo "<td>" . $data['email'] . "</td>";
      echo "<td>" . $data['address'] . "</td>";
      echo "<td><a href='update.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>