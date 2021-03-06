<?php
include 'fungsi/keamanan.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container-fluid">

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Obat </h6>
	</div>
	<div class="card-body">

		<?php

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM beli_obat WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h4> ' . $_SESSION['success'] . ' </h4>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h4 class="bg-info"> ' . $_SESSION['status'] . ' </h4>';
        unset($_SESSION['status']);
    }

    foreach ($query_run as $data) {
        ?>

		<form action="fungsi/obatcode.php" method="post">
				<input type="hidden" name="edit_id" value="<?php echo $data['id'] ?>">
				<div class="form-group">
					<label> ID Diagnosa </label>
					<input type="number" name="edit_id_diagnosa" value="<?php echo $data['id_diagnosa'] ?>" class="form-control" placeholder="Enter ID Diagnosa">
				</div>
                <div class="form-group">
					<label> ID Obat </label>
					<input type="number" name="edit_id_obat" value="<?php echo $data['id_obat'] ?>" class="form-control" placeholder="Enter ID Obat">
				</div>
				<div class="form-group">
					<label>Jumlah Kebutuhan</label>
					<input type="number" name="edit_jumlah" value="<?php echo $data['jumlah'] ?>" class="form-control" placeholder="Enter Jumlah Kebutuhan">
				</div>
				<button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
				<a href="obat.php" class="btn btn-danger">Cancel</a>

		</form>

        <?php
}

}
?>

	</div>
</div>
</div>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>