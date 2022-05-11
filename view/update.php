<?php require 'header.php'; 
?>
    
    <h1>
        Update Form
    </h1>
    <form method="POST">
    <label>Name<br>
        <input type="text" name="name" value="<?= $result['name']; ?>" placeholder="Name">
    </label><br><br>
    <label>Phone<br>
        <input type="text" name="phone" value="<?=  $result['phone']; ?>" placeholder="Phone">
    </label><br><br>
    <label>Email<br>
        <input type="text" name="email" value="<?=  $result['email']; ?>" placeholder="Email">
    </label><br><br>
    <label>Address<br>
        <input type="text" name="address" value="<?=  $result['address']; ?>" placeholder="Address">
    </label><br><br>
    <div>
        <input type="submit" name="updateSubmit" value="Submit">
        <a href="index.php" class="updateButton"> Nee</a>
    </div>
  </form>

<?php

?>


    </div>
</div>
<?php require 'footer.php';?>
