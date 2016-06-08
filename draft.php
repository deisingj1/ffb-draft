<?php
    $xml_file = file_get_contents("test.xml");
    $xml=simplexml_load_string($xml_file) or die("Error: Cannot create object");
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
                background-color: gray;
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
                        <div class="col-sm-12" style="border-width:2px;border-style:solid;height:60vh;overflow:auto">
                            <table class="table-bordered fill-parent">
                                <?php foreach($xml as $key=>$value) { ?>
                                <tr class="player">
                                    <td class="dispName"><?php echo $value["displayName"]; ?></td>
                                    <td class="team"><?php echo $value["team"]; ?></td>
                                    <td class="pos"><?php echo $value["position"]; ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
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
                </div>
                <div class="col-sm-4">
                    <h4>QB</h4>
                    <ul id="QB"></ul>
                    <h4>RB</h4>
                    <ul id="RB"></ul>
                    <h4>WR</h4>
                    <ul id="WR"></ul>
                    <h4>TE</h4>
                    <ul id="TE"></ul>
                    <h4>K</h4>
                    <ul id="K"></ul>
                    <h4>D/ST</h4>
                    <ul id="DEF"></ul>
                </div>
            </div>
        </div>

        <!-- end container -->
        <script>
            var selection;
            var selpos;
            var selname;
            $("#draftButton").click(function () {
                $('#' + selpos).after("<li>" + selname + "</li>"); 
                
            });
            $(".player").hover(function() {
               $(this).addClass("highlighted"); 
            },
            function() {
                $(this).removeClass("highlighted");
            });
            $(".player").click(function() {
                $("#selection").html($(".dispName",this).text());
                selection = $(this).html();
                selpos = $(".pos", this).text();
                selname = $(".dispName", this).text();
            });
        </script>
    </body>
</html>