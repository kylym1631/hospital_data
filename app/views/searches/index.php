<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container mt-3 100">
        <div class="bg-light bg-gradient border py-5 px-5 w-50"style="">
            <h1>Search Patient</h1>
            NAME <input type="search w-100"style="width: 300px;" placeholder="Name"><span class="text-danger ml-2">*</span><br>
            SURNAME <input type="search w-100"style="width: 300px;" placeholder="Surname"><span class="text-danger ml-2">*</span><br>
            PATIENT ID <input type="checkbox">
            <input type="search w-100"style="width: 300px;" placeholder="ID">
            <div class="row">

                <div class="col-md-6 border mt-3">
                    DISEASE <input type="checkbox" name="" id="">
                    <select name="" id="">
                        <option value="">CANCER</option>
                        <option value="">MALARIA</option>
                        <option value="">SCHIZOPHRENIC</option>
                        <option value="">ANGINA</option>
                    </select>

                </div>
                <div class="col-md-6 border mt-3">
                    DEPARTMENT <input type="checkbox" name="" id="">
                    <select name="" id="">
                        <option value="">ONCOLOGY</option>
                        <option value="">NEUROLOGY</option>
                        <option value="">GASTREONTOLOGY</option>
                    </select>
                </div>
                <div class="col-md-6 border mt-3">
                    CHAMBER <input type="checkbox" name="" id="">
                    <select name="" id="">
                        <option value="">CENTRAL CHAMBER</option>
                        <option value="">CORNER CHAMBER</option>
                        <option value="">NEIGHBORHOOD CHAMBER</option>
                    </select>
                </div>
                <div class="col-md-6 border mt-3">
                    BERTH <input type="checkbox" name="" id="">
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                </div>
                <div class="col-md-6 border mt-3">
                    COUNTRY
                    <input type="checkbox">
                    <input type="text" name="" id=""placeholder="POLAND">
                </div>
                <div class="col-md-6">
                    GENDER
                    <select name="" id="">
                        <option value="">MALE</option>
                        <option value="">FEMALE</option>
                    </select><span class="text-danger ml-2">*</span>
                </div>
            </div>
            <button class="badge-primary text-wrap mt-3">Find</button>

        </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>