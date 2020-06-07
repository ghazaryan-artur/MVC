<h1>helllo</h1>
<?php if(isset($_SESSION['text1'])) : ?>
    <p><?=$_SESSION['text1']?></p>
<?php endif ?>

<?php if(isset($_SESSION['text2'])) : ?>
    <p><?=$_SESSION['text2']?></p>
<?php endif ?>