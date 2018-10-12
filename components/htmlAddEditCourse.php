<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- Add/Edit Form -->
                <form name="f" method="post" action="<?php echo $this->data['actionLink']?>" enctype="multipart/form-data">
                    <!-- title -->
                    <h3 class="text-center default-text py-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->title; ?></h3>
                    <!-- input name block -->
                    <div class="form-group row inp">
                        <!-- label name -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-user"></i>  Name</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <input type="text" name="course_name" class="form-control-plaintext" value="<?php if(!empty($this->data['create']['course_name'])) echo $this->data['create']['course_name'];?>" placeholder="Course Name">
                        </div>
                    </div>
                    <!-- input description block -->
                    <div class="form-group row inp">
                        <!-- label description -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-align-justify"></i> Description</label></div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <textarea class="form-control" name="course_description" placeholder="Description"><?php if(!empty($this->data['create']['course_description'])) echo $this->data['create']['course_description'];?></textarea>
                        </div>
                    </div>
                    <!-- input image block -->
                    <div class="form-group row inp">
                        <!-- label image -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-image"></i>Image</label></div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <!-- display preview image -->
                            <?php if(isset($this->data['create'])){
                                if($this->data['create']['course_img'] == ''){
                                    //display default course image.
                                    echo "<img class='image' src=\"images/nocourse.png\">";
                                }else{
                                    //display course image.
                                    echo "<img class='image' src=\"/theschool/uploads/" . $this->data['create']['course_img'] . "\">";
                                }
                            }else{
                                //display default course image.
                                echo "<img class='image' src=\"images/nocourse.png\">";
                            }
                            ?>
                            <!-- input image -->
                            <input type="file" name="file" class="form-control-file file">
                            <label class="redCtr">Max image size 5MB and format support jpg, png, jpeg, gif.</label>
                            <!-- error resolution -->
                            <span class="imgErrors"></span>
                        </div>
                    </div>
                    <!-- display registered students for this course -->
                    <div class="foot">
                        <?php
                            if(empty($this->data['btn'] == 'Create')){
                                $totalStudents = $courseModel->getSumAllStudentsOfCourse($this->data['create']['course_id']);
                                if($totalStudents){
                                    //display total sum students registered for this course.
                                    echo "<p>Total: {$totalStudents['sum']} students taking this course</p>";
                                }else{
                                    //display 0 students registered for this course.
                                    echo "<p>Total: 0 students taking this course</p>";
                                }
                            }
                            ?>
                    </div>
                    <!-- errors block -->
                    <div class="error"> <?php if(isset($this->data['err'])) echo "<p class='error'>{$this->data['err']}</p>" ?></div>
                    <!-- button edit course -->
                    <div class="foot">
                    <button type="button" value="<?php echo($this->data['btn']);?>" class="btn btn-default btnAddEditCourse"><?php echo($this->data['btn']);?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>