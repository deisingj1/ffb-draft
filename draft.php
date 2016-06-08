<?php
    $xml_file = file_get_contents("test.xml");
    $xml=simplexml_load_string($xml_file) or die("Error: Cannot create object");
    foreach($xml as $str) {
        //var_dump($str["displayName"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- Inline style -->
        <style>
            .fill-parent {
                width: 100%;
            }
            .highlighted {
                background-color: red;
            }
        </style>
    </head>
    <body>
        <!--Container for whole webpage-->
        <div class="container-fluid">
            <!-- page header -->
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        Fantasy Draft v1.0
                    </h1>
                </div>
            </div>
            <div class="row">
            <!-- chat box -->
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-9">
                            <table class="table-bordered fill-parent">
                                <tr>
                                    <td id="selection">No player selected</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-sm-3">
                            <button id="draftButton">Draft</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="height:200px;overflow:auto">
                            <table class="table-bordered fill-parent">
                                <?php foreach($xml as $key=>$value) { ?>
                                <tr class="player">
                                    <td><?php echo $value["displayName"]; ?></td>
                                    <td><?php echo $value["team"]; ?></td>
                                    <td><?php echo $value["position"]; ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <table id="draftedPlayers" class="table-bordered fill-parent">

                    </table>
                </div>
            </div>
        </div>

        <!-- end container -->
        <script>
            var selection;
            $("#draftButton").click(function () {
               $("#draftedPlayers").append("<tr><td>" + selection + "</td></tr>"); 
            });
            $(".player").hover(function() {
               $(this).addClass("highlighted"); 
            },
            function() {
                $(this).removeClass("highlighted");
            });
            $(".player").click(function() {
                $("#selection").html($(this).html());
                selection = $(this).html();
            });
        </script>
    </body>
</html>