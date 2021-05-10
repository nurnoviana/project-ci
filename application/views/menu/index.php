<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">
                    ', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) :
                                            $menu_id = $m['id'];
                                            $menu_name = $m['menu'];
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                            <td><?= $menu_name; ?></td>
                                            <td>
                                                <a href="" class="badge badge-pill badge-info" data-toggle="modal" data-target="#editModal<?= $menu_id; ?>">Edit</a>
                                                                                                                        <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#deleteModal<?= $menu_id; ?>">Delete</a>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <?php $i++; ?>
                                                                                                                                                                                                                                        <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php foreach ($menu as $m) :
                                                                                                                            $menu_id = $m['id'];
                                                                                                                            $menu_name = $m['menu'];
                                                                                                                            ?>

                                                                                                                            <div class="modal fade" id="editModal<?= $menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
                                                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                                <div class="modal-content">
                                                                                                                                    <div class="modal-header">
                                                                                                                                        <h5 class="modal-title" id="editModalTitle">Edit Menu</h5>
                                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                                                        </button>
                                                                                                                                    </div>
                                                                                                                                    <form method="post" action="<?= base_url(); ?>menu/editItem/<?= $menu_id; ?>">
                                                                                                                            <div class="modal-body">
                                                                                                                                <div class="form-group">
                                                                                                                                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu_name; ?>">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php endforeach; ?>


<!-- Delete Modal -->
<?php foreach ($menu as $m) :
                                                                                                                            $menu_id = $m['id'];
                                                                                                                            $menu_name = $m['menu'];
                                                                                                                            ?>

                                                                                                                            <div class="modal fade" id="deleteModal<?= $menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
                                                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                                <div class="modal-content">
                                                                                                                                    <div class="modal-header">
                                                                                                                                        <h5 class="modal-title" id="deleteModalTitle">Delete Menu</h5>
                                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                                                        </button>
                                                                                                                                    </div>
                                                                                                                                    <div class="modal-body">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <h2 class="text-danger">Are you sure want to delete this item?</h2>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="modal-footer">
                                                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                        <a href="<?= base_url('menu/deleteItem/'); ?><?= $menu_id ?>" class="btn btn-primary">Save changes</a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            <?php endforeach; ?>