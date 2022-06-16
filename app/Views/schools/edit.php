<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<style>
.mb20 {
    margin-right: 10px;
}
</style>

<div class="actionbutton mt-2">
    <a class="btn btn-info float-right mb20" href="<?= site_url('/logout') ?>">Logout</a>
    <a class="btn btn-info float-right mb20" href="<?= site_url('/profile') ?>">List</a>
</div>

<div class="row">
    <h2>Edit School</h2>
</div>

<?php
// Display Response 
if (session()->has('message')) {
?>
<div class="alert <?= session()->getFlashdata('alert-class') ?>">
    <?= session()->getFlashdata('message') ?>
</div>
<?php
}

?>

<?php $validation = \Config\Services::validation(); ?>
<div class="row">
    <div class="col-md-12">
        <form action="<?= site_url('schools/update/' . $school['id']) ?>" method="post">
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" name="name" required
                    value="<?= old('name', $school['name']) ?>">

                <!-- Error -->
                <?php if ($validation->getError('name')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('name'); ?>
                </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="pwd">Location:</label>
                <input type="text" class="form-control" name="location" required
                    value="<?= old('location', $school['location']) ?>">

                <!-- Error -->
                <?php if ($validation->getError('location')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('location'); ?>
                </div>
                <?php } ?>

            </div>

            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
    </div>

</div>

<?= $this->endSection() ?>