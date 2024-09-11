<div class="d-flex flex-column gap-4">
  <header class="text-center py-5">
    <div class="container">
      <h1>Welcome to Task Management System</h1>
      <p class="lead">
        Manage your tasks effectively and efficienly
      </p>
      <button type="button" class="btn btn-primary">Add New Task</button>
    </div>
  </header>

  <section>
    <div class="container">
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
          <tr>
            <td class="border">Task 1</td>
            <td class="border">Task 1 Description</td>
            <td class="border">2024-01-01</td>
            <td class="border">Not Started</td>
            <td class="border">
              <button type="button" class="btn btn-warning">Update</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>