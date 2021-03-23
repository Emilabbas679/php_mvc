
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary"> Users table</h6>
            <a href="<?=ADMIN_URL?>users/create" class="d-none d-sm-block d-md-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow:hidden">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data['items'] as $item) { ?>
                            <tr>
                                <td><?=$item['id']?></td>
                                <td><?=$item['name']?></td>
                                <td><?=$item['email']?></td>
                                <td>

                                    <form  action="<?=ADMIN_URL?>users/delete/<?=$item['id']?>" method="POST" style="display: inline-block">
                                        <a class="btn btn-primary btn-circle btn-sm" href="<?=ADMIN_URL?>users/edit/<?=$item['id']?>">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>

                                </td>

                            </tr>

                        <?php }; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->