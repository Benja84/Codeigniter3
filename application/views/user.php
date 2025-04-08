
  <div class="container col-12">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header  d-flex justify-content-between">
            <h5>Hello user</h5>
            <a href="<?php echo base_url('user/add')?>" class="btn btn-primary">Add new user</a>
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
                <tr>
                  <td>1</td>
                  <td>Test</td>
                  <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae obcaecati quisquam unde doloremque repellendus voluptates quo minima amet magnam, quasi minus vel mollitia, provident modi sapiente pariatur? Dolorum, sequi quibusdam.</td>
                  <td>Img</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="http://" class="btn btn-secondary">Edit</a>
                      <a href="http://" class="btn btn-danger">Delete</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>