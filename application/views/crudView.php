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
.toast {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #4CAF50;
  color: white;
  text-align: center;
  border-radius: 5px;
  padding: 16px;
  position: fixed;
  z-index: 1000;
  left: 50%;
  top: 20px;
  font-size: 17px;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease-in-out;
}

.toast.show {
  visibility: visible;
  opacity: 1;
}

.toast.error {
  background-color: #f44336;
}


  </style>
</head>
<body>

  <div id="container">
    <h1>CRUD - CREATE, READ, UPDATE, DELETE</h1>
    <br>
    <br>

    <div class="add">
      <form method="post" action="<?php echo site_url('CrudController/create') ?>">

        <label for="Fullname" class="FullnameLabel">Fullname</label>
        <input type="text" name="fullname" placeholder="Enter your Fullname" required>
        <br>
        <br>
        <label for="Age" class="AgeLabel">Age</label>
        <input type="number" name="age" placeholder="Enter your Age" required>
        <br>
        <br>
        <label for="Gender" class="GenderLabel">Gender</label>
        <input type="text" name="gender" placeholder="Enter your Gender" required>
        <br>
        <button class="addData" type="submit" value="save">Submit</button>
      </form>
      <?php if ($this->session->flashdata('success')): ?>
      <div id="toast" class="toast">
        <?= $this->session->flashdata('success') ?>
      </div>
      <?php elseif ($this->session->flashdata('error')): ?>
      <div id="toast" class="toast error">
        <?= $this->session->flashdata('error') ?>
      </div>
      <?php endif; ?>
    </div>
    <br>
    <div>
      <table class="table">
        <thead class="thead">
          <tr>
            <th class="fname">Fullname</th>
            <th class="age">Age</th>
            <th class="gender">Gender</th>
            <th class="action">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {
            ?>
            <tr>
              <td><?php echo $row->fullname; ?></td>
              <td><?php echo $row->age; ?></td>
              <td><?php echo $row->gender; ?></td>
              <td>
                <a href="<?php echo site_url('CrudController/update'); ?>/<?php echo $row->id; ?>" class="update">Update</a>
                <a href="<?php echo site_url('CrudController/deleteDetails'); ?>/<?php echo $row->id; ?>" class="delete">Delete</a>
              </td>
            </tr>
            <?php
          } ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
<script>
  window.onload = function () {
    var toast = document.getElementById("toast");
    if (toast) {
      toast.classList.add("show");
      setTimeout(function () {
        toast.classList.remove("show");
      }, 3000); // Hide after 3 seconds
    }
  };
</script>
</html>