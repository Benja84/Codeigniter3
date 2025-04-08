
  <div class="container col-12">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h5>Create user</h5>
            <a href="<?php echo base_url('user')?>" class="btn btn-primary">List user</a>
          </div>
          <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="title">Titre</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
              <label for="content">Contenue</label>
              <textarea class="form-control" name="content" id="content"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Valider">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>