<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container mt-3 bg-light bg-gradient border py-5 px-5 w-100">
            <h1 class="text-center">Settings</h1>
        <br>
        <span class="text-danger ml-2">
        <?php if (!empty($data['empty_forms_err'])) echo $data['empty_forms_err'];?>
        </span>
            <form action="/settings/add" method="post"style="border: 1px solid black; padding: 5px;">
                <div class="row">
                    <div class="col-md">

                        <div class="border py-2">
                            ADD NEW SPECIALIZATION <br>
                            <input type="text" name="specialization" id=""placeholder="ex: Theraupetics">
                        </div>
                        <div class="border py-2">
                        ADD NEW COUNTRY <br>
                        <input type="number" name="code_of_country" id=""placeholder="code of country"value="<?php if (!empty($data['code_of_country'])) echo $data['code_of_country'];?>">
                        <span class="text-danger ml-2"><br>
                <?php if (!empty($data['code_of_country_err'])) echo $data['code_of_country_err'];?><br>
                </span>
                        <input type="text" name="name_of_country" id=""placeholder="name of country"value="<?php if (!empty($data['name_of_country'])) echo $data['name_of_country'];?>">
                        <span class="text-danger ml-2">
                        <?php if (!empty($data['name_of_country_err'])) echo $data['name_of_country_err'];?>
                        </span>
                        </div>
                        <div class="border py-2">
                            ADD NEW DOCTOR
                            <div class="col-md-6">NAME
                                <input type="text" name="name" id="" value="<?php if (!empty($_POST['name'])) echo $_POST['name'];?>"><span class="text-danger ml-2"><br><?php if (!empty($data['name_err'])) echo $data['name_err'];?></span>
                            </div>
                            <div class="col-md-6">
                                SURNAME
                                <input type="text" name="surname" id="" value="<?php if (!empty($_POST['surname'])) echo $_POST['surname'];?>"><span class="text-danger ml-2"><br>
                <?php if (!empty($data['surname_err'])) echo $data['surname_err'];?>
                </span><br>
                            GENDER
                            <select name="gender" id="">
                                <option value=""></option>


                                <option value="male" <?php
                                if (!empty($_POST['gender']) && 'male' == $_POST['gender'])
                                {
                                    echo 'selected';
                                }
                                ?>>MALE</option>
                                <option value="female"
                                    <?php
                                    if (!empty($_POST['gender']) && 'female' == $_POST['gender'])
                                    {
                                        echo 'selected';
                                    }
                                    ?>>FEMALE</option><br>
                            </select><br>

                                <span class="text-danger ml-2">
                                <?php if (!empty($data['gender_err'])) echo $data['gender_err'];?>
                                </span>
                                <br>
                            SPECIALIZATION
                            <select name="specializations" id="">
                                <option value=""></option>
                                <?php
                                foreach($data['specializations'] as $spec)
                                {
                                    echo '<option value="'. $spec->id_specialization.'"';
                                    if (!empty($_POST['specializations']) && $spec->id_specialization == $_POST['specializations'])
                                    {
                                        echo 'selected';
                                    }
                                    echo '>' .$spec->name  .'</option>';
                                }
                                ;
                                ?>
                            </select><br>
                                <span class="text-danger ml-2">
                                <?php if (!empty($data['specializations_err'])) echo $data['specializations_err'];?>
                                </span>
                        </div>
                        </div>

                <button class="badge-primary text-wrap">CHANGE</button>

            </form>
        <?php flash('post_message'); ?>


        </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>