<?php
    function addform($name,$action,$value='',$method='post')
    {
?>
    <form action="<?php echo navigate($action); ?>" method="<?php echo $method ?>" id="<?php echo $name ?>">
        <input type="hidden" value="<?php echo $value ?>" name="<?php echo $name ?>">
    </form>
<?php
    }
?>