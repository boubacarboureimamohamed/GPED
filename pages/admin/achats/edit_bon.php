<?php 
     session_start(); 
?>
<?php
     include('shared/partials/header.php');

     include('shared/partials/menu1.php'); 

     include('shared/function/connect.php');
?>             

<?php
        $reponse = $maConnexion->query('SELECT F.nif_frs, F.nom, F.prenom, F.ville, F.pays, F.adresse FROM fournisseur F ORDER BY F.nif_frs ASC');
        $reponse1 = $maConnexion->query('SELECT S.code_service, S.libelle_service FROM service S ORDER BY S.code_service ASC');
        $reponse2 = $maConnexion->query('SELECT SC.code_section, SC.libelle_section FROM section SC ORDER BY SC.code_section ASC');

        $num_bon=$_GET["Modif"];
        $_POST['num_bon']=$num_bon;
        $reponse8 = $maConnexion->query("SELECT * FROM bon_engagement WHERE num_bon='$num_bon'");
           while ($affichages8 = $reponse8->fetch())
                {
?>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12"  style="padding-top: 25px;">
                          <div class="panel panel-default">
                            <div class="panel-heading" style="text-align: center; font-size: 20px;">
                                <b>APPLIQUEZ VOTRE MODIFICATION AU BON N°<?php echo $affichages8["num_bon"]; ?></b>
                            </div>
                            <div class="panel-body">
                                <form action="shared/function/update_bon.php" method="post">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Dépense :</label>
                                            <div class="col-md-8">
                                               <select class="form-control input-sm" name="depense" id="opt" name="depense" required="required">
                                                    <option>---------------------select---------------------</option>

                                                    <?php 
                                                    $id7=$affichages8['code_depense'];
                                                      $reponse7 = $maConnexion->query('SELECT * FROM depense ORDER BY code_depense ASC');
                                                      while ($affichages7 = $reponse7->fetch())
                                                        {
                                                     ?> 
                                                    <option value="<?php echo $affichages8['code_depense']?>" <?php if ($affichages7['code_depense']==$id7) echo "selected"; ?> > <?php echo $affichages7['libelle_depense']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Réglement :</label>
                                            <div class="col-md-8">
                                               <select class="form-control input-sm" name="reglement" id="opt" name="reglement" required="required">
                                                    <option>---------------------select---------------------</option>
                                                    <?php
                                                       $id6=$affichages8['code_reglement'];
                                                       $reponse6 = $maConnexion->query('SELECT * FROM reglement ORDER BY code_reglement ASC');
                                                       while ($affichages6 = $reponse6->fetch())
                                                        {
                                                     ?>
                                                    <option value="<?php echo $affichages8['code_reglement']?>" <?php if ($affichages6['code_reglement']==$id6) echo "selected"; ?> > <?php echo $affichages6['libelle_reglement']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nature de la dépense :</label>
                                               <div class="col-md-8">
                                                  <input type="text" value="<?php echo $affichages8["nature_depense"]; ?>" class="form-control input-sm" placeholder="Code Imputation" required="required" name="nature_depense">
                                              </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Réf - Piéces justificatives :</label>
                                               <div class="col-md-8">
                                                  <input type="text" value="<?php echo $affichages8["ref_piece"]; ?>" class="form-control input-sm" placeholder="Code Imputation" required="required" name="ref_piece">
                                              </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Programme:</label>
                                            <?php
                                                 $id9=$affichages8['code_programme'];
                                                 $reponse9 = $maConnexion->query('SELECT * FROM programme ORDER BY code_programme ASC');
                                                 $affichages9 = $reponse9->fetch();
                                             ?>
                                            <div class="col-md-3">
                                               <input type="text" name="code_programme" value="<?php echo $affichages8['code_programme']?>" <?php if ($affichages9['code_programme']==$id9) echo "selected"; ?> class="form-control input-sm" placeholder="Code">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                            <?php
                                                 $reponsejoin = $maConnexion->query('SELECT libelle_programme FROM programme,bon_engagement WHERE programme.code_programme = bon_engagement.code_programme ');
                                                 $affichagesjoin = $reponsejoin->fetch();
                                             ?>
                                            <div class="col-md-6">
                                               <input type="text" name="libelle_programme" value=" <?php echo $affichagesjoin['libelle_programme']; ?>" class="form-control input-sm" placeholder="Libellé">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Action  :</label>
                                            <?php
                                                 $id10=$affichages9['code_programme'];
                                                 $reponse10 = $maConnexion->query('SELECT * FROM action ORDER BY code_action ASC');
                                                 $affichages10 = $reponse10->fetch();
                                             ?>
                                            <div class="col-md-3">
                                               <input type="text" name="code_action" value="<?php echo $affichages10['code_action']?>" <?php if ($affichages10['code_programme']==$id10) echo "selected"; ?> class="form-control input-sm" placeholder="Code">
                                            </div>
                                            <div class="col-md-6">
                                               <input type="text" name="libelle_action" value=" <?php echo $affichages10['libelle_action']; ?>" class="form-control input-sm" placeholder="Libellé">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Activité :</label>
                                            <?php
                                                 $id11=$affichages10['code_action'];
                                                 $reponse11 = $maConnexion->query('SELECT * FROM activite ORDER BY code_activite ASC');
                                                 $affichages11 = $reponse11->fetch();
                                             ?>
                                            <div class="col-md-3">
                                               <input type="text" name="code_activite" value="<?php echo $affichages11['code_activite']?>" <?php if ($affichages11['code_action']==$id11) echo "selected"; ?> class="form-control input-sm" placeholder="Code">
                                            </div>
                                            <div class="col-md-6">
                                               <input type="text" name="libelle_activite" value=" <?php echo $affichages11['libelle_activite']; ?>" class="form-control input-sm" placeholder="Libellé">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tâche :</label>
                                            <?php
                                                 $id12=$affichages11['code_activite'];
                                                 $reponse12 = $maConnexion->query('SELECT * FROM tache ORDER BY code_tache ASC');
                                                 $affichages12 = $reponse12->fetch();
                                             ?>
                                            <div class="col-md-3">
                                               <input type="text" name="code_tache" value="<?php echo $affichages12['code_activite']?>" <?php if ($affichages12['code_activite']==$id12) echo "selected"; ?> class="form-control input-sm" placeholder="Code">
                                            </div>
                                            <div class="col-md-6">
                                               <input type="text" name="libelle_tache" value=" <?php echo $affichages12['libelle_tache']; ?>" class="form-control input-sm" placeholder="Libellé">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Compte :</label>
                                            <?php
                                                 $id13=$affichages8['code_compte'];
                                                 $reponse13 = $maConnexion->query('SELECT * FROM compte ORDER BY code_compte ASC');
                                                 $affichages13 = $reponse13->fetch();
                                             ?>
                                            <div class="col-md-3">
                                               <input type="text" name="code_compte" value="<?php echo $affichages8['code_compte']?>" <?php if ($affichages13['code_compte']==$id13) echo "selected"; ?> class="form-control input-sm" placeholder="Code">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                            <?php
                                                 $reponsejoin1 = $maConnexion->query('SELECT intitule, pu FROM compte,bon_engagement WHERE compte.code_compte = bon_engagement.code_compte ');
                                                 $affichagesjoin1 = $reponsejoin1->fetch();
                                             ?>
                                            <div class="col-md-6">
                                               <input type="text" name="intitule" value=" <?php echo $affichagesjoin1['intitule']; ?>" class="form-control input-sm" placeholder="Libellé">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Quntité :</label>
                                            <div class="col-md-3">
                                               <input type="text" id="quantite" name="quantite" value="<?php echo $affichages8["quantite"]; ?>" class="form-control input-sm" placeholder="Quntité.?">
                                            </div>
                                            <label class="col-md-2 control-label">Prix_U:</label>
                                            <div class="col-md-4">
                                               <input type="text" id="pu" name="pu" value=" <?php echo $affichagesjoin1['pu']; ?>" class="form-control input-sm" placeholder="Quel prix........?">
                                            </div>
                                            <?php
                                                  $reponse->closeCursor();
                                              ?>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Montant Total :</label>
                                            <div class="col-md-6">
                                               <input type="text" id="montant_total" name="montant_total" value="<?php echo $affichages8["montant_total"]; ?>" class="form-control input-sm" placeholder="Quel montant....................?" disabled="true">
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-8 control-label"><h4>REPUBLIQUE DU NIGER</h4></label>
                                            <div class="col-md-4">
                                               <select name="exercice" class="form-control input-sm">
                                                    <option value="">--gestion--</option>
                                                    <?php 
                                                       $id4=$affichages8['id_gestion'];
                                                       $reponse4 = $maConnexion->query('SELECT * FROM gestion G ORDER BY id_gestion ASC');
                                                       while ($affichages4 = $reponse4->fetch())
                                                        {
                                                     ?>
                                                    <option value="<?php echo $affichages8['id_gestion']?>" <?php if ($affichages4['id_gestion']==$id4) echo "selected"; ?> > <?php echo $affichages4['gestion']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">MINISTERE :</label>
                                            <div class="col-md-8">
                                               <select name="ministere" class="form-control input-sm">
                                                    <option>--------------------select-------------------------------------------------------------------</option>
                                                    <?php
                                                        $id2=$affichages8['code_section'];
                                                        $reponse2 = $maConnexion->query('SELECT SC.code_section, SC.libelle_section FROM section SC ORDER BY SC.code_section ASC');
                                                        while ($affichages2 = $reponse2->fetch())
                                                        {
                                                     ?>
                                                    <option value="<?php echo $affichages8['code_section']?>" <?php if ($affichages2['code_section']==$id2) echo "selected"; ?> > <?php echo $affichages2['libelle_section']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">SERVICE EMETTEUR :</label>
                                            <div class="col-md-8">
                                               <select name="service" class="form-control input-sm">
                                                    <option>--------------------select--------------------------------------------------------------------</option>
                                                    <?php
                                                        $id1=$affichages8['code_service'];
                                                        $reponse1 = $maConnexion->query('SELECT S.code_service, S.libelle_service FROM service S ORDER BY S.code_service ASC');
                                                        while ($affichages1 = $reponse1->fetch())
                                                        {
                                                     ?>
                                                    <option value="<?php echo $affichages8['code_service']?>" <?php if ($affichages1['code_service']==$id1) echo "selected"; ?> > <?php echo $affichages1['libelle_service']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Imputation :</label>
                                            <div class="col-md-8">
                                                 <input type="text" name="code_imputation" value="<?php echo $affichages8["code_imputation"]; ?>" class="form-control input-sm" placeholder="Code Imputation" required="required"> 
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Type bon :</label>
                                            <div class="col-md-6">
                                               <select name="type_bon" class="form-control input-sm">
                                                    <option>------------select---------------</option>
                                                    <?php
                                                     $id3=$affichages8['id_type'];
                                                     $reponse3 = $maConnexion->query('SELECT T.id_type, T.type FROM type_bon_engagement T ORDER BY T.id_type ASC');
                                                       while ($affichages3 = $reponse3->fetch())
                                                        {
                                                     ?>
                                                    <option value="<?php echo $affichages8['id_type']?>" <?php if ($affichages3['id_type']==$id3) echo "selected"; ?> > <?php echo $affichages3['type']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Crédits disponibles :</label>
                                            <div class="col-md-6">
                                               <input type="text" id="credit_disponible" name="credit_disponible" value="<?php echo $affichages8["credit_disponible"]; ?>" class="form-control input-sm" placeholder="Quel montant.................?" required="required">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Montant engagé :</label>
                                            <div class="col-md-6">
                                               <input type="text" id="montant_engage" name="montant_engage" value="<?php echo $affichages8["montant_engage"]; ?>" class="form-control input-sm" placeholder="Quel montant.................?" required="required" disabled="true">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Disponible aprés :</label>
                                            <div class="col-md-6">
                                               <input type="text" id="disponible_apres" name="disponible_apres" value="<?php echo $affichages8["disponible_apres"]; ?>" class="form-control input-sm" placeholder="Quel montant.................?" required="required" disabled="true">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Fournisseur :</label>
                                            <div class="col-md-6">
                                                 <select name="nif_frs" class="form-control input-sm">
                                                    <option value="">NIF_Frs / Matricule</option>
                                                    <?php
                                                     $id5=$affichages8['nif_frs'];
                                                      $reponse5 = $maConnexion->query('SELECT F.nif_frs, F.nom, F.prenom, F.ville, F.pays, F.adresse FROM fournisseur F ORDER BY F.nif_frs ASC');
                                                       while ($affichages5 = $reponse5->fetch())
                                                        {
                                                     ?>
                                                    <option value="<?php echo $affichages8['nif_frs']?>" <?php if ($affichages5['nif_frs']==$id5) echo "selected"; ?> > <?php echo $affichages5['nif_frs']; ?> </option>
                                                    <?php
                                                        }
                                                      $reponse->closeCursor();
                                                    ?>
                                               </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Date du bon :</label>
                                            <div class="col-md-6">
                                               <input type="date" value="<?php echo $affichages8["date_bon"]; ?>" name="num_bon" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                              <?php 
                                    }
                                ?>
                             <div class="panel-footer">
                               <div style="text-align: center; ">
                                 <a href="liste_engagement.php"><button type="button" class="btn btn-default"> Annuler</button></a>
                                 <button type="submit" id="action" name="action" class="btn btn-info"><i class="fa fa-save fa-fw"></i> Modifier</button>
                              </div>
                              </form>
                             </div>
                                 
                             </div> 
                         </div>       
                        </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
     include('shared/partials/footer.php');
?> 
