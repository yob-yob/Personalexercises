<?php include('../../controller/form.php');?>
<?php 

    if(isset($_POST['btnSubmit']) && isset($_POST['gender']))
    {
        
        $form = new form(
                [
                    'fname'     => $_POST['fname'],
                    'lname'     => $_POST['lname'],
                    'Address'   => $_POST['Address'],
                    'email'     => $_POST['email'],
                    'gender'    => $_POST['gender'],
                    'uname'     => $_POST['uname'],
                    'pass'      => $_POST['pass'],
                    'cpass'     => $_POST['cpass']
                ]
            );

        $form->validate(
                [
                    'fname'   => ['required','+max-20','+min-3','noSpcChr'],
                    'lname'   => ['required','+max-20','+min-2','noSpcChr'],
                    'Address' => ['required','+min-10'],
                    'email'   => ['required','email'],
                    'gender'  => ['required'],
                    'uname'   => ['required','+max-15','+min-6','noSpcChr','noSpace'],
                    'pass'    => ['required','+max-20','+min-6','strength'],
                    'cpass'   => ['required','+max-20','+min-6','+sameWith-pass']
                ]
            );
    }

    



?>

<html>
    <head>
        <title>Exercise | two</title>
        <link rel="stylesheet" href="./../../public/css/bootstrap.css">
        <link rel="stylesheet" href="./../../public/css/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="./public/css/app.css">
    </head>
    <body>


        <button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#exampleModal">
            Thoughts 
        </button>
        <a type="button" class="btn btn-primary m-4 text-white" href="./usingAjax">Using Ajax</a>


        <div class="d-flex justify-content-around">
            <div class="card mt-4" style="width: 30rem; ">
                <div class="card-body">
                    <h4 class="card-title text-center">Registration Form</h4>
                </div>
                <form method="POST" action="" class="card-body">
                    <!--firstname-->
                    <div class="input-group input-group-lg mb-3">
                        <span 
                                <?php
                                    if(isset($form) && !empty($form->validation_errors['fname'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['fname'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                                ?>
                        ><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Firstname" name="fname" value="<?php if(isset($form)){echo $form->fields['fname'];}?>">
                    </div>

                    
                    <!--lastname-->
                    <div class="input-group input-group-lg mb-3">
                        <span 
                            <?php
                                    if(isset($form) && !empty($form->validation_errors['lname'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['lname'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                            ?>
                                    ><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Lastname" name="lname" value="<?php if(isset($form)){echo $form->fields['lname'];}?>">
                    </div>
                    <!--Address-->
                    <div class="input-group input-group-lg mb-3">
                        <span 
                            <?php
                                    if(isset($form) && !empty($form->validation_errors['Address'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['Address'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                            ?>
                            ><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Address" name="Address" value="<?php if(isset($form)){echo $form->fields['Address'];}?>">
                    </div>
                    <!--email-->
                    <div class="input-group input-group-lg mb-3">
                        <span 
                            <?php
                                    if(isset($form) && !empty($form->validation_errors['email'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['email'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                            ?>
                        ><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if(isset($form)){echo $form->fields['email'];}?>">
                    </div>
                    <!--gender-->
                    <div class="d-flex form-check justify-content-around mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    <?php 
                                    
                                        if(isset($form) && isset($_POST['btnSubmit'])){
                                            if($form->fields["gender"] == "male"){
                                                    echo "checked='checked'";
                                            }
                                        }

                                    ?>
                            type="radio" name="gender" id="g_male" value="male"> <i class="fa fa-male" aria-hidden="true"></i> Male
                        </label>
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    <?php 
                                            
                                        if(isset($form) && isset($_POST['btnSubmit'])){
                                            if($form->fields["gender"] == "female"){
                                                    echo "checked='checked'";
                                            }
                                        }

                                    ?>
                            type="radio" name="gender" id="g_fmale" value="female"> <i class="fa fa-female" aria-hidden="true"></i> Female
                        </label>
                    </div>
                    <!--username-->
                    <div class="input-group input-group-lg mb-3">
                        <span 
                            <?php
                                    if(isset($form) && !empty($form->validation_errors['uname'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['uname'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                            ?>
                        ><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="uname" value="<?php if(isset($form)){echo $form->fields['uname'];}?>">
                    </div>
                    <!--password-->
                    <div class="input-group input-group-lg mb-3">
                        <span
                            <?php
                                    if(isset($form) && !empty($form->validation_errors['pass'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['pass'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                            ?>
                        ><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                    </div>
                    <!--confirm password-->
                    <div class="input-group input-group-lg mb-3">
                        <span 
                            <?php
                                    if(isset($form) && !empty($form->validation_errors['cpass'])){
                                        echo "
                                        class='input-group-addon bg-danger text-white'
                                        data-html='true' 
                                        data-container='body'
                                        data-toggle='popover'
                                        data-placement='left' 
                                        title='<b>Error</b> '
                                        ";
                                        echo "data-content="."'
                                                <ul style=".'"margin:20px; padding:0px;"'.">";
                                                foreach($form->validation_errors['cpass'] as $key => $value){
                                                    echo "<li>$value</li>";
                                                }

                                        echo "</ul>'";
                                    }else{
                                        echo "class='input-group-addon'";
                                    }
                            ?>
                        ><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                    </div>
                    <!--submit button-->
                    <div class="d-flex justify-content-around">
                        <button type="submit" name="btnSubmit"class="btn btn-primary">Submit</button>
                        <button type="button" onclick="clearForm()"name="btnSubmit"class="btn btn-primary">Clear</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thoughts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            This is one of my most treasured projects, 
                            it's because I have learned so much from it.
                            it really pushes me to create my own Dynamic Form Validation
                            and now I could re-use this Form Validation code for all of my project
                            that needs Validation. It may not be that perfectly made but if you
                            think about it, I'm still 19 years old and a 3rd year college-level student.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <?php 

            if(isset($form) && isset($_POST['btnSubmit'])){
                $haserror = false;
                foreach($form->validation_errors as $key => $value){
                    if(!empty($form->validation_errors[$key])){
                        $haserror = true;
                        break;
                    }
                }
                if(!$haserror){
                    echo "<script>alert('User successfully registered!');</script>";
                }
            }

        ?>

        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="./public/js/app.js" ></script>
    </body>
</html>