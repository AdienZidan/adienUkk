<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link href=" <?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

<body>
<body class="bg-warning">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container py-5 h-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 ">
                            <div class="card bg-dark shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-3">Login admin</h3>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                               
                                <div class="card-body bg-dark" style="height: 300px;">
                                    <form method="post" action="<?= base_url('c_newLogin/login_admin') ?>">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text" placeholder="username" />
                                            <label for="inputEmail">username</label>
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-floating mb-6">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>


                                        <button type="submit" class="btn btn-primary btn-user btn-login col-md-12 ">Login</button>
                                    </form>
                              
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('index.php/c_newLogin/register'); ?>">Register account</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src=" <?= base_url('assets/js/scripts.js') ?>"></script>
</body>
<!-- MDB -->


</html>