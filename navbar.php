<nav class="navbar navbar-expand-lg fixed-top navbar-dark">

      <div class="container-fluid">

        <a class="navbar-brand" href="index.php">
          <img src="images/logo.jpg" alt="電商藥粧" class="img-fluid rounded-circle">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>
        <?php
        $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER by sort";
        $pyclass01 = $link->query($SQLstring);
        ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                產品資訊
              </a>
              <ul class="dropdown-menu">

                <?php
                while ($pyclass01_Rows = $pyclass01->fetch()) {
                ?>

                  <li class="nav-item dropend">
                    <a class="dropdown-item dropdown-toggle" href="#">
                      <em class="fas <?php echo $pyclass01_Rows['fonticon'] ?>"></em>
                      <?php echo $pyclass01_Rows['cname'] ?>
                    </a>
                    <?php
                    $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
                    $pyclass02 = $link->query($SQLstring)

                    ?>

                    <ul class="dropdown-menu">

                      <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>

                        <li>
                          <a class="dropdown-item" href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">
                            <em class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></em>
                            <?php echo $pyclass02_Rows['cname']; ?>
                          </a>
                        </li>

                      <?php } ?>

                    </ul>

                  </li>

                <?php
                }
                ?>



              </ul>
            </li>




            <li class="nav-item">
              <a class="nav-link" href="#">會員註冊</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">會員登入</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">會員中心</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">最新活動</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">查訂單</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">折價券</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">購物車</a>
            </li>



            <?php multilist01(); ?>

            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                企業專區
              </a>

              <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="#">認識企業文化</a></li>
                <li><a class="dropdown-item" href="#">全台門市資訊</a></li>
                <li><a class="dropdown-item" href="#">供應商報價服務</a></li>
                <li><a class="dropdown-item" href="#">加盟專區</a></li>
                <li><a class="dropdown-item" href="#">投資人專區</a></li>


              </ul>

            </li>

          </ul>

        </div>

      </div>

    </nav>

    <?php
    function multilist01()
    {
      global $link;
      $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER by sort";
      $pyclass01 = $link->query($SQLstring);
    ?>

      <?php
      while ($pyclass01_Rows = $pyclass01->fetch()) {
      ?>

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $pyclass01_Rows['cname'] ?>
          </a>

          <ul class="dropdown-menu">

            <?php
            $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
            $pyclass02 = $link->query($SQLstring);
            ?>

            <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>

              <li>
                <a class="dropdown-item" href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">
                  <em class="fas <?php echo $pyclass02_Rows['fonticon']; ?>"></em>
                  <?php echo $pyclass02_Rows['cname'] ?>
                </a>
              </li>

            <?php } ?>




          </ul>

        </li>

      <?php } ?>
    <?php } ?>