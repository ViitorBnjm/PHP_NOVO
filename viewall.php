<?php
include 'connect.php';
include 'checklogin.php';
?>
<table border='1'>
    <tr>
        <th>
            Name
        </th>
        <th>
            Username
        </th>
    </tr>

<?php
$sq="select * from reg";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['name']?> 
        </td>
        <td>
            <?php echo $f['username']?> 
            <button href="delete.php" type="submit" value="submit" name="sub" class="btn btn-danger">Delete</button>
        </td>
    </tr>
    <?php
}
?>