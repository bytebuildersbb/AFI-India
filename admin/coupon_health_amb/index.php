<?php
    ob_start();

    $title = "Health Ambassador Coupon | Admin";
    $keyword = "Keyword | Admin";
    include "../layouts/main-header.php";

    

    // CRUD operations
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_coupon'])) {
            // Add Operation
            $coupon_code = $_POST['coupon_code'];
            if(!empty($coupon_code)){
                
            $query = "INSERT INTO health_ambassador_form_coupon (coupon_code) VALUES ('$coupon_code')";
            $result = $connect->query($query);
            if ($result) {
                // Insert successful
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                // Insert failed
                echo "Failed to add coupon.";
            }
            }
            else{
                echo "Please enter coupon code.";
            }
        } elseif (isset($_POST['update_coupon'])) {
            // Update Operation
            $coupon_id = $_POST['coupon_id'];
            $updated_coupon_code = $_POST['updated_coupon_code'];
            if(!empty($updated_coupon_code)){
            // Perform validation if needed
            $query = "UPDATE health_ambassador_form_coupon SET coupon_code = '$updated_coupon_code' WHERE id = $coupon_id";
            $result = $connect->query($query);
            if ($result) {
                // Update successful
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                // Update failed
                echo "Failed to update coupon.";
            }
            }
        } elseif (isset($_POST['delete_coupon'])) {
            // Delete Operation
            $coupon_id = $_POST['coupon_id'];
            $query = "DELETE FROM health_ambassador_form_coupon WHERE id = $coupon_id";
            $result = $connect->query($query);
            if ($result) {
                // Deletion successful
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                // Deletion failed
                echo "Failed to delete coupon.";
            }
        }
    }
?>


 <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
<div class="container ">

    <!-- Add Coupon Form -->
    <form method="post" style="text-align: center;margin: 17px 0;" class=' d-flex mx-5'>
        <input type="text" name="coupon_code" placeholder="Enter Coupon Code" class='form-control'>
        <button type="submit" name="add_coupon" class="btn btn-success  mx-5 text-wrap py-1">Add Coupon</button>
    </form>

    <!-- Display Coupons -->
    <table class="table table-striped table-bordered">
        <!-- Table Header -->
        <thead>
            <tr>
                <th>S.No</th>
                <th>Coupon Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            <?php
                $query = "SELECT * FROM health_ambassador_form_coupon ORDER BY id DESC";
                $result = $connect->query($query);
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$count++."</td>";
                    echo "<td>".$row['coupon_code']."</td>";
                    // Update and Delete Buttons
                    echo "<td>
                            <form method='post' class='d-flex grid gap-2'>
                                <input type='hidden' name='coupon_id' value='".$row['id']."'>
                                <input type='text' name='updated_coupon_code' placeholder='New Coupon Code' class='form-control '>
                                <button type='submit' name='update_coupon' class='btn btn-warning mx-2'>Update</button>
                                <button type='submit' name='delete_coupon' class='btn btn-danger mx-2'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<?php include "../layouts/main-footer.php"; ?>
