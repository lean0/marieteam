
<!-- register -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">S'inscrire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>




            <div class="modal-body">
                <form action="createuser.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nom</label>
                        <input type="text" value="<?=@$_POST['nom'] ?>" class="form-control" placeholder=" " name="nom" id="nom" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Prenom</label>
                        <input type="text" value="<?=@$_POST['prenom'] ?>"  class="form-control" placeholder=" " name="prenom" id="prenom" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" value="<?=@$_POST['mail'] ?>"  class="form-control" placeholder=" " name="mail" id="mail" required="">
                    </div>
                    <div class="form-group">
                        <label for="password1" class="col-form-label">Mot de passe</label>
                        <input type="password"  value="<?=@$_POST['password'] ?>" class="form-control" placeholder=" " name="password" id="password" required="">
                    </div>
                    <div class="form-group">
                        <label for="password2" class="col-form-label">Confirmation</label>
                        <input type="password" class="form-control" placeholder=" " name="cpassword" id="cpassword" required="">
                    </div>
                    <div class="sub-w3l">
                        <div class="sub-agile">
                            <input type="checkbox" id="brand2" value="">
                            <label for="brand2" class="mb-3">
                                <span></span> J'accepte les Termes & Conditions</label>
                        </div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control serv_bottom" value="Register">
                    </div>
                </form>
            </div>




        </div>
    </div>
</div>
<!-- // register -->
