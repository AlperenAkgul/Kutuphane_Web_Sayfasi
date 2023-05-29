<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata("result")) {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Well Done!</h5>
                <?= $this->session->flashdata("result") ?>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User List</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" id="searchbar" onkeyup="search_user()" placeholder="Search Name or Email">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" href="<?= base_url() ?>admin/users/add" style="background-color: #02d526; border-color: #02d526;">
                    <i class="fas fa-plus">
                    </i>
                    Add
                </a>
            </td>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name Surname</th>
                            <th>E-Mail</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($veri as $rs) {
                        ?>
                            <tr id="parent" class="rows">
                                <td class="search_name"><?= $rs->name_surname ?></td>
                                <td class="search_email"><?= $rs->email ?></td>
                                <td><?= $rs->role ?></td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm" href="<?= base_url() ?>admin/users/edit/<?= $rs->id ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/users/delete/<?= $rs->id ?>" onclick="return confirm('Are you sure you want to delete this user?');">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-tools" style="margin-left: auto; margin-right: auto;">
                <ul class="pagination pagination-sm float-right">
                    <?php
                    $length = count($veri);
                    for ($i = 0; $i < ($length / 10); $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="pagination(<?= $i + 1 ?>)"><?= $i + 1 ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.card-footer-->
</div>
</section>
<!-- /.content -->
</div>

<script>
    function search_user() {
        let input = document.getElementById('searchbar').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('search_name');
        let y = document.getElementsByClassName('search_email');

        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input) && !y[i].innerHTML.toLowerCase().includes(input)) {
                x[i].closest("#parent").style.display = "none";
            } else {
                x[i].closest("#parent").style.display = "";
            }
        }
    }
</script>

<script>
    window.onload = function() {
        pagination(1)
    };

    function pagination(id) {
        let rows = document.getElementsByClassName("rows");
        if (rows.length > (id * 10) - 10) {
            for (i = 0; i < rows.length; i++) {
                rows[i].style.display = "none";
            }

            for (i = (id * 10) - 10; i < (id * 10); i++) {
                if (i >= rows.length) {
                    i = rows.length;
                }
                rows[i].style.display = "";
            }
        }
    }
</script>