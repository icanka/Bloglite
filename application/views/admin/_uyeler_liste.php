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

                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Nickname</th>
                                            <th>Authorization</th>
                                            <th>State</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count = 1;
                                        foreach ($users as $row){
                                            ?>
                                            <tr>
                                                <td style="text-align: center; width: 4%"><?= $count ?></td>
                                                <td><?= $row->name ?></td>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->nickname ?></td>
                                                <td><?= $row->authorization ?></td>
                                                <td><?= $row->state ?></td>
                                                <td><?= $row->date ?></td>
                                                <td style="text-align: center; width: 4%"><a href="<?=base_url('admin/uyeler/set_update/users/')?><?=$row->id?>" class="btn btn-info btn-xs" style="margin-bottom: 0px; margin-right: 0px"><i class="fa fa-pencil"></i> Edit </a></td>
                                                <td style="text-align: center; width: 4%"><a href="<?=base_url('admin/uyeler/delete/users/')?><?=$row->id?>" class="btn btn-danger btn-xs" style="margin-bottom: 0px; margin-right: 0px"><i class="fa fa-trash-o"></i> Delete </a></td>
                                            </tr>
                                            <?php
                                            $count++;}
                                        ?>
                                        </tbody>
                                    </table>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">


                                    <table id="datatable-responsive-2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nade</th>
                                            <th>E-mail</th>
                                            <th>Nickname</th>
                                            <th>Authorization</th>
                                            <th>State</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count = 1;
                                        foreach ($admins as $row){
                                            ?>
                                            <tr>
                                                <td style="text-align: center; width: 4%"><?= $count ?></td>
                                                <td><?= $row->name ?></td>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->nickname ?></td>
                                                <td><?= $row->authorization ?></td>
                                                <td><?= $row->state ?></td>
                                                <td><?= $row->date ?></td>
                                                <td style="text-align: center; width: 4%"><a href="<?=base_url('admin/uyeler/set_update/admin/')?><?=$row->id?>" class="btn btn-info btn-xs" style="margin-bottom: 0px; margin-right: 0px"><i class="fa fa-pencil"></i> Edit </a></td>
                                                <td style="text-align: center; width: 4%"><a href="<?=base_url('admin/uyeler/delete/admin/')?><?=$row->id?>" class="btn btn-danger btn-xs" style="margin-bottom: 0px; margin-right: 0px"><i class="fa fa-trash-o"></i> Delete </a></td>
                                            </tr>
                                            <?php
                                            $count++;}
                                        ?>
                                        </tbody>
                                    </table>



                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>