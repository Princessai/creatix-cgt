
<?php require_once(__DIR__ . '/dashboard-header.php') ?>

<div class="col-sm-9" id="">
                <div class="cont">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-12">
                            <form action="" method="POST" class="ajout-form">
                                    <h4 style="text-align: start ;">AJOUTER UN ARTICLE</h4>
                                    <input type="text" placeholder="titre" name="titre">
                                    <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea><br>
                                    <input type="file" name="image" id="image"><br>
                                    <input type="submit" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>dashboard.php
            
<?php require_once(__DIR__ . '/dashboard-footer.php');?>