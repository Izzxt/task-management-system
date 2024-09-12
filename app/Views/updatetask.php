<?php if (session()->getFlashdata("success")): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata("success") ?>
  </div>
<?php endif ?>
<section>
  <div class="container">
    <h3 class="py-3">Update Task</h3>
    <div class="card">
      <div class="card-body">
        <h4>
          Task Details
        </h4>
        <p>Please enter the details of the task you want to add.</p>
        <form class="fw-semibold" method="POST" action="/task/update/<?= $task->id ?>">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Please enter the title of the task" value="<?= $task->title ?>">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Please enter the description of the task"><?= $task->description ?></textarea>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status">
              <option value="pending" <?php echo ($task->status == 'pending') ? 'selected' : ''; ?>>Pending</option>
              <option value="in_progress" <?php echo ($task->status == 'in_progress') ? 'selected' : ''; ?>>In Progress</option>
              <option value="completed" <?php echo ($task->status == 'completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dueDate" class="form-label">Due Date</label>
            <input type="datetime-local" class="form-control" id="dueDate" name="dueDate" value="<?= $task->due_date ?>" />
          </div>
          <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
      </div>
    </div>
  </div>
</section>