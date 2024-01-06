<?php 
     session_start(); 
?> 
<?php
     include('shared/partials/header.php');

     include('shared/partials/menu1.php');

     include('shared/function/connect.php');
?> 

<!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header" style="text-align: center;"><b>Etat des bons d'engagements</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12"><br>
                           <div class="dataTable_wrapper">
                                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Bon N°</th>
                                                <th>Type Bon</th>
                                                <th>Imputation</th>
                                                <th>Ministére</th>
                                                <th>Nif_Frs / Mle</th>
                                                <th>Gestion</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php
                                             $reponse = $maConnexion->query('SELECT * FROM bon_engagement, type_bon_engagement, section, gestion, service, depense, reglement, fournisseur, programme, action, tache, compte, activite WHERE bon_engagement.id_type = type_bon_engagement.id_type AND bon_engagement.code_section = section.code_section AND bon_engagement.id_gestion = gestion.id_gestion AND bon_engagement.code_service = service.code_service AND bon_engagement.code_depense = depense.code_depense AND bon_engagement.code_reglement = reglement.code_reglement AND bon_engagement.nif_frs = fournisseur.nif_frs AND bon_engagement.code_programme = programme.code_programme AND bon_engagement.code_action = action.code_action AND bon_engagement.code_tache = tache.code_tache AND bon_engagement.code_compte = compte.code_compte AND bon_engagement.code_activite = activite.code_activite AND etat = 0 ORDER BY num_bon ASC');
                                              
                                        ?>
                                        <tbody>
                                          <?php  
                                             while ($affichages = $reponse->fetch())
                                                 {
                                          ?>
                                            <tr>
                                                <td><?php echo $affichages['num_bon']; ?></td>
                                                <td><?php echo $affichages['type']; ?></td>
                                                <td><?php echo $affichages['code_imputation']; ?></td>
                                                <td><?php echo $affichages['libelle_section']; ?></td>
                                                <td><?php echo $affichages['nif_frs']; ?></td>
                                                <td><?php echo $affichages['gestion']; ?></td>
                                                <td>
                                                      <button id="" data-toggle="modal" data-target="#Detail<?php echo $affichages['num_bon']; ?>" class="btn btn-block btn-primary btn-sm"> Consulter</button>
                                                </td>
                                            </tr> 

                                          <div id="Detail<?php echo $affichages['num_bon']; ?>" class="modal fade" data-easein="pulse"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static">
                                           <div class="modal-content" >
                                              <div class="modal-header">

                                              </div>
                                              <div class="modal-body">
                                                  <div class="panel panel-default">
                                                    <div class="panel-heading" style="text-align: center;">
                                                        <b>ETAT DU BON D'ENGAGEMENT</b>
                                                    </div>
                                       <div class="panel-body">
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Bon N°</label>
                                            <div class="col-md-1">
                                               <?php echo $affichages["num_bon"]; ?>
                                            </div>
                                            <label class="col-md-4 control-label">Type Bon :</label>
                                            <div class="col-md-4">
                                               <?php echo $affichages['type']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Dépense :</label>
                                            <div class="col-md-8">
                                               <?php echo $affichages['libelle_depense']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Réglement :</label>
                                            <div class="col-md-8">
                                               <?php echo $affichages['libelle_reglement']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nat-dépense:</label>
                                               <div class="col-md-8">
                                                   <?php echo $affichages['nature_depense']; ?>
                                              </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Réf - Piéces :</label>
                                               <div class="col-md-8">
                                                   <?php echo $affichages['ref_piece']; ?>
                                              </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Programme:</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['code_programme']; ?>
                                            </div>
                                            <div class="col-md-7">
                                               <?php echo $affichages['libelle_programme']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Action  :</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['code_action']; ?>
                                            </div>
                                            <div class="col-md-7">
                                               <?php echo $affichages['libelle_action']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Activité :</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['code_activite']; ?>
                                            </div>
                                            <div class="col-md-7">
                                               <?php echo $affichages['libelle_activite']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tâche :</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['code_tache']; ?>
                                            </div>
                                            <div class="col-md-7">
                                               <?php echo $affichages['libelle_tache']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Compte :</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['code_compte']; ?>
                                            </div>
                                            <div class="col-md-7">
                                               <?php echo $affichages['intitule']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Quntité :</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['quantite']; ?>
                                            </div>
                                            <label class="col-md-3 control-label">Prix_U :</label>
                                            <div class="col-md-4">
                                               <?php echo $affichages['pu']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Montant Total :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['montant_total']; ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Imputation :</label>
                                            <div class="col-md-2">
                                               <?php echo $affichages['code_imputation']; ?>
                                            </div>
                                            <label class="col-md-2 control-label">Date </label>
                                            <div class="col-md-4">
                                               <?php echo $affichages['date_bon']; ?>
                                        </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">MINISTERE :</label>
                                            <div class="col-md-8">
                                               <?php echo $affichages['libelle_section']; ?> 
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">SERVICE :</label>
                                            <div class="col-md-8">
                                               <?php echo $affichages['libelle_service']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Crédits disponibles :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['credit_disponible']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Montant engagé :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['montant_engage']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Disponible aprés :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['disponible_apres']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Nif_Frs / Matricule :</label>
                                            <div class="col-md-6">
                                                 <?php echo $affichages['nif_frs']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Nom :</label>
                                            <div class="col-md-6">
                                                 <?php echo $affichages['nom']; ?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Prénom :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['prenom'];?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Ville :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['ville'];?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Pays :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['pays'];?>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Adresse :</label>
                                            <div class="col-md-6">
                                               <?php echo $affichages['adresse'];?>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="panel-footer" style="text-align: center;">
                                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                                                    Annuler
                                           </button>
                                           <button type="button" data-toggle="modal" data-target="#validate<?php echo $affichages['num_bon']; ?>" id="" class="btn btn-success"><i class="fa fa-check-square-o fa-fw"></i> Valider</button>
                                        </div><br>
                                        </div>
                                        </div>
                                        </div>
                                    </div>


                                    <div id="validate<?php echo $affichages['num_bon']; ?>" class="modal fade" data-easein="pulse"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static">
                                    <form method="post" action="shared/function/valide_bon.php">
                                      <div class="modal-dialog modal-md">
                                          <div class="modal-content">
                                              <div class="modal-header">

                                              </div> 
                                              <div class="modal-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                      <h4 class="modal-title" style="text-align: center;"><b>Validation Du Bon N° <?php echo $affichages["num_bon"]; ?></b>
                                                  </h4>
                                                        
                                                    </div><br>
                                                    <div class="panel-body">
                                                <div class="col-md-6">
                                                   <p> <label>Date de validation :</label><br><br> </p>
                                                </div>
                                                <div class="col-md-6">
                                                       <input type="hidden" name="num_bon" value="<?= $affichages['num_bon']; ?>">
                                                       <input type="date" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>" name="date" formnovalidate="aaaa-mm-jj" class="form-control input-sm">
                                                   <br>
                                                    
                                                </div>
                                              </div>
                                              <div class="panel-footer" style="text-align: center;">
                                                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                                                      Annuler
                                                  </button>
                                                  <button type="submit" class="btn btn-success" value="Add" name="action" id="action"> Confirmer
                                                  </button>
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
                                    
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            <!-- /#page-wrapper -->
<?php
     include('shared/partials/footer.php');
?>