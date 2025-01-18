<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notesApp</title>
    <link rel="stylesheet" href="../css/mainmenu.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <div class="container-fluid custom-margin">
        <div class="row">
            <div class="col-2 text-center">
                <div class="border border-dark">
                    <a href="mainmenu.php" target="_blank">
                        <h1 class="appTtl">
                            notesApp
                        </h1>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <div class="container" id="bar">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-10" style="margin-right: -24; !important; background-color: red !important;"  >
                                <input type="search" class="form-control searchbar" id="search1" placeholder="Search" />
                            </div>
                            <div class="col-2" style="background-color: green !important;">
                                <input type="submit" class="searchbtn" id="searchBTN" value="">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2" style="background-color:green">
                User
            </div>
        </div>
        <div class="row">
            <div class="col-4" style="background-color:yellow">
                create
            </div>
            <div class="col-8" style="background-color:orange">
                checklist
            </div>
        </div>
        <div class="row">
            <div class="col-3" style="background-color:black">
                notes-1
            </div>
            <div class="col-3" style="background-color:gray">
                notes-2
            </div>
            <div class="col-3" style="background-color:brown">
                notes-3
            </div>
            <div class="col-3" style="background-color:green">
                notes-4
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../JS/searchbar.js"></script>
</body>

</html>

