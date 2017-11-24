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

                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Users</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Admin</a>
                                </li>
                            </ul>

                            <div id="myTabContent" class="tab-content">








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



















                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>