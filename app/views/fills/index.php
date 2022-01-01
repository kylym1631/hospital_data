<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container bg-light bg-gradient border py-5 px-5 w-50">
    <h1 class="text-center">Fill patient info</h1>
    <form method="post" action="/fills/add">
        <div class="row">
            <div class="col-md-6">PATIENT NAME
                <input type="text" name="name" id="" value="<?php if (!empty($_POST['name'])) echo $_POST['name'];?>"><span class="text-danger ml-2">*<br><?php if (!empty($data['name_err'])) echo $data['name_err'];?></span>
            </div>
            <div class="col-md-6">
                PATIENT SURNAME
                <input type="text" name="surname" id="" value="<?php if (!empty($_POST['surname'])) echo $_POST['surname'];?>"><span class="text-danger ml-2">*<br>
                <?php if (!empty($data['surname_err'])) echo $data['surname_err'];?>
                </span>
            </div>

            <div class="col-md-6" style=" padding: 5px;">
            COUNTRY
             <select name="country" id="">
                 <option value=""></option>
                    <?php
                    foreach($data['countries'] as $country)
                    {
                        echo '<option value="'. $country->id_country.'"';
                         if (!empty($_POST['country']) && $country->id_country == $_POST['country'])
                         {
                             echo 'selected';
                         }
                        echo '>(+'.$country->code_of_country.') '. $country->name_of_country .'</option>';
                    }
                    ;
                    ?>

                  </select>
                <br>

            </div>
            <div class="col-md-6">
                PESEL
                <input type="number" name="pesel" id="" placeholder="ex: 12345678">
            </div>



            <div class="col-md-6">
                EMAIL
                <input type="email" name="email" id=""placeholder="ex: example@gmail.com"value="<?php if (!empty($_POST['email'])) echo $_POST['email'];?>">
                <br>
                <br>
                PHONE
                <input type="number" name="phone" id=""placeholder="ex: 510123456" value="<?php if (!empty($_POST['phone'])) echo $_POST['phone'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['phone_err'])) echo $data['phone_err'];?></span>
                <br>
                <br>
                GENDER
                <select name="gender" id=""required>
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
                        ?>>FEMALE</option>
                </select><span class="text-danger ml-2">*</span>
            </div>
            <?php

            ;?>
            <div class="col-md-6" style="border: 1px solid black; padding: 5px;">
                ADDRESS <br>
                ZIPCODE
                <input type="text" name="zip_code" id=""placeholder="ex: 02-792"value="<?php if (!empty($_POST['zip_code'])) echo $_POST['zip_code'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['zip_code_err'])) echo $data['zip_code_err'];?></span>
                <br>
                CITY
                <input type="text" name="city" id=""placeholder="ex: Warsaw"value="<?php if (!empty($_POST['city'])) echo $_POST['city'];?>"><br>
                STREET
                <input type="text" name="street" id=""placeholder="ex: Stoklosy"value="<?php if (!empty($_POST['street'])) echo $_POST['street'];?>"><br>

            </div>
        </div>
        <hr>
        <div class="row">



            <div class="col-md-6"style="border: 1px solid black; padding: 5px;">
                DISEASE <br>
                NAME: <input type="text" name="disease_name" id=""placeholder="ex: cancer"value="<?php if (!empty($_POST['disease_name'])) echo $_POST['disease_name'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['disease_name_err'])) echo $data['disease_name_err'];?></span>
                <br>
                PERIOD OF DISEASE: <input type="text" name="disease_period" id=""placeholder="ex: 3 months"value="<?php if (!empty($_POST['disease_period'])) echo $_POST['disease_period'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['disease_period_err'])) echo $data['disease_period_err'];?></span>

                <br>
                DISEASE TREATMENT START: <input type="date" name="disease_treatment_start" id=""value="<?php if (!empty($_POST['disease_treatment_start'])) echo $_POST['disease_treatment_start'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['disease_treatment_start_err'])) echo $data['disease_treatment_start_err'];?></span>
                <br>
                DISEASE TREATMENT END: <input type="date" name="disease_treatment_end" id=""value="<?php if (!empty($_POST['disease_treatment_end'])) echo $_POST['disease_treatment_end'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['disease_treatment_end_err'])) echo $data['disease_treatment_end_err'];?></span>
                <br>

            </div>
            <div class="col-md-6">
                INSURANCE
                <input type="number" name="insurance" id=""placeholder="ex: 12345678" value="<?php if (!empty($_POST['insurance'])) echo $_POST['insurance'];?>"><br>
                <span class="text-danger ml-2"><?php if (!empty($data['insurance_err'])) echo $data['insurance_err'];?></span>
                <br>
                TYPE OF MED. SERVICE
                <input type="text" name="toms" id="" placeholder="ex: MRI"  value="<?php if (!empty($_POST['toms'])) echo $_POST['toms'];?>" required>
                <span class="text-danger ml-2">*</span>
                <br>
                <br>
                DEPARTMENT
                <input type="text" name="department" id=""placeholder="ex: ONCOLOGY"value="<?php if (!empty($_POST['department'])) echo $_POST['department'];?>" required>
                <span class="text-danger ml-2">*<?php if (!empty($data['department_err'])) echo $data['department_err'];?></span>
                <br>
                <br>
                CHAMBER
                <input type="number" name="chamber" placeholder="ex: 32" value="<?php if (!empty($data['chamber'])) echo $data['chamber'];?>" required>
                <span class="text-danger ml-2">*</span>
                <br>
                <br>
                BERTH
                <input type="number" name="berth" placeholder="ex: 2" value="<?php if (!empty($data['berth'])) echo $data['berth'];?>" >


            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-6"style="border: 1px solid black; padding: 5px;">
                ARRIVAL TIME
                <input type="date" name="arrival_time" id=""placeholder="ex: "><br><br>
                CHECKED OUT
                <input type="date" name="date_checked_out" id=""placeholder="ex: "><br><br>
                INDICATION
                <input type="text" name="indication" id=""placeholder="ex: "><br><br>
                DOCTOR
                <select name="doctor" id="" required>
                    <option value=""></option>
                    <?php
                    ($data['doctors']);

                    foreach($data['doctors'] as $doctor)
                    {
                        echo '<option value="'. $doctor->id_doctor.'"';
                        if (!empty($_POST['doctor']) && $doctor->id_doctor == $_POST['doctor'])
                        {
                            echo 'selected';
                        }
                        echo '>'.$doctor->name.'</option>';
                    }
                    ?>

                </select><span class="text-danger ml-2">*
                <br><?php if (!empty($data['doctor_err'])) echo $data['doctor_err'];?></span>
                <br>
            </div>
            <div class="col-md-6"></div>
        </div>
        <button class="badge badge-primary text-wrap" type="submit">SUBMIT</button>
    </form>
        <?php flash('post_message'); ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>




