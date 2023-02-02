<?php $databaseTitle = "Datamapper"; ?>
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


            <div >

                <iframe title="BSO - demo" width="100%" height="1200px" src="https://app.powerbi.com/view?r=eyJrIjoiYTI4ZjAxNzktOTdiYi00ZWUwLWI5MWMtZWMzMGVlYTI0NzAyIiwidCI6IjY1NTEyYjI1LWNjNmQtNGIzZC1iYThkLTEwNjcxY2FiNWU5MyIsImMiOjh9" allowfullscreen></iframe>
            </div>

            <br />

            <div id="toolsDiv">
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
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/theme.js"></script>

</body>

</html>