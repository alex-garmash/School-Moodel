<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-lg-offset-4 col-md-offset-4">
            <div class="card">
                <div class="card-body">
                    <!-- Login Form -->
                    <form name="f" method="post" action="#">
                        <!-- title -->
                        <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Login</h3>
                        <!-- input email block -->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="email" name="userEmail" class="form-control"
                                   <?php
                                   //get or set email input to login form.
                                   if(isset($this->data['email'])) {
                                       echo "value='{$this->data['email']}'";
                                   } else {
                                       echo "value=''";
                                   }
                                   ?>required placeholder="example@gmail.com">
                        </div>
                        <!-- input password block -->
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" name="userPwd"
                                   class="form-control" <?php
                                //get or set input password to login form.
                            if(isset($this->data['pwd'])) {
                                echo "value='{$this->data['pwd']}''";
                            } else {
                                echo "value=''";
                            } ?>
                                   required placeholder="Your password">
                        </div>
                        <div class="text-center">
                            <!-- button submit form -->
                            <button type="button" name="btrSubmit" class="btn btn-default waves-effect waves-light btrSubmit">Login</button>
                            <!-- errors block -->
                            <p class='error'><?php if (isset($this->data['err'])) echo "{$this->data['err']}" ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>