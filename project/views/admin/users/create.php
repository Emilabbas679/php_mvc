
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">New User</h6>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form class="user" method="POST" action="<?=ADMIN_URL?>users/store" enctype="multipart/form-data">


                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->