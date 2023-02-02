<?php
require_once "functions.php";
$currentUrlInfo = getCurrentUrlInfo();
$url = str_replace(array("/database", "/datamapper", "/factsheets"),"",$currentUrlInfo['protocol'] . '://' . $currentUrlInfo['hostName'] . $currentUrlInfo['pathInfo']['dirname']);
?>
<div class="row">
    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
        <article class="ecl-card">
            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_database.jpg')"></div>
            <div class="ecl-card__body">
                <div class="ecl-content-block ecl-card__content-block">
                    <h1 class="ecl-content-block__title"><a href="<?php echo $url ?>/database/" class="ecl-link ecl-link--standalone">Database</a></h1>
                    <div>View and extract available indicators data items (the scope of data available is limited in this version – please read above.)
                        <br/>
                        <ul>
                            <li><a href="<?php echo $url ?>/database/building-stock.php" class="ecl-link ecl-link--standalone">Building Stock</a></li>
                            <li><a href="<?php echo $url ?>/database/renovations-rates.php" class="ecl-link ecl-link--standalone">Renovation rates</a></li>
                            <li><a href="<?php echo $url ?>/database/energy-consumption.php" class="ecl-link ecl-link--standalone">Energy Consumption</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
        <article class="ecl-card">
            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_maps.jpg')"></div>
            <div class="ecl-card__body">
                <div class="ecl-content-block ecl-card__content-block">
                    <h1 class="ecl-content-block__title"><a href="<?php echo $url ?>/datamapper/index.php" class="ecl-link ecl-link--standalone">Datamapper</a></h1>
                    <div>View the different data sets in a colour coded map (not yet available in the current version)</div>
                </div>
            </div>
        </article>
    </div>
    <div class="col-lg-4 ecl-content-item-block__item ecl-u-mb-l">
        <article class="ecl-card">
            <div class="ecl-card__image" aria-label="&quot;&quot;" role="img" style="background-image:url('<?php echo $url ?>/assets/img/BSO_card_factsheets.jpg')"></div>
            <div class="ecl-card__body">
                <div class="ecl-content-block ecl-card__content-block">
                    <h1 class="ecl-content-block__title"><a href="<?php echo $url ?>/factsheets/index.php" class="ecl-link ecl-link--standalone">Factsheets</a></h1>
                    <div>View and download main facts, figures and graphs (not yet available in the current version)</div>
                </div>
            </div>
        </article>
    </div>
</div>