<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Data</h4>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                    <?php foreach ($users as $row) { ?>
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
                                                <button class="btn btn-gradient-primary">detail</button>
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