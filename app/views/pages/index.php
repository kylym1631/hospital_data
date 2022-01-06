<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container mt-3 100">
        <div class="bg-light bg-gradient border py-5 px-5 w-50"style="">
            <h1><?=$data['title'];?></h1>
            <form action="/fills" method="post">
                <input type="email" name="email" id=""placeholder="email" required><span class="text-danger ml-2">*</span><br>
                <input type="password" name="password" id=""placeholder="password" required><span class="text-danger ml-2">*</span><br>
                <button class="badge-primary text-wrap my-3">Log in</button>
            </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
