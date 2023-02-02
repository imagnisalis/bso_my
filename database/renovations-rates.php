<?php
require_once "database-config.php";
require_once "api.php";
global $conditions;
global $embedToken;
global $embedUrl;
global $reportId;
global $groupId;
global $accessToken;
global $datasetId;

$databaseTitle = "Renovation Rates";

$domainsIndicators = getIndicatorsOfaDomain($groupId, $datasetId, $accessToken, $databaseTitle);

$indicatorConditions = array();
foreach ($domainsIndicators->results[0]->tables[0]->rows as $row) {
    $indicatorConditions[] = array(
        'operator' => 'Is',
        'value' => $row->{'[Indicator]'}
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EU Building Stock Observatory">
    <meta name="keywords" content="EU Building Stock Observatory, BSO, Building, Stock, Observatory">
    <meta name="author" content="EU">
    <title>EU Building Stock Observatory - <?=$databaseTitle?></title>
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/plugins.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bso.css">
    <link rel="stylesheet" href="../assets/css/treeselect.css">
    <link rel="stylesheet" href="../node_modules/@ecl/preset-ec/dist/styles/ecl-ec.css" />
    <script type="module" src="../assets/js/years.js"></script>
    <script type="module" src="../assets/js/categories-renovation-rates.js"></script>
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
                    <li class="breadcrumb-item"><a href="../database/">Database</a><i class="breadcrumb-nav-sign"></i></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$databaseTitle?></li>
                </ol>
            </nav>
            <!-- /breadcrump -->

            <section class="wrapper bg-light">
                <div class="container pt-4">
                    <div class="row col-md-12">
                        <h1><?=$databaseTitle?></h1>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->
            </section>
            <!-- /.content-wrapper -->

            <div class="card card-border-start border-blue" id="BSOFormDiv">
                <form id="BSOform">
                    <div class="card-body" style="padding: 1.2rem;">
                        <div class="row">
                            <div class="d-flex flex-row pb-2 col-2 col-md-3 col-lg-2 order-2 order-md-1">
                                <div>
                                    <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">1</span></span>
                                </div>
                                <div class="d-none d-md-block pt-1">
                                    <h6 class="mb-1">Categories, Subcategories</h6>
                                </div>
                            </div>
                            <div class="flex-row pt-sm-2 col-10 col-lg-9 col-md-8 col-sm-6 order-3 order-md-2">
                                <div id="treeselect-categories" class="treeselect-categories"></div>
                            </div>

                            <div class="d-flex flex-row-reverse col-12 col-md-1 order-1 order-md-3">


                                <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">
                                        <span>
                                            <a href="#" class="btn btn-primary btn-circle mx-1 mb-2 mb-md-0" data-bs-toggle="modal" title="Click for Help" data-bs-target="#help">
                                                <i class="information"></i>
                                            </a>
                                        </span>
                                </div>

                                <div class="modal fade" id="help" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="flex-row col-10">
                                                        <h2 class="mb-3">Help</h2>
                                                    </div>
                                                    <div class="flex-row col-2 align-right-close-button">
                                                        <a class="close-button" data-bs-dismiss="modal" aria-label="Close"></a>
                                                    </div>
                                                </div>
                                                <ol>
                                                    <li>Select Categories, Subcategories</li>
                                                    <li>Select Years</li>
                                                    <li>Select Countries</li>
                                                    <li>Get diagram</li>
                                                </ol>
                                            </div>
                                            <!--/.modal-content -->
                                        </div>
                                        <!--/.modal-body -->
                                    </div>
                                    <!--/.modal-dialog -->
                                </div>
                                <!--/.modal -->
                            </div>
                        </div>

                        <div class="row pt-md-1 pb-md-1">
                            <div class="d-flex flex-row pb-0 pb-md-2 pb-lg-0 col-2 col-lg-2 col-md-3">
                                <div>
                                    <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">2</span></span>
                                </div>
                                <div class="d-none d-md-block">
                                    <h6 class="mb-1 pt-2">Years</h6>
                                </div>
                            </div>
                            <div class="flex-row col-10 col-md-9 col-lg-4">
                                <div id="treeselect-years" class="treeselect-years"></div>
                            </div>

                            <div class="d-flex flex-row col-2 col-lg-2 col-md-3 col-sm-1 pt-2 pt-md-0">
                                <div>
                                    <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">3</span></span>
                                </div>
                                <div class="d-none d-md-block">
                                    <h6 class="mb-1 pt-2">Countries</h6>
                                </div>
                            </div>
                            <div class="flex-row col-10 col-lg-4 col-md-9 col-sm-5 pt-2 pt-md-0">
                                <div id="treeselect-countries" class="treeselect-countries"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex flex-row-reverse col-12 pt-2 pt-md-0">
                                <div>
                                    <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">4</span></span>
                                    <span><a onclick="BSOFormSubmit()" type="submit" class="btn btn-primary mx-1 mb-2 mb-md-0" style="z-index: 0;">Get diagram</a></span>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

            <div  class="card card-border-start border-blue" id="BSOFormAfterDIV" style="display: none;">
                <div class="row">
                    <div class="d-flex flex-row-reverse col-12 pt-2 pt-md-3 pb-md-3">
                        <div class="px-2">
                            <span><a href="renovations-rates.php" class="btn btn-primary mx-1 mb-2 mb-md-0">Start over</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            <div id="report-container"></div>

            <br />

            <div id="toolsDiv" style="display: none;">
                <div class="row">
                    <div class="d-flex flex-row-reverse col-12 pt-2 pt-md-3 pb-md-3">
                        <div class="px-2">
                            <?php include_once "../inc/toolsBlock.php" ?>
                            <!-- /web tools block -->
                        </div>
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
<script src="../node_modules/es6-promise/dist/es6-promise.min.js"></script>
<script src="../node_modules/powerbi-client/dist/powerbi.min.js"></script>
<script src="../node_modules/powerbi-report-authoring/dist/powerbi-report-authoring.min.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/theme.js"></script>
<script>

    function BSOFormSubmit() {

        //// COUNTRIES & YEARS
        let countriesText = document.getElementById("treeselect-countries").innerText;
        let yearsText = document.getElementById("treeselect-years").innerText;

        function convertToPowerBiFormat (divText) {
            let parts = divText.split('\n');
            let formArray = [];
            for(let i = 0; i < parts.length; i++) {
                let formObject = {}
                formObject.operator = "Is";
                formObject.value = parts[i];
                formArray.push(formObject);
            }
            return formArray;
        }

        let countriesArray = convertToPowerBiFormat(countriesText);
        let yearsArray = convertToPowerBiFormat(yearsText);

        //// CATEGORΙES & SUBCATEGORIES
        let categoriesText = document.getElementById("treeselect-categories").innerText;

        function convertCategoriesToPowerBiFormat (categoriesJSONArray) {
            let parts = categoriesJSONArray.split('\n');
            let categoriesArray = [];
            for(let i = 0; i < parts.length; i++) {
                let categoryObject = {};
                categoryObject.operator = "Is";
                categoryObject.value = parts[i];
                categoriesArray.push(categoryObject);
            }
            return categoriesArray;
        }

        let categoriesArray = convertCategoriesToPowerBiFormat(categoriesText);
        let subcategoriesArray = categoriesArray;

        //// POWER BI
        let loadedResolve, reportLoaded = new Promise((res, rej) => { loadedResolve = res; });
        let renderedResolve, reportRendered = new Promise((res, rej) => { renderedResolve = res; });

        let models = window['powerbi-client'].models;

        $(async function() {

            // 1 - Get DOM object for div that is report container
            let reportContainer = document.getElementById("report-container");

            // 2 - Get report embedding data from view model
            let reportId = '<?php echo $reportId ?>';
            let embedUrl = '<?php echo $embedUrl  ?>';
            let token = '<?php echo $embedToken ?>';


            // 3 - Embed report using the Power BI JavaScript API.
            let config = {
                type: 'report',
                id: reportId,
                embedUrl: embedUrl,
                accessToken: token,
                tokenType: models.TokenType.Embed,
                viewMode: models.ViewMode.View
            };

            // Embed the report and display it within the div container.
            let report = powerbi.embed(reportContainer, config);

            // report.off removes all event handlers for a specific event
            report.off("loaded");

            // report.on will add an event handler
            report.on("loaded", function () {
                loadedResolve();
                report.off("loaded");
            });

            // report.off removes all event handlers for a specific event
            report.off("error");

            report.on("error", function (event) {
                console.log(event.detail);
            });

            // report.off removes all event handlers for a specific event
            report.off("rendered");

            // report.on will add an event handler
            report.on("rendered", function () {
                renderedResolve();
                report.off("rendered");
            });

            // 4 - Add logic to resize embed container on window resize event
            let heightBuffer = 12;
            let newHeight = $(window).height() - ($("header").height() + heightBuffer);
            $("#report-container").height(newHeight);
            window.addEventListener('resize', function() {
                let newHeight = window.innerHeight - (document.querySelector("header").clientHeight + heightBuffer);
                document.querySelector("#report-container").style.height = newHeight + "px";
            });

            await reportLoaded;

            await Database();
            await Indicators();
            await Countries(countriesArray);
            await Categories(categoriesArray);
            await Subcategories(subcategoriesArray);
            await Years(yearsArray);

            await reportRendered;

            async function Database()
            {
                // Create the filter object. For more information see https://go.microsoft.com/fwlink/?linkid=2153364
                const filter = {
                    $schema: "http://powerbi.com/product/schema#advanced",
                    target: {
                        table: "Images_adress",
                        column: "Domain"
                    },
                    filterType: models.FilterType.Advanced,
                    logicalOperator: "Or",
                    conditions: [{
                        operator: "Is",
                        value: "<?=$databaseTitle?>"
                    }]
                };


                try {
                    const pages = await report.getPages();

                    // Retrieve the active page.
                    let page = pages.filter(function (page) {
                        return page.isActive;
                    })[0];

                    const visuals = await page.getVisuals();


                    // Retrieve the target visual.
                    let slicer = visuals.filter(function (visual) {
                        return visual.type === "slicer" && visual.name === "fdb42c6f168e9a50090d";
                    })[0];

                    // Set the slicer state which contains the slicer filters.
                    await slicer.setSlicerState({filters: [filter]});
                    console.log("Country slicer was set.");
                    // Refresh the displayed report
                } catch (errors) {
                    console.log(errors);
                }
            }

            async function Indicators()
            {
                // Create the filter object. For more information see https://go.microsoft.com/fwlink/?linkid=2153364
                const filter = {
                    $schema: "http://powerbi.com/product/schema#advanced",
                    target: {
                        table: "ALL",
                        column: "Indicator"
                    },
                    filterType: models.FilterType.Advanced,
                    logicalOperator: "Or",
                    conditions: <?= json_encode($indicatorConditions) ?>
                };

                try {
                    const pages = await report.getPages();

                    // Retrieve the active page.
                    let page = pages.filter(function (page) {
                        return page.isActive;
                    })[0];

                    const visuals = await page.getVisuals();


                    // Retrieve the target visual.
                    let slicer = visuals.filter(function (visual) {
                        return visual.type === "HierarchySlicer1458836712039" && visual.name === "7b0cc22c9c8b8935415e";
                    })[0];

                    // Set the slicer state which contains the slicer filters.
                    await slicer.setSlicerState({filters: [filter]});
                    console.log("Indicator slicer was set.");
                    // Refresh the displayed report
                } catch (errors) {
                    console.log(errors);
                }
            }

            async function Countries(countries)
            {
                // Create the filter object. For more information see https://go.microsoft.com/fwlink/?linkid=2153364
                const filter = {
                    $schema: "http://powerbi.com/product/schema#advanced",
                    target: {
                        table: "ALL",
                        column: "Country"
                    },
                    filterType: models.FilterType.Advanced,
                    logicalOperator: "Or",
                    conditions: countries
                };


                try {
                    const pages = await report.getPages();

                    // Retrieve the active page.
                    let page = pages.filter(function (page) {
                        return page.isActive;
                    })[0];

                    const visuals = await page.getVisuals();


                    // Retrieve the target visual.
                    let slicer = visuals.filter(function (visual) {
                        return visual.type === "slicer" && visual.name === "2a873d48e6d5feac9a42";
                    })[0];

                    // Set the slicer state which contains the slicer filters.
                    await slicer.setSlicerState({filters: [filter]});
                    console.log("Country slicer was set.");
                    // Refresh the displayed report
                } catch (errors) {
                    console.log(errors);
                }
            }

            async function Categories(categories)
            {
                // Create the filter object. For more information see https://go.microsoft.com/fwlink/?linkid=2153364
                const filter = {
                    $schema: "http://powerbi.com/product/schema#advanced",
                    target: {
                        table: "ALL",
                        column: "Category"
                    },
                    filterType: models.FilterType.Advanced,
                    logicalOperator: "Or",
                    conditions: categories
                };


                try {
                    const pages = await report.getPages();

                    // Retrieve the active page.
                    let page = pages.filter(function (page) {
                        return page.isActive;
                    })[0];

                    const visuals = await page.getVisuals();


                    // Retrieve the target visual.
                    let slicer = visuals.filter(function (visual) {
                        return visual.type === "slicer" && visual.name === "db9aae64dc5953ae9fcc";
                    })[0];

                    // Set the slicer state which contains the slicer filters.
                    await slicer.setSlicerState({filters: [filter]});
                    console.log("Country slicer was set.");
                    // Refresh the displayed report
                } catch (errors) {
                    console.log(errors);
                }
            }

            async function Subcategories(subcategories)
            {
                // Create the filter object. For more information see https://go.microsoft.com/fwlink/?linkid=2153364
                const filter = {
                    $schema: "http://powerbi.com/product/schema#advanced",
                    target: {
                        table: "ALL",
                        column: "Sub Category"
                    },
                    filterType: models.FilterType.Advanced,
                    logicalOperator: "Or",
                    conditions: subcategories
                };


                try {
                    const pages = await report.getPages();

                    // Retrieve the active page.
                    let page = pages.filter(function (page) {
                        return page.isActive;
                    })[0];

                    const visuals = await page.getVisuals();


                    // Retrieve the target visual.
                    let slicer = visuals.filter(function (visual) {
                        return visual.type === "slicer" && visual.name === "8f9c575b2eb02444858d";
                    })[0];

                    // Set the slicer state which contains the slicer filters.
                    await slicer.setSlicerState({filters: [filter]});
                    console.log("Country slicer was set.");
                    // Refresh the displayed report
                } catch (errors) {
                    console.log(errors);
                }
            }


            async function Years(years)
            {
                // Create the filter object. For more information see https://go.microsoft.com/fwlink/?linkid=2153364
                const filter = {
                    $schema: "http://powerbi.com/product/schema#advanced",
                    target: {
                        table: "ALL",
                        column: "Column",
                    },
                    filterType: models.FilterType.Advanced,
                    logicalOperator: "Or",
                    conditions: years
                };


                try {
                    const pages = await report.getPages();

                    // Retrieve the active page.
                    let page = pages.filter(function (page) {
                        return page.isActive;
                    })[0];

                    const visuals = await page.getVisuals();


                    // Retrieve the target visual.
                    let slicer = visuals.filter(function (visual) {
                        return visual.type === "slicer" && visual.name === "25eaf374edf4d0c0cd07";
                    })[0];

                    // Set the slicer state which contains the slicer filters.
                    await slicer.setSlicerState({filters: [filter]});
                    console.log("Years slicer was set.");
                    // Refresh the displayed report
                } catch (errors) {
                    console.log(errors);
                }
            }

        });

        // Hide form
        let $BSOFormDiv = $("#BSOFormDiv");
        $BSOFormDiv.hide();
        let $BSOFormAfterDIV = $("#BSOFormAfterDIV");
        $BSOFormAfterDIV.show();
        let $toolsDiv = $("#toolsDiv");
        $toolsDiv.show();
    }
</script>
</body>

</html>