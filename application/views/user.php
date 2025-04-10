
  <div class="container col-12">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <?php if($this->session->flashData('success')): ?>
            <div class="alert alert-success text-center">
              <?php echo $this->session->flashData('success');?>
            </div>
            <?php endif;?>
            <div class="d-flex justify-content-between">
              <h5>Articles</h5>
              <a href="<?php echo base_url('user/add')?>" class="btn btn-primary">Add new user</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titre</th>
                  <th>Contenue</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $item): ?>
                <tr>
                  <td><?php echo $item->id ?></td>
                  <td><?php echo $item->title ?></td>
                  <td><?php echo $item->content ?></td>
                  <td><?php echo $item->image ?></td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="<?php echo base_url('article/edit/'.$item->id)?>" class="btn btn-success">Edit</a>
                      <a href="<?php echo base_url('article/delete/'.$item->id)?>" class="btn btn-danger">Delete</a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>