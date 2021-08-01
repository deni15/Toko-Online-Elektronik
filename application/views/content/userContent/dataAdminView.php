<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Cetak session   
                        if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                        }
                        ?>
                        <div class="row mt-2 pr-4">
                            <div class="col-lg-7">
                                <a href="<?= site_url('Admin/created') ?>" class="btn btn-gradient-primary btn-sm mt-2"><i class="mdi mdi-plus menu-icon"></i> Add Admin Acoount</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="<?= site_url('DataAdmin/print') ?>" class="btn btn-gradient-info btn-lg form-control"><i class="mdi mdi-printer menu-icon"></i></a>
                            </div>
                            <div class="col-lg-3">
                                <form action="<?= base_url('DataAdmin/search') ?>" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search by data details" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>No id</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No Telphone</th>
                                        <th>level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($admin as $row) { ?>
                                        <tr>
                                            <td><?= $row->id; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->username; ?></td>
                                            <td><?= $row->gender; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->alamat; ?></td>
                                            <td><?= $row->no_telp; ?></td>
                                            <td><?= $row->level; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>DataAdmin/edit/<?= $row->id; ?>" class="btn btn-gradient-warning"><i class="mdi mdi-pencil menu-icon"></i></a>
                                                <a href="<?php echo base_url(); ?>DataAdmin/delete/<?= $row->id; ?>" class="btn btn-gradient-danger"><i class="mdi mdi-delete  menu-icon"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->