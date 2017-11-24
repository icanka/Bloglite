
<?php

foreach ($data as $table1 => $table){

    $keys = array_keys($table[0]);


    ?>
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <?php

                foreach ($keys as $key){

                    ?>
                    <th><?=$key?></th>
                    <?php

                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($table as $row => $row_value){


                ?><tr><?php

                foreach ($keys as $key){

                    ?>
                    <td><?=$row_value[$key]?></td>
                    <?php


                }

                ?></tr><?php



            }

            ?>
            </tbody>
        </table>
    </div>
    <?php

}

?>





