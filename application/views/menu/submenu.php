<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger col-md-6" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) :
                        $id = $sm['id'];
                        $title = $sm['title'];
                        $url = $sm['url'];
                        $icon = $sm['icon'];
                        $active = $sm['is_active'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $title; ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $url; ?></td>
                            <td><?= $icon; ?></td>
                            <td><?= $active; ?></td>
                            <td>
                                <a href="" class="badge badge-pill badge-info" data-toggle="modal" data-target="#editModalCenter<?= $id; ?>">Edit</a>
                                <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#deleteModalCenter<?= $id; ?>">Delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="is_active" checked>
                            <label class="custom-control-label" for="is_active">Active?</label>
                        </div>
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

<!-- Modal Hapus -->
<?php foreach ($subMenu as $sm) :
    $id = $sm['id'];
    ?>
    <div class="modal fade" id="deleteModalCenter<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLongTitle">Delete Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">Are you sure want to delete this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url(); ?>menu/deleteSubMenu/<?= $id; ?>" class="btn btn-primary">Save changes</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Edit Modal -->
<?php foreach ($subMenu as $sm) :
    $id = $sm['id'];
    $title = $sm['title'];
    $menu = $sm['menu'];
    $url = $sm['url'];
    $icon = $sm['icon'];
    $active = $sm['is_active'];
    ?>
    <!-- Modal -->
    <div class="modal fade" id="editModalCenter<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLongTitle">Edit Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/editSubmenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $title; ?>">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" value="<?= $url; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $icon; ?>">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="is_active" checked>
                                <label class="custom-control-label" for="is_active">Active?</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?= base_url(); ?>menu/editSubmenu/<?= $id; ?>" class="btn btn-primary">Save changes</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>