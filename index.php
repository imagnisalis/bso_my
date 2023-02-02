<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EU Building Stock Observatory">
    <meta name="keywords" content="EU Building Stock Observatory, BSO, Building, Stock, Observatory">
    <meta name="author" content="EU">
    <title>EU Building Stock Observatory</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bso.css">
    <link rel="stylesheet" href="./node_modules/@ecl/preset-ec/dist/styles/ecl-ec.css" />
    <script defer src="https://europa.eu/webtools/load.js?globan=1110" type="text/javascript"></script>
</head>

<body class="language-en ecl-typography path-node page-node-type-landing-page">
<script type="application/json">
    {
        "utility" : "cck",
        "url": "https://ec.europa.eu/info/cookies_{lang}"
    }
</script>
<div class="content-wrapper">

    <?php include "inc/logo.php"; ?>
    <!-- /logo section -->

    <?php include "inc/header.php"; ?>
    <!-- /header -->

    <section class="wrapper bg-light">
        <div class="ecl-container pt-2">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/index_en">Home</a><i class="breadcrumb-nav-sign"></i></li>
                        <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/topics_en">Topics</a><i class="breadcrumb-nav-sign"></i></li>
                        <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/topics/energy-efficiency_en">Energy efficiency</a><i class="breadcrumb-nav-sign"></i></li>
                        <li class="breadcrumb-item"><a href="https://energy.ec.europa.eu/topics/energy-efficiency/energy-efficient-buildings_en">Energy efficient buildings</a><i class="breadcrumb-nav-sign"></i></li>
                        <li class="breadcrumb-item active">BSO webtool</li></li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- /breadcrump -->

    <section class="wrapper bg-light">
        <div class="ecl-container pt-4">
            <div class="row col-md-12">
                <h1>EU Building Stock Observatory</h1>
                <p class="ecl-page-header__description">The EU Building Stock Observatory (BSO) web tool monitors the energy performance of buildings across Europe.</p>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
<!-- /.content-wrapper -->

    <section class="wrapper bg-light">
        <div class="ecl-container pt-10">
            <div class="row align-items-top">
                <div class="sidebar ecl-col-12 ecl-col-l-3">
                    <nav class="sticky-top" style="z-index: 0;" data-ecl-auto-init="InpageNavigation" data-ecl-auto-initialized="true" data-ecl-inpage-navigation="true" aria-labelledby="ecl-inpage-navigation-default">
                        <div class="ecl-inpage-navigation__title" id="ecl-inpage-navigation-default">Page contents</div>
                        <div class="ecl-inpage-navigation__body">
                            <button type="button" class="ecl-inpage-navigation__trigger" id="ecl-inpage-navigation-default-trigger" data-ecl-inpage-navigation-trigger="true" aria-controls="ecl-inpage-navigation-list" aria-expanded="false">
                                <span class="ecl-inpage-navigation__trigger-current" data-ecl-inpage-navigation-trigger-current="true"></span>
                            </button>
                            <ul class="ecl-inpage-navigation__list" data-ecl-inpage-navigation-list="true" id="ecl-inpage-navigation-default-list">
                                <li class="ecl-inpage-navigation__item"><a href="#BSO" class="ecl-link ecl-link--standalone ecl-inpage-navigation__link" data-ecl-inpage-navigation-link="">BSO webtool</a></li>
                                <li class="ecl-inpage-navigation__item"><a href="#documents" class="ecl-link ecl-link--standalone ecl-inpage-navigation__link" data-ecl-inpage-navigation-link="">Documents</a></li>
                                <li class="ecl-inpage-navigation__item"><a href="#related-links" class="ecl-link ecl-link--standalone ecl-inpage-navigation__link" data-ecl-inpage-navigation-link="">Related links</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/column -->
                <div class="ecl-col-12 ecl-col-l-9">
                    <p>The EU Building Stock Observatory (BSO) was established in 2016 as part of the <a href="https://energy.ec.europa.eu/topics/energy-strategy/clean-energy-all-europeans-package_en">Clean energy for all Europeans package</a>, and aims to provide a better understanding of the energy performance of the building sector through reliable, consistent and comparable data.  Its main objective is to provide more transparent information on the EU’s building stock, to support the monitoring of current EU energy policies and measures and contribute to future policy making process. </p>
                    <p>The BSO is designed to include a database, a data mapper and factsheets for monitoring the energy performance of buildings across Europe. </p>
                    <p>Ultimately, it will cover a broad range of energy related topics and provide information on the building stock, energy consumption, building elements and technical building systems installed, energy performance certificates, nearly zero-energy buildings and renovation rates, but also areas like energy poverty and financing aspects.</p>
                    <p>The current version of the tool is a first step of a major revamping and includes only the <strong>database</strong> and for a limited dataset. The database will be gradually expanded in 2023 with more indicators and relevant data. The BSO <strong>datamapper</strong> and <strong>factsheets</strong> will be included in the second part of 2023.</p>
                    <h2 id="BSO">BSO webtool</h2>
                    <p>The EU Building Stock Observatory webtool provides interactive graphs and tables with data related to the EU building stock and its energy performance.</p>
                    <p>In this version, the webtool includes a <strong>database</strong> that will be gradually expanded in the course of 2023 and in the second part of the year, a <strong>datamapper</strong> and dedicated country and thematic <strong>factsheets</strong> will be added to complete the tool. </p>
                    <p>The current version covers 3 domains, building stock, renovation rates, and energy consumption, and the following indicators for all EU countries and the EU:</p>
                    <ul>
                        <li><strong>building stock</strong>: the evolution of number of buildings between 2012-2016 for multi-family residential buildings, single-family residential buildings,  and non-residential buildings  such as: office, education, health, hotels and restaurants, wholesale and retail trade, other.</li>
                        <li><strong>renovation rates</strong>: renovation rates for the residential and non-residential buildings for the years 2012-2016.</li>
                        <li><strong>energy consumption</strong>: final energy consumption for the residential and services buildings between 1990-2020.</li>
                    </ul>

                    <?php include "inc/toolsBlock.php" ?>
                    <!-- /web tools block -->

                    <br/>
                    <h2>Newsletter</h2>
                    <p>
                        The EU Building Stock Observatory will issue regular newsletters as of the second part of  2023, highlighting new data,
                        updates of the web tool, news, events and more. It is already possible to <a href="https://ec.europa.eu/newsroom/ener/user-subscriptions/1337/create" target="_blank">sign up to the BSO mailing list</a> to receive alerts about upcoming news or event information, or write to <a href="mailto:ENER-BUILDINGS@ec.europa.eu">ENER-BUILDINGS@ec.europa.eu</a> if you have other requests concerning the tool.
                    </p>

                    <h2 id="documents">Documents</h2>
                    <ul class="frontend-unordered-list">
                        <li><a href="./assets/files/BSO%20Final%20Report.pdf">Final report on maintenance and update of the EU Building Stock Observatory</a>. (June 2020)</li>
                        <li><a href="https://energy.ec.europa.eu/support-setting-observatory-building-stock-and-related-policies_en">Report on support for setting up an observatory of the building stock and related policies</a> (November 2017)</li>
                        <li><a href="https://energy.ec.europa.eu/factsheets-country-eu-buildings-2016-pdfs_en">Factsheets: Buildings in EU countries</a> (2016)</li>
                    </ul>

                    <h2 id="related-links">Related links</h2>
                    <ul class="frontend-unordered-list">
                        <li><a href="https://energy.ec.europa.eu/topics/energy-strategy/energy-union_en" target="_blank ">Energy union</a></li>
                    </ul>
                    <!--/column -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
    <!-- /.content-wrapper -->


<?php include "inc/footer.php"; ?>
<!-- /footer -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/theme.js"></script>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script>
    if (window.matchMedia("(min-width: 1024px)").matches) {
        let section = document.querySelectorAll('h2');
        let lists = document.querySelectorAll('.ecl-inpage-navigation__item');

        function activeLink(li) {
            lists.forEach((item) => item.classList.remove('ecl-inpage-navigation__item--active'));
            li.classList.add('ecl-inpage-navigation__item--active');
        }

        lists.forEach((item) =>
            item.addEventListener('click', function () {
                activeLink(this);
            }));

        window.onscroll = () => {
            section.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');

                if (top >= offset && top < offset + height) {
                    const target = document.querySelector(`[href='#${id}']`);
                    if(target && target.parentElement){
                        if (top >= offset && top < offset + height) {
                            activeLink(target.parentElement);
                        }
                    }
                }
            })
        };
    }
</script>
</body>

</html>