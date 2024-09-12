<section>
  <div class="container">
    <h3 class="py-3">Add New Task</h3>
    <div class="card">
      <div class="card-body">
        <h4>
          Task Details
        </h4>
        <p>Please enter the details of the task you want to add.</p>
        <form class="fw-semibold" method="POST" action="/task/add">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Please enter the title of the task">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Please enter the description of the task"></textarea>
          </div>
          <div class="mb-5">
            <label for="dueDate" class="form-label">Due Date</label>
            <input type="datetime-local" class="form-control" name="dueDate">
          </div>
          <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
      </div>
    </div>
  </div>
</section>