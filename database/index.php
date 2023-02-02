<?php
require_once "../inc/functions.php";
$currentUrlInfo = getCurrentUrlInfo();
$url = str_replace(array("/database", "/datamapper", "/factsheets"),"",$currentUrlInfo['protocol'] . '://' . $currentUrlInfo['hostName'] . $currentUrlInfo['pathInfo']['dirname']);
$databaseTitle = "Database";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EU Building Stock Observatory">
    <meta name="keywords" content="EU Building Stock Observatory, BSO, Building, Stock, Observatory">
    <meta name="author" content="EU">
    <title>EU Building Stock Observatory - <?= $databaseTitle ?></title>
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/plugins.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bso.css">
    <link rel="stylesheet" href="../assets/css/treeselect.css">
    <link rel="stylesheet" href="../node_modules/@ecl/preset-ec/dist/styles/ecl-ec.css" />
    <script type="module" src="../assets/js/years.js"></script>
    <script type="module" src="../assets/js/categories.js"></script>
    <script type="module" src="../assets/js/countries.js"></script>
    <script defer src="https://europa.eu/webtools/load.js?globan=1110" type="text/javascript"></script>
</head>

<body>
<script type="application/json">
    {
        "utility" : "cck",
        "url": "https://ec.europa.eu/info/cookies_{lang}"
    }
</script>
<div class="content-wrapper">

    <?php include "../inc/logo.php"; ?>
    <!-- /logo section -->

    <?php include "../inc/header.php"; ?>
    <!-- /header -->


    <section class="wrapper">
        <div class="ecl-container pt-1 pb-1 pt-md-3 pb-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/index_en">Home</a><i class="breadcrumb-nav-sign"></i></li>
                    <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/topics_en">Topics</a><i class="breadcrumb-nav-sign"></i></li>
                    <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/topics/energy-efficiency_en">Energy efficiency</a><i class="breadcrumb-nav-sign"></i></li>
                    <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/topics/energy-efficiency/energy-efficient-buildings_en">Energy efficient buildings</a><i class="breadcrumb-nav-sign"></i></li>
                    <li class="breadcrumb-item"><a href="../index.php">BSO webtool</a><i class="breadcrumb-nav-sign"></i></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$databaseTitle ?></li>
                </ol>
            </nav>
            <!-- /breadcrump -->

            <section class="wrapper bg-light">
                <div class="container pt-4">
                    <div class="row col-md-12">
                        <h1><?=$databaseTitle ?></h1>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->
            </section>
            <!-- /.content-wrapper -->

            <br/>

            <div id="toolsDiv">
                <div class="row">
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title"><a href="<?php echo $url ?>/database/building-stock.php" class="ecl-link ecl-link--standalone">Building Stock</a></h1>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title"><a href="<?php echo $url ?>/database/renovations-rates.php" class="ecl-link ecl-link--standalone">Renovation Rates</a></h1>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title"><a href="<?php echo $url ?>/database/energy-consumption.php" class="ecl-link ecl-link--standalone">Energy Consumption</a></h1>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title">GHG emissions</h1>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title">RES</h1>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title">EPCs</h1>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title">Building Envelope</h1>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title">Technical building systems</h1>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
                        <article class="ecl-card">
                            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
                            <div class="ecl-card__body">
                                <div class="ecl-content-block ecl-card__content-block">
                                    <h1 class="ecl-content-block__title">Energy poverty</h1>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </div>


    </section>
    <!-- /section -->
</div>
<!-- /.content-wrapper -->

<?php include "../inc/footer.php"; ?>
<!-- /footer -->

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/theme.js"></script>
</body>
</html>