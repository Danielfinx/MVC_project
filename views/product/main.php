<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Data Table</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>
          </div>
          <div>
            <a class="btn btn-primary btn-flat" href="?c=product&a=addForm"><i class="fa fa-lg fa-plus"></i></a>
            <a class="btn btn-info btn-flat" href="#"><i class="fa fa-lg fa-refresh"></i></a>
            <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Brand</th>
                      <th>Cost</th>
                      <th>Price</th>
                      <th>Amount</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->model->list() as $r): ?>
                    <tr>
                      <td><?= $r->prod_id ?></td>
                      <td><?= $r->prod_name ?></td>
                      <td><?= $r->prod_brand ?></td>
                      <td><?= $r->prod_cost ?></td>
                      <td><?= $r->prod_price ?></td>
                      <td><?= $r->prod_amnt ?></td>
                      <td><?= $r->prod_img ?></td>
                      <td>Add | Delete</td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>