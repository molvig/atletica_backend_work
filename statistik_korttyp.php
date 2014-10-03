<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getkorttyp.php"); ?>


<div class="grid_12">
  <div class="grid_12">
        <div class="grid_2"><?php include("inc/menystatistik.php"); ?></div>
        <div class="grid_7">


<div class="grid_12">
   <form method="get" action="statistik_korttyp_post.php">
      <h4> Sök på korttyp </h4>
    <div class="grid_12">
      <div class="grid_6">
        <select name="korttyp" class="form-control">
            <?php echo $kort; ?>
        </select>
      </div>
    </div>
    <div class="grid_12">
      <button type="submit" class="btn btn-default">Sök
    </div> 
  </form>
</div> 

  


<?php include("inc/footer.php"); ?>

