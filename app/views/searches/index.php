<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container mt-3 100">
        <div class="bg-light bg-gradient border py-5 px-5 w-50"style="">
            <h1>Search Patient</h1>
            <form action="/searches/result" method="post">
                NAME <input type="text" placeholder="Name" name="name"><br>
                SURNAME <input type="text"placeholder="Surname" name="surname"><br>
                EMAIL <input type="email"placeholder="ex: example@gmail.com" name="email"><br>
                PESEL <input type="number"placeholder="ex: 12345" name="pesel"><br>
                INSURANCE <input type="number"placeholder="ex: 12345" name="insurance"><br>
                PATIENT ID
                <input type="number"style="width: 300px;" placeholder="ex: 12345567" name="patient_id">
                <div class="row">
                    <div class="col-md-6 border mt-3">
                        DISEASE
                        <select name="disease" id="">
                            <option value=""></option>
                            <?php
                            foreach($data['diseases'] as $disease)
                            {
                                echo '<option value="'. $disease->name.'"';
                                if (!empty($_POST['disease']) && $disease->name == $_POST['disease'])
                                {
                                    echo 'selected';
                                }
                                echo '>'. $disease->name. '</option>';
                            }
                            ;
                            ?>
                        </select>

                    </div>
                    <div class="col-md-6 border mt-3">
                        DEPARTMENT
                        <select name="department" id="">
                            <option value=""></option>
                            <?php
                            foreach($data['departments'] as $department)
                            {
                                echo '<option value="'. $department->department.'"';
                                if (!empty($_POST['department']) && $department->department == $_POST['department'])
                                {
                                    echo 'selected';
                                }
                                echo '>'. $department->department. '</option>';
                            }
                            ;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 border mt-3">
                        CHAMBER
                        <select name="chamber" id="">
                            <option value=""></option>
                            <?php
                            foreach($data['chambers'] as $chamber)
                            {
                                echo '<option value="'. $chamber->n_of_chamber.'"';
                                if (!empty($_POST['chamber']) && $chamber->n_of_chamber == $_POST['chamber'])
                                {
                                    echo 'selected';
                                }
                                echo '>'. $chamber->n_of_chamber. '</option>';
                            }
                            ;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 border mt-3">
                        BERTH
                        <select name="berth" id="">
                            <option value=""></option>
                            <?php
                            foreach($data['berths'] as $berth)
                            {
                                echo '<option value="'. $berth->n_of_berth.'"';
                                if (!empty($_POST['berth']) && $berth->n_of_berth == $_POST['berth'])
                                {
                                    echo 'selected';
                                }
                                echo '>'. $berth->n_of_berth. '</option>';
                            }
                            ;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 border mt-3">
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
                    </div>
                    <div class="col-md-6">
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
                                ?>>FEMALE</option>
                        </select><span class="text-danger ml-2"></span>
                    </div>
                </div>
                <span class="text-danger ml-2"><?php if (!empty($data['empty_forms_err'])) echo $data['empty_forms_err'];?></span>
                <a href="/fills "class="badge-secondary p-1"> ADD PATIENT</a>
                <a href="/settings "class="badge-secondary p-1">SETTINGS</a>
                <button class="badge-primary text-wrap mt-3">Find</button>
            </form>

        </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>