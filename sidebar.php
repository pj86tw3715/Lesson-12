<div class="sidebar">
  <form action="" method="get" id="search" name="search">
    <div class="input-group">
      <input type="text " name="search_name" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button class="btn btn-default " type="submit">
          <i class="fas fa-search fa-lg"></i>
        </button>
      </span>
    </div>
  </form>
</div>

<?php
$SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
$pyclass01 = $link->query($SQLstring);
$i = 1
?>

<div class="accordion" id="accordionExample">

  <?php
  while ($pyclass01_Rows = $pyclass01->fetch()) {
    $i = $pyclass01_Rows['classid'];
  ?>

    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne<?php echo $i; ?>">

        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i; ?>">

          <i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i>

          <?php echo $pyclass01_Rows['cname']; ?>

        </button>

      </h2>

      <?php
      if (isset($_GET['classid'])) {
        $SQLstring = "SELECT uplink FROM pyclass where level =2 and classid=" . $_GET['classid'];
        $classid_rs = $link->query($SQLstring);
        $data = $classid_rs->fetch();
        $ladder = $data['uplink'];
      } else {
        $ladder = 1;
      }
      ?>


      <?php

      $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
      $pyclass02 = $link->query($SQLstring);

      ?>


      <div id="collapseOne<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == $ladder) ? 'show' : ''; ?> " aria-labelledby="headingOne<?php echo $i; ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">


          <table class="table">


            <tbody>

              <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>

                <tr>
                  <td>

                    <i class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></i>

                    <a href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">

                      <?php echo $pyclass02_Rows['cname']; ?>

                    </a>

                  </td>

                </tr>

              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>

  <?php
    $i++;
  }
  ?>


</div>