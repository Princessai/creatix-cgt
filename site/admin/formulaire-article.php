
<?php require_once(__DIR__ . '/dashboard-header.php') ?>

<div class="col-sm-9" id="">
                <div class="cont">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="" method="POST" class="ajout-form">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">TITRE</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label"> IMAGE
                                        </label> <br>
                                        <input type="file">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-secondary mb-3">AJOUTER</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>dashboard.php
            
<?php require_once(__DIR__ . '/dashboard-footer.php');?>