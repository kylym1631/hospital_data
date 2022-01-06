<?php require APPROOT . '/views/inc/header.php'; ?>

    <h1 class="text-center">PATIENT INFO</h1>
    <div class="container bg-light bg-gradient border py-5 px-5 w-50" >
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    ID OF PATIENT
                </div>
                <div class="text-secondary">
                    <?=$data['id_patient']?>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    PATIENT NAME
                </div>
                <div class="text-secondary">
                    <?=$data['name']?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    PATIENT SURNAME
                </div>
                <div class="text-secondary">
                    <?=$data['surname']?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    PESEL
                </div>
                <div class="text-secondary">
                    <?=$data['pesel']?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    INSURANCE
                </div>
                <div class="text-secondary">
                    <?=$data['insurance_name']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    TYPE OF MED SERVICE
                </div>
                <div class="text-secondary">
                    <?=$data['service_type']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    DISEASE
                </div>
                <div class="text-secondary">
                    <?=$data['disease_name']?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    DEPARTMENT
                </div>
                <div class="text-secondary">
                    <?=$data['department']?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    CHAMBER
                </div>
                <div class="text-secondary">
                    <?=$data['n_of_chamber']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    BERTH
                </div>
                <div class="text-secondary">
                    <?=$data['n_of_berth']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    COUNTRY
                </div>
                <div class="text-secondary">
                    <?=$data['name_of_country']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    GENDER
                </div>
                <div class="text-secondary">
                    <?=$data['gender_name']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    EMAIL
                </div>
                <div class="text-secondary">
                    <?=$data['email']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between "style="border: 1px solid gray; padding: 5px;">
                <div>
                    ADDRESS
                </div>
                <div class="text-secondary">
                    <div>

                        <div class="text-secondary">
                            <?=$data['zip_code']?>
                            <br>
                            <?=$data['city']?>
                            <br>
                            <?=$data['street']?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    PHONE
                </div>
                <div class="text-secondary">
                    <?=$data['phone_number']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    ARRIVAL TIME
                </div>
                <div class="text-secondary">
                    <?=$data['arrival_time']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    CHECKED OUT
                </div>
                <div class="text-secondary">
                    <?=$data['date_checked_out']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between">
                <div>
                    INDICATION
                </div>
                <div class="text-secondary">
                    <?=$data['indication']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between "style="border: 1px solid gray; padding: 5px;">
                <div>
                    DOCTOR
                </div>
                <div class="text-secondary">
                    <div>
                        <?php
                        if (!empty($data['id_doctor']))
                        {
                            echo $data[0][0]->doctor_name . ' ' . $data[0][0]->doctor_surname;
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if (!empty($data['id_doctor']))
                        {
                            echo $data[0][0]->specialization_name;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>


    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>