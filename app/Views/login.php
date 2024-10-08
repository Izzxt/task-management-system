<div class="d-flex flex-column gap-4">
  <header class="bg-primary text-white text-center py-5 bg-gradient">
    <div class="container">
      <h1>Login</h1>
      <p class="lead">
        it's quick and easy
      </p>
    </div>
  </header>

  <section class="container mt-4">
    <?php if (session()->getFlashdata("error")) { ?>
      <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata("error") ?>
      </div>
    <?php } ?>
    <div class="card">
      <form class="fw-semibold p-3" action="/auth/login" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Please enter your username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Please enter your password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </section>
</div>