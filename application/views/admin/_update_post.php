<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Post <small><?=$row[0]->post_title?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
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
                        <br>



                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?=base_url('admin/gonderiler/update_table_post/')?><?=$row[0]->id?>">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Post Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="post_title" value="<?=$row[0]->post_title?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="user" value="<?=$row[0]->user_name?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>








                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="state" required="required">
                                        <option selected="selected"><?=$row[0]->status?></option>
                                        <option>active</option>
                                        <option>inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="category" required="required">
                                        <option selected="selected" value="<?=$row[0]->category?>"><?=$row[0]->cat_name?></option>

                                        <?php foreach ($categories as $category){ ?>

                                        <option value="<?=$category->id?>"><?=$category->category_name?></option>


                                        <?php } ?>





                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keywords </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tags_1" name="keywords" type="text" class="tags form-control" required="required" value="

                                    <?php foreach ($keywords as $keyword){
                                        echo $keyword.",";
                                    }
                                    ?>
                                    " />
                                    <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contents </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="editor1" name="contents"><?=$row[0]->contents?></textarea>
                                </div>
                            </div>










                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>





                    </div>
                </div>
            </div>
        </div>


    </div>
</div>