<div class="right_col" role="main" style="min-height: 1066px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>


                    <small></small>
                </h3>



            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search for..." type="text">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Media Gallery <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="margin-right: 25px">
                                <div class="btn-group">
                                    <a href="<?=base_url('admin/upload/upload_gallery/')?><?=$post_id?>" class="btn btn-dark" type="button"><i class="fa fa-plus"></i> Ekle</a>
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

                        <div class="row">

                            <p></p>


                        <?php foreach ($rows as $row){ ?>

                            <div class="col-md-55">
                                <div class="thumbnail" style="height: 172px; overflow-wrap: break-word">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="<?=$file_path?><?=$row->picture?>" alt="image">
                                        <div class="mask no-caption">
                                            <div class="tools tools-bottom">
                                                <a href="<?=base_url('admin/gallery/remove_from_gallery_with_params/')?><?=$row->post_id?>/<?=$row->picture?>"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p><strong><?=$row->picture?></strong></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <?php }if(empty($rows)){ ?>

                            <div class="x_content">

                                <div class="bs-example" data-example-id="simple-jumbotron">
                                    <div class="jumbotron">
                                        <h1>Ooops, looks like gallery for this post is empty.</h1>
                                        <p></p>
                                    </div>
                                </div>

                            </div>

                            <?php } ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>