<?php
require_once "functions.php";
$currentUrlInfo = getCurrentUrlInfo();
$url = str_replace(array("/database", "/datamapper", "/factsheets"),"",$currentUrlInfo['protocol'] . '://' . $currentUrlInfo['hostName'] . $currentUrlInfo['pathInfo']['dirname']);
?>
<section class="wrapper d-lg-block ecl-container">
        <div class="navbar-brand w-50 pt-2 pb-2 pt-sm-2 pb-sm-2 pt-lg-3 pb-lg-3">
            <a href="https://ec.europa.eu/info/index_en">
                <img class="img-logo img-fluid" src="<?php echo $url; ?>/node_modules/@ecl/preset-ec/dist/images/logo/positive/logo-ec--en.svg" alt="EU Building Stock Observatory" title="EU Building Stock Observatory"  />
            </a>
        </div>
    <!-- /.logo container -->
</section>

