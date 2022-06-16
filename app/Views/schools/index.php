<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<style>
.mb20 {
    margin-right: 10px;
}
</style>




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
<style>
th {
    text-align: center;
}

td {
    text-align: center;
}

.top-section {
    display: flex;
    justify-content: space-between;
    padding-top: 15px;
}
</style>
<div class="top-section">
    <div>
        <form method='get' action="<?= site_url('/profile') ?>" id="searchForm">
            <input type='text' name='search' value='<?= $search ?>' placeholder="Search here...">
            <input type='button' id='btnsearch' value='Submit'
                onclick='document.getElementById("searchForm").submit();'>
        </form>
    </div>
    <div>
        <h5>Welcome TO Dashboard</h5>
    </div>
    <div>
        <a class="btn btn-info float-right mb20" href="<?= site_url('/logout') ?>">Logout</a>

        <a class="btn btn-info float-right mb20" href="<?= site_url('schools/create') ?>">Add school</a>
    </div>
</div>
<br />
<table width="100%" border="1" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="30%">Name</th>
            <th width="45%">Location</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($SchoolModel) : ?>
        <?php foreach ($SchoolModel as $school) : ?>
        <tr>
            <td><?= $school['id'] ?></td>
            <td><?= $school['name'] ?></td>
            <td><?= $school['location'] ?></td>
            <td>
                <a class="btn btn-sm btn-info" href="<?= site_url('schools/edit/' . $school['id']) ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="<?= site_url('schools/delete/' . $school['id']) ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        <!-- Pagination -->
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <?php if ($pager) : ?>
    <?php $pagi_path = 'index.php/profile'; ?>
    <?php $pager->setPath($pagi_path); ?>
    <?= $pager->links() ?>
    <?php endif ?>
</div>
<?= $this->endSection() ?>