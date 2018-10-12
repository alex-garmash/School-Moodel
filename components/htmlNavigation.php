<nav>
    <div class="container-fluid">
        <div class="row ">
            <nav>
                <ul class="navi">
                    <!-- button logo home page-->
                    <li><a href="<?php echo '/'.ROOT?>"><img src="images/logo.png"></a></li>
                    <?php
                        //if user logged show user details.
                    if (!empty(Session::logged())) {
                        //details for owner.
                        if (Session::logged()['role'] == 'owner') {
                            //link to school page.
                            echo '<li><a href="school"><i class="fa fa-home" aria-hidden="true"></i> School</a> </li>';
                            //link to administrator page.
                            echo '<li><a href="administration"><i class="fa fa-cog" aria-hidden="true"></i> Administration</a> </li>';
                            if(Session::logged()['image'] == ''){
                                //display default image.
                                echo "<li><span>".Session::logged()['name'].' , '.Session::logged()['role'].' '."</span><img class='image' src=\"images/noavatar.png\"><br>"."<a href='logout'>logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>";
                            }else{
                                //display administrator image.
                                echo "<li><span>".Session::logged()['name'].' , '.Session::logged()['role'].' '."</span><img class='image' src=\"/theschool/uploads/".Session::logged()['image']."\"><br>"."<a href='logout'>logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>";
                            }
                        }
                        //details for manager.
                        else if (Session::logged()['role'] == 'manager') {
                            //link to school page.
                            echo '<li><a href="school"><i class="fa fa-home" aria-hidden="true"></i> School</a> </li>';
                            //link to administrator page.
                            echo '<li><a href="administration"><i class="fa fa-cog" aria-hidden="true"></i> Administration</a> </li>';
                            if(Session::logged()['image'] == ''){
                                //display default image.
                                echo "<li>" . Session::logged()['name'].' , '.Session::logged()['role'].' '."<img class='image' src=\"images/noavatar.png".Session::logged()['image']."\"><br>"."<a href='logout'>logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>";
                            }else{
                                //display administrator image.
                                echo "<li>" . Session::logged()['name'].' , '.Session::logged()['role'].' '."<img class='image' src=\"/theschool/uploads/".Session::logged()['image']."\"><br>"."<a href='logout'>logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>";
                            }
                        }
                        //details for sale.
                        else if (Session::logged()['role'] == 'sale'){
                            //link to school page.
                            echo '<li><a href="school"><i class="fa fa-home" aria-hidden="true"></i> School</a> </li>';
                            if(Session::logged()['image'] == ''){
                                //display default image.
                                echo "<li>" . Session::logged()['name'].' , '.Session::logged()['role'].' '."<img class='image' src=\"images/noavatar.png\"><br>"."<a href='logout'>logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>";
                            }else{
                                //display administrator image.
                                echo "<li>" . Session::logged()['name'].' , '.Session::logged()['role'].' '."<img class='image' src=\"/theschool/uploads/".Session::logged()['image']."\"><br>"."<a href='logout'>logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>";
                            }
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</nav>



