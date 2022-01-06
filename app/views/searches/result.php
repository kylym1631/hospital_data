<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if (empty($data['empty_forms_err'])): ?>
         <div class="container mt-3 100">
            <div class="bg-light bg-gradient border py-5 px-5 w-100"style="">
                <h1>Choose a patient</h1>
                <div class="list-group">

                    <?php foreach ($data as $k=>$v) :?>
                    <form action="/searches/show/<?=$v->id_patient?>" method="post" class="list-group-item list-group-item-action w-75">

                        <?php foreach ($v as $kV=>$vV) :?>

                            <input type="hidden" name="<?=$kV?>" value="<?=$vV?>"/>
                        <?php endforeach;?>

                        <?php
                            echo $v->name . ' '. $v->surname. ' | patient id: '.$v->id_patient; if (!empty($v->disease_name))echo  ' | disease name: '.$v->disease_name ;
                            ?>

                            <button class="badge badge-info text-wrap py-2"type="submit" >Show patient info</button>
                        </form>
                        <br>

                    <?php endforeach;?>
                </div>

                <a href="/searches"><button class="badge-primary text-wrap mt-3">Back</button></a>
    
            </div>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>