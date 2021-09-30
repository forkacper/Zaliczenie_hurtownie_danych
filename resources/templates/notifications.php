<?php

function success($text)
{ ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukces!</strong> <?php echo $text ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php }

function warning($text)
{ ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Uwaga! </strong> <?php echo $text ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php }
