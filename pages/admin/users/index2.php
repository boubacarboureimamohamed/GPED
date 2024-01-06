<?php 
     session_start(); 
?>  
<?php 
     include('shared/partials/header.php');

     include('shared/partials/menu.php');

     include('shared/function/connect.php'); 
?> 
     
     <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header" style="text-align: center;"><b>Liste des utilisateurs</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dataTable_wrapper">
                                    <div align="right">
                                        <div align="right">
                                           <a href="#costumModal10" role="button" class="btn btn-success" data-toggle="modal" id="user_form" data-target="#costumModal10"><i class="fa fa-plus fa-fw"></i>Nouveau</a>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Nom d'utilisateur</th>
                                                <th>Mot de pass</th>
                                                <th>Statut</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                             $reponse = $maConnexion->query('SELECT U.id_user, U.username, U.password, U.statut FROM user U ORDER BY U.id_user ASC');
                                        ?>
                                        <tbody>
                                          <?php 
                                              while ($affichages = $reponse->fetch())
                                                 {
                                          ?>
                                            <tr>
                                                <td><?php echo $affichages['id_user']; ?></td>
                                                <td><?php echo $affichages['username']; ?></td>
                                                <td><?php echo $affichages['password']; ?></td>
                                                <td><?php echo $affichages['statut']; ?></td>
                                                <td>

                                                   <button name="edit" data-toggle="modal" data-target="#costumModal11<?php echo $affichages['id_user']; ?>" class="btn btn-info edit_data"><i class="fa fa-pencil-square-o fa-fw"></i></button>

                                                    <a href="shared/function/delete_user.php?supression=<?php echo $affichages['id_user']; ?>">
                                                       <button type="button" class="btn btn-danger" onclick ="return(confirm('Souhaitez-vous vraiment supprimer cet enregistrement???'))"><i class="fa fa-trash-o fa-fw"></i></button>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div id="costumModal11<?php echo $affichages['id_user']; ?>" class="modal fade" data-easein="pulse"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static">
                                    <form method="post" action="shared/function/update_user.php" id="user_form" enctype="multipart/form-data" onsubmit="return verifForm(this)">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  
                                              </div>
                                              <div class="modal-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                      <h4 class="modal-title" style="text-align: center;"><b>Appliquez votre modification</b>
                                                  </h4> 
                                                    </div><br>
                                                    <div class="panel-body">
                                                <div class="col-md-4">
                                                   <p> <label for="nom">Nom d'utilisateur :</label><br><br> </p>
                                                   <p> <label for="password">Mot de pass :</label><br><br> </p>
                                                   <p> <label for="statut">Statut :</label><br><br> </p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="username" id="nom" class="form-control" autocomplete="off" value="<?php echo $affichages['username']; ?>" required="required" placeholder="Entrez le nom de l'utilisateur s'il vous plaît......!" onblur="verifnom(this)"/>
                                                    <input type="hidden" name="id_user" id="username" class="form-control" autocomplete="off" value="<?php echo $affichages['id_user']; ?>" required="required" />
                                                   <br>
                                                     <input type="text" name="password" value="<?php echo $affichages['password']; ?>" id="password" class="form-control" autocomplete="off" required="required" placeholder="Entrez le mot de passe s'il vous plaît..............!" onblur="verifpassword(this)"/>
                                                  <br>
                                                       <input type="text" id="statut" name="statut" value="<?php echo $affichages['statut']; ?>" class="form-control" required="required" autocomplete="off" placeholder="Entrez le statut de l'utilisateur s'il vous plaît....!" onblur="verifstatut(this)"/>
                                                 <br>
                                                </div>
                                              </div>
                                              <div class="panel-footer" style="text-align: center;">
                                                   <button name="id_user" id="id_user" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                                                      Annuler
                                                  </button>
                                                  <button name="update" id="save" type="submit" class="btn btn-info"><i class="fa fa-save fa-fw"></i> Modifier</button>
                                                  </button>
                                              </div>
                                              </div>
                                              </div>
                                          </div>
                                      </div>
                                    </form>
                                  </div>

                                        <?php
                                                }
                                             $reponse->closeCursor();
                                        ?>

                                        </tbody> 
                                    </table>

                                  <div id="costumModal10" class="modal fade" data-easein="pulse"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static">
                                    <form method="post" action="shared/function/insert_user.php" id="user_form" enctype="multipart/form-data" onsubmit="return verifForm(this)">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  
                                              </div>
                                              <div class="modal-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                      <h4 class="modal-title" style="text-align: center;"><b>Ajout d'un nouveau utilisateur</b>
                                                  </h4> 
                                                        
                                                    </div><br>
                                                    <div class="panel-body">
                                                <div class="col-md-4">
                                                   <p> <label for="nom">Nom d'utilisateur :</label><br><br> </p>
                                                   <p> <label for="password">Mot de pass :</label><br><br> </p>
                                                   <p> <label for="statut">Statut :</label><br><br> </p>
                                                </div>
                                                <div class="col-md-8">
                                                  <input type="text" name="username" id="nom" class="form-control" autocomplete="off" required="required" placeholder="Entrez le nom de l'utilisateur s'il vous plaît......!" onblur="verifnom(this)" value ="Exemple : NomUtilisateur0001@DIF" onclick="this.value=''"/>
                                                   <br>
                                                     <input type="text" name="password" id="password" class="form-control" autocomplete="off" required="required" placeholder="Entrez le mot de passe s'il vous plaît..............!" onblur="verifpassword(this)" value ="Exemple : Only001DIF" onclick="this.value=''"/>
                                                  <br>
                                                       <input type="text" id="statut" name="statut" class="form-control" required="required" autocomplete="off" placeholder="Entrez le statut de l'utilisateur s'il vous plaît....!" onblur="verifstatut(this)"/>
                                                 <br>
                                                </div>
                                              </div>
                                              <div class="panel-footer" style="text-align: center;">
                                                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                                                      Annuler
                                                  </button>
                                                  <button type="submit" class="btn btn-success" value="Add" name="action" id="action"><i class="fa fa-save fa-fw"></i> Ajouter
                                                  </button>
                                              </div>
                                              </div>
                                              </div>
                                          </div>
                                      </div>
                                    </form>
                                  </div>

                                  


                                </div>
                        </div>
                    </div>
                </div>
            </div>   

<?php
     include('shared/function/script.php'); 
     include('shared/partials/footer.php');
?>