<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test API with Redis</title>
</head>
<body>
<style>
    .remove {
        cursor: pointer;
    }

    li {
        padding: 10px;
    }
</style>
Cache:
<?php
if ($items) { ?>
    <ul class="load">
        <? foreach ($items as $key => $item) { ?>
            <? if ($item) { ?>
                <li><?= $key; ?>: <?= $item; ?> | <a class="remove" onclick="front.remove('<?= $key; ?>')">delete</a></li>
            <? } ?>
        <?php } ?>
    </ul>
<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="front.js"></script>
<script>
    // OR LOAD with AJAX
    /*setTimeout(function() {
        front.mainLoad();
    }, 500);*/
</body>
</html>
