<div class="row">
    <?php foreach ($productData as $product) { ?>
    <div class="col-sm-5 border">
        <div class="row">
            <div class="col-sm-8 title">
                <?php echo $product['title'] ?>
            </div>
            <div class="col-sm-2">
               <button class="btn btn-success form-control"><a href="<?php echo base_url('home/edit' . '/' . $product['id'])?>">Edit</a></button>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-danger form-control"><a href="<?php echo base_url('home/delete_product' . '/' . $product['id'])?>">Delete</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 high200">
                <img src="<?php echo base_url(UP_LOAD_PATH . '/' . $product['name'])?>" alt="pic">
            </div>
            <div class="col-sm-4 high200">
                <?php echo $product['description'] ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="col-sm-3">
    <a href="<?php echo base_url('home/edit')?>"><button class="btn-primary btn">Add product</button></a>
</div>
