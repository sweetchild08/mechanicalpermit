<?php
    if(isset($_SESSION['msg']))
    { ?>
    <div class="alert alert-secondary" role="alert">
        <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        ?>
    </div>
    <?php }
?>