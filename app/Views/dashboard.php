<div class="d-flex flex-column gap-4">
  <header class="text-center py-5">
    <div class="container">
      <h1>Welcome to Task Management System</h1>
      <p class="lead">
        Manage your tasks effectively and efficienly
      </p>
      <a class="btn btn-primary" href="/newtask">Add New Task</a>
    </div>
  </header>

  <section>
    <div class="container">
      <?php if (session()->getFlashdata("success")): ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata("success") ?>
        </div>
      <?php endif ?>
      <h2>Your Tasks</h2>
      <table class="table table-striped border">
        <thead>
          <tr>
            <th scope="col" class="border">Title</th>
            <th scope="col" class="border">Description</th>
            <th scope="col" class="border">Due Date</th>
            <th scope="col" class="border">Status</th>
            <th scope="col" class="border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tasks as $task): ?>
            <tr>
              <td class="border"><?= $task->title ?></td>
              <td class="border"><?= $task->description ?></td>
              <td class="border"><?= $task->due_date ?></td>
              <td class="border">
                <?php if ($task->status == 'pending'): ?>
                  <span class="badge text-bg-warning">Pending</span>
                <?php endif ?>
                <?php if ($task->status == 'in_progress'): ?>
                  <span class="badge text-bg-primary">In Progress</span>
                <?php endif ?>
                <?php if ($task->status == 'completed'): ?>
                  <span class="badge text-bg-success">Completed</span>
                <?php endif ?>
              </td>
              <td class="border">
                <a type="button" class="btn btn-warning" href="/<?= $task->id ?>/update-task">Update</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this task?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="/task/delete/<?= $task->id ?>">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</div>