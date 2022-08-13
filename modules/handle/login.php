
<form action="../users/index.php" method="post">
    <input type="text" name="id" value="
    <?php
    echo $_GET['id'];
    ?>">
    <input type="submit" class="sb-btn">
</form>
<script>
    const sbBtn=document.querySelector(".sb-btn")
    sbBtn.click();
</script>

