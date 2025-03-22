<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Products</h1>
            <p> enter the data to <?= $action ?> product </p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Products</li>
              <li><a href="#"><?= $title ?> Product</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="post" action="?c=product&a=save">
                      <fieldset>
                        <legend><?= $title ?> Product</legend>
                        <div class="form-group">
                          <div class="col-lg-10">
                            <input class="form-control" name="ID" type="hidden" value="<?= isset($p) ? $p->getProd_id() : "" ?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Name">Name</label>
                          <div class="col-lg-10">
                            <input required class="form-control"name="Name" type="text" placeholder="Name" value="<?= isset($p) ? $p->getProd_name() : "" ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Brand">Brand</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Brand" type="text" placeholder="Brand" value="<?= isset($p) ? $p->getProd_brand() : "" ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Cost">Cost</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Cost" type="number" step="0.01" placeholder="30" value="<?= isset($p) ? $p->getProd_cost() : "" ?>">
                          </div>
                        </div>
                        
                        <div class="form-group">    
                          <label class="col-lg-2 control-label" for="Price">Price</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Price" type="number" step="0.01" placeholder="50" value="<?= isset($p) ? $p->getProd_price() : "" ?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Amount">Amount</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Amount" type="number" placeholder="25" value="<?= isset($p) ? $p->getProd_amnt() : "" ?>">
                          </div>
                        </div>

                        <!-- <div class="form-group" hidden>
                          <label class="col-lg-2 control-label" for="Image">Image</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Image" type="hidden" placeholder="Image" value="<?= isset($p) ? $p->getProd_img() : "/img/" ?>">
                          </div>
                        </div> -->

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>