<h3 class="text-capitalize">Please <?php echo $pageTitle?>  product</h3>
<form role="form" id="slider-form" method="post" enctype='multipart/form-data'>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="<?php if($id){ echo $title;}?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" value="<?php if($id){ echo $description;}?>" >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <img class="img-responsive" src="<?php if($id){ echo '/' .UP_LOAD_PATH . '/' . $name ;}?>">
                    </div>
                    <div class="form-group">
                        <label>Image (Recommended size: 800x400)</label>
                        <input class="form-control" name="image" type="file" required id="image" value="<?php if($id){ echo $name ;}?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control hidden" name="user_id" value="<?php echo $user_id ?>">
                    </div>
                    <button type="submit" class="btn btn-default btn-success"><?php echo $pageTitle?></button>
                    <a href="<?php echo base_url('/home')?>"><button type="button" class="btn btn-default btn-info" >Home</button></a>

                </div>
            </div>
        </div>
    </div>
</form>
