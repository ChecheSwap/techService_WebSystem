<?php
//$_SERVER['DOCUMENT_ROOT'].'/websys/LOGIC/pagination/utils_b.php'

require_once($_SERVER['DOCUMENT_ROOT'] . '/websys/INCLUSIONS/linker_base.php');

function xshow_Msg_normal($title,$msg)
{
    if (true) { ?>

        <script>
            $(function () {
                $("#xmodal").modal('show');
            });
        </script>

        <div id="xmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header bg-gray">

                        <img class="img-responsive" src='../../images/tlogo_black.png' style="max-height:50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body bg-primary3">
                        <br>
                        <div align="center">
                            <img class="img-responsive" align=center src='../../images/users.png' style="max-height:200px;">
                        </div>
                        <br>
                        <h1 class="modal-title text-center font-italic text-dark"> <?php echo($title);?> </h1>
                        <br>
                        <h4 class="text-center text-dark"><?php echo($msg); ?></h4>
                    </div>
                    <div class="modal-footer bg-gray">
                        <button type="button" class="btn btn-block bg-danger " data-dismiss="modal"> Cerrar</button>
                    </div>
                </div>

            </div>
        </div>

        <?php
    }
}

?>