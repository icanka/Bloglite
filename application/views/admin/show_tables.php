<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plain Page</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-right: 25px">
                                <div class="btn-group">
                                    <a href="<?=base_url('admin/uyeler/insert')?>" class="btn btn-dark" type="button"><i class="fa fa-plus"></i> Ekle</a>
                                </div>
                            </li>

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">



                            <?php
                            $count = 1;
                            ?>
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <?php

                                foreach ($data as $table_name => $table_value){
                                    if($count==1) {
                                        ?>
                                        <li role="presentation" class="active"><a href="#tab_content<?= $count ?>"
                                                                                  id="home-tab" role="tab"
                                                                                  data-toggle="tab"
                                                                                  aria-expanded="true"><?= $table_name ?></a>
                                        </li>
                                        <?php
                                    }else{
                                        ?>
                                        <li role="presentation" class=""><a href="#tab_content<?= $count ?>"
                                                                            role="tab"
                                                                            id="profile-tab"
                                                                            data-toggle="tab"
                                                                            aria-expanded="false"><?= $table_name ?></a>
                                        </li>
                                        <?php

                                    }
                                    $count++;

                            }
                            ?>
                            </ul>
                            <div id="myTabContent" class="tab-content">


                                <?php
                                $count = 1;

                                foreach ($data as $table_name => $table_value){

                                    $keys = array_keys($table_value[0]);



                                    ?>


                                    <?php

                                    if ($count==1){

                                    ?>
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content<?= $count ?>" aria-labelledby="home-tab">

                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <?php
                                    }else{

                                        ?>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content<?= $count ?>" aria-labelledby="profile-tab">


                                                    <table id="datatable-responsive-2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>

                                        <?php

                                    }
                                                ?>
                                                <?php

                                                foreach ($keys as $key){

                                                    if(in_array($key, $columns)) {
                                                    }else{

                                                        ?>
                                                        <th><?=$key?></th>
                                                        <?php

                                                    }

                                                }
                                                ?>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            foreach ($table_value as $row => $row_value){

                                                ?>
                                                <tr>
                                                    <?php

                                                foreach ($keys as $key){

                                                    ?>

                                                    <?php
                                                    if(in_array($key, $columns)){

                                                    }else{
                                                        ?>

                                                        <td><?=$row_value[$key]?></td>

                                                        <?php
                                                    }


                                                }

                                                ?>
                                                <td style="text-align: center; width: 4%"><a href="<?=base_url()?>admin/uyeler/set_update/<?=$table_name?>/<?=$row_value['id']?>" class="btn btn-info btn-xs" style="margin-bottom: 0px; margin-right: 0px"><i class="fa fa-pencil"></i> Edit </a></td>
                                                <td style="text-align: center; width: 4%"><a href="<?=base_url()?>admin/uyeler/set_update/<?=$table_name?>/<?=$row_value['id']?>" class="btn btn-danger btn-xs" style="margin-bottom: 0px; margin-right: 0px"><i class="fa fa-trash-o"></i> Delete </a></td>
                                                </tr>
                                                <?php

                                            }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                    $count++;

                                }

                                ?>



















                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>