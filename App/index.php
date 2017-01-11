<?php $update=""; require_once "controleur.php"; ?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <title>CRUD Users</title>
    </head>
    <body>
        <div class="container">
            <br/>
            <div class="row">
                <?php $formaction = $update ? 'update' : 'add'; ?>
                <form action="<?=dirname($_SERVER['PHP_SELF']).'/'.$formaction; ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?php if(!empty($u))echo $u->username; ?>" name="username" placeholder="Username">
                            <input type="hidden" class="form-control" value="<?php if(!empty($u))echo $u->id; ?>" name="id" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" value="<?php if(!empty($u))echo $u->password; ?>" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-2">
                            <button   type="submit" class="btn btn-success">
                                <?php
                                $btn = $formaction=='update'? "Modifier":"Ajouter";
                                echo $btn;
                                ?>

                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Operations</th>
                    </tr>
                    <?php foreach($users as $user){ ?>
                        <tr>
                            <td><?=$user->id ?></td>
                            <td><?=$user->username ?></td>
                            <td><?=$user->password ?></td>
                            <td>
                                <a class="btn btn-danger" href="<?=dirname($_SERVER['PHP_SELF']) ?>/delete/<?=$user->id ?>">Supprimer</a>
                                <a class="btn btn-success" href="<?=dirname($_SERVER['PHP_SELF']) ?>/update/<?=$user->id ?>">Modifier</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>