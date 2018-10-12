<?php $administratorModel = new administratorModel(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <!-- button add new administrator -->
            <div class="title">Administrators<button type="button" class="btn btn-default btnAddAdmin"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
            <!-- left container with list of administrators -->
            <div class="ctrAdmin col-sm-12">
                <!-- list of administrators -->
                <ul class="list-group">
                       <?php
                           $list = null;
                           switch(Session::logged()['role']){
                               case 'manager':
                                   // get list of all administrators without owner.
                                   $list =$administratorModel->listOfAdministratorsWithoutOwner();
                                   break;
                               case 'owner':
                                   // get list of all administrators.
                                   $list = $administratorModel->listOfAdministrators();
                                   break;
                               default:
                                   $list = null;
                                   break;
                           }

                           // dump list of administrators.
                           $size = count($list);
                           for($i = 0; $i < $size; $i++){
                              echo "<li data=\"{$list[$i]['administrator_id']}\" class=\"list-group-item adminList\">";
                              if($list[$i]['administrator_img'] == ''){
                                  // administrator don't have image preview default image.
                                  echo "<img src=\"images/noavatar.png\">".'</img>';
                              }else{
                                  //display administrator image.
                                  echo "<img src=\"uploads/{$list[$i]['administrator_img']}\">".'</img>';
                              }
                              //dump administrator data.
                              echo '<p><i class="fa fa-user-circle"></i>'.'  '.$list[$i]['administrator_name'].'</p>';
                              echo '<p><i class="fa fa-at"></i>'.'  '.$list[$i]['administrator_email'].'</p>';
                              echo '<p><i class="fa fa-mobile"></i>'.'  '.$list[$i]['administrator_phone'].'</p>';
                              echo '<p><i class="fa fa-registered"></i>'.'  '.$list[$i]['administrator_role'].'</p>';
                              echo '</li>';
                          }
                       ?>
                </ul>
            </div>
        </div>
        <!-- add/edit/view administrator right container -->
        <div class="col-md-7">
            <div class="ctrAdministration">
                <?php
                    switch($this->data['page']){
                        case 'create':
                            // create new administrator.
                            require_once "htmlAddEditAdministrator.php";
                        case 'edit':
                            // edit administrator.
                            require_once "htmlAddEditAdministrator.php";
                            break;
                        default:
                            if(Session::logged()['role'] == 'owner'){
                                // owner logged dump sum total administrators including owner.
                                echo "<h1>Total Administrators: " . $administratorModel->countAdministrators()['count'] . "</h1>";
                            }else{
                                // manager logged dump sum total administrators without including owner.
                                echo "<h1>Total Administrators: " . ($administratorModel->countAdministrators()['count'] - 1) . "</h1>";
                            }
                            break;
                    }
                ?>
            </div>
        </div>
    </div>
</div>