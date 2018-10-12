<!--    Form for Add, Edit and View Administrator details-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- Form Administrator -->
                <form name="f" method="post" action="<?php echo $this->data['actionLink']?>" enctype="multipart/form-data">
                    <!-- Title -->
                    <h3 class="text-center default-text py-3"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $this->title; ?></h3>
                    <!-- Name Input -->
                    <div class="form-group row inp">
                        <!-- label name -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-user"></i> Name</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- check if administrator don't have permission to add/edit value input readonly
                                 if have permission add value empty
                                 if have permission edit value is set                                           -->
                            <input type="text" name="administrator_name" class="form-control-plaintext" <?php if(isset($this->data['readonly'])) echo 'readonly'?>
                                   value="<?php if(!empty($this->data['addedit']['administrator_name'])) echo $this->data['addedit']['administrator_name'];?>" placeholder="Administrator Name">
                        </div>
                    </div>
                    <!-- Phone Input -->
                    <div class="form-group row inp">
                        <!-- label Phone -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-phone-square"></i> Phone</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- check if administrator don't have permission to add/edit value input readonly
                                 if have permission add value empty
                                 if have permission edit value is set                                           -->
                            <input type="text" name="administrator_phone" class="form-control-plaintext" <?php if(isset($this->data['readonly'])) echo 'readonly'?>
                                   value="<?php if(!empty($this->data['addedit']['administrator_phone'])) echo $this->data['addedit']['administrator_phone'];?>" placeholder="054444444 or +9725444444">
                        </div>
                    </div>
                    <!-- Email Input -->
                    <div class="form-group row inp">
                        <!-- label Email -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-envelope"></i> Email</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- check if administrator don't have permission to add/edit value input readonly
                            if have permission add value empty
                            if have permission edit value is set                                           -->
                            <input type="email" name="administrator_email" class="form-control-plaintext"<?php if(isset($this->data['readonly'])) echo 'readonly'?>
                                   value="<?php if(!empty($this->data['addedit']['administrator_email'])) echo $this->data['addedit']['administrator_email'];?>" placeholder="example@email.com">
                        </div>
                    </div>
                    <!-- Password Input -->
                    <div class="form-group row inp">
                        <!-- label Password -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-key"></i> Password</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- check if administrator don't have permission to add/edit value input readonly
                            if have permission add value empty
                            if have permission edit value is set empty                                          -->
                            <input type="password" name="administrator_password" class="form-control-plaintext" <?php if(isset($this->data['readonly'])) echo 'readonly'?> value="<?php if(!empty($this->data['create']['password'])) echo $this->data['create']['password']; ?>" placeholder="************">
                        </div>
                    </div>
                    <!-- Role Selection -->
                    <div class="form-group row inp">
                        <!-- label Role -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-male"></i> Role</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <select name="administrator_role" class="form-control-plaintext">
                                <?php
                                    // create administrator choose role
                                    if($this->data['action'] == 'create'){
                                        // role that can owner choose
                                        if(Session::logged()['role'] == 'owner')
                                        {
                                            echo "<option value=\"empty\">Select Role</option>";
                                            echo "<option value=\"manager\">Manager</option>";
                                            echo "<option value=\"sale\">Sale</option>";
                                        }
                                        // role that can manager choose
                                        else if(Session::logged()['role'] == 'manager'){
                                            echo "<option value=\"empty\">Select Role</option>";
                                            echo "<option value=\"sale\">Sale</option>";
                                        }
                                    }
                                    // edit administrator choose role
                                    else if($this->data['action'] == 'edit'){
                                        // if owner, can't change his role
                                        if(Session::logged()['role'] == 'owner' && $this->data['addedit']['administrator_role'] == 'owner'){
                                            echo "<option value=\"owner\">Owner</option>";
                                        }
                                        // owner can change role for manager
                                        else if(Session::logged()['role'] == 'owner' && $this->data['addedit']['administrator_role'] == 'manager'){
                                            echo "<option value=\"manager\">Manager</option>";
                                            echo "<option value=\"sale\">Sales</option>";
                                        }
                                        // owner can change role for sale
                                        else if(Session::logged()['role'] == 'owner' && $this->data['addedit']['administrator_role'] == 'sale'){
                                            echo "<option value=\"sale\">Sales</option>";
                                            echo "<option value=\"manager\">Manager</option>";
                                        }
                                        // manager can't change his role or another managers
                                        else if(Session::logged()['role'] == 'manager' && $this->data['addedit']['administrator_role'] == 'manager'){
                                            echo "<option value=\"manager\">Manager</option>";
                                        }
                                        // manager can not change sale role
                                        else if(Session::logged()['role'] == 'manager' && $this->data['addedit']['administrator_role'] == 'sale'){
                                            echo "<option value=\"sale\">Sale</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row inp">
                        <!-- label Image -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-image"></i> Image</label></div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <?php if(isset($this->data['addedit'])){
                                if(empty($this->data['addedit']['administrator_img'])){
                                    // Administrator don't have image preview default image.
                                    echo "<img class='image'  src=\"images/noavatar.png\">";
                                }else{
                                    // Administrator upload image.
                                    echo "<img class='image'  src=\"/theschool/uploads/" . $this->data['addedit']['administrator_img'] . "\">";
                                }
                            }
                            //  default preview of image.
                            else{
                                echo "<img class='image'  src=\"images/noavatar.png\">";
                            }
                            // if Administrator can't change profile details choose image disable.
                             if(!isset($this->data['readonly'])){
                                 echo "<input type=\"file\" name=\"file\" class=\"form-control-file file\">
                                            <label class=\"redCtr\">Max size of image must be 5MB and format support jpg, png, jpeg,
                                            gif.</label>
                                            <span class=\"imgErrors\"></span>";
                             }
                            ?>
                        </div>
                    </div>
                    <!-- Errors divs -->
                    <!-- Error div for image resolution -->
                    <div class="errorImageResolution foot"></div>
                    <!-- All inputs end image errors -->
                    <div class="error">
                        <?php if(isset($this->data['err'])) echo "<p class='error'>{$this->data['err']}</p>" ?>
                    </div>
                    <!-- Buttons Create/Edit Delete -->
                    <div class="foot">
                    <?php
                        if(!isset($this->data['readonly'])){
                        // edit button
                        if(isset($this->data['addedit']['administrator_id']) == Session::logged()['id'] || Session::logged()['role'] == 'owner' || Session::logged()['role'] == 'manager'){
                            echo "<button type=\"button\" name=\"btnSubmit\"";
                            echo "class=\"btn btn-default btnSave btnSubmit\" value=\"{$this->data['btn']}\" >";
                            echo($this->data['btn']);
                            echo '</button>';
                        }
                    }
                        // delete button
                        if($this->data['action'] == 'edit')
                        {
                            // owner can delete everyone but not himself, manager can delete only sale
                            if((Session::logged()['role'] == 'owner' && $this->data['addedit']['administrator_role'] != 'owner') || (Session::logged()['role'] == 'manager' && $this->data['addedit']['administrator_role'] == 'sale') ){
                                echo "<button type=\"button\" data=\"{$this->data['addedit']['administrator_id']}\" name=\"btnDelete\" class=\"btn btn-default btnSubmit btnDelete\">Delete</button>";
                            }
                        }
                    ?>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>