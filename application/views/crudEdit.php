<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CRUD</title>

  <style type="text/css">

    ::selection {
      background-color: #E13300;
      color: white;
    }
    ::-moz-selection {
      background-color: #E13300;
      color: white;
    }

    body {
      background-color: #fff;
      margin: 40px;
      font: 13px/20px normal Helvetica, Arial, sans-serif;
      color: #4F5155;
    }
    .addData {
      background-color: yellow;
      color: black;
      font-size: 1.2rem;
    }
    th.fname {
      background-color: #000;
      width: 200px;
      color: white;
    }
    th.age {
      background-color: #000;
      width: 200px;
      color: white;
    }
    th.gender {
      background-color: #000;
      width: 200px;
      color: white;
    }
    th.action {
      background-color: #000;
      width: 200px;
      color: white;
    }



  </style>
</head>
<body>

  <div id="container">
    <h1>CRUD - CREATE, READ, UPDATE, DELETE</h1>
    <br>
    <br>
    <div class="add">
      <form method="post" action="<?php echo site_url('CrudController/updateDetails') ?>/<?php echo $row->id; ?>">

        <label for="Fullname" class="FullnameLabel">Fullname</label>
        <input type="text" name="fullname" value="<?php echo $row->fullname; ?>" placeholder="Enter your Fullname" required>
        <br>
        <br>
        <label for="Age" class="AgeLabel">Age</label>
        <input type="number" name="age" value="<?php echo $row->age; ?>" placeholder="Enter your Age" required>
        <br>
        <br>
        <label for="Gender" class="GenderLabel">Gender</label>
        <input type="text" name="gender" value="<?php echo $row->gender; ?>" placeholder="Enter your Gender" required>
        <br>
        <button class="addData" type="submit" value="save">Update</button>
      </form>
    </div>
    <br>
    
  </div>

</body>
</html>