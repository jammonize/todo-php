<?php 
  // CONFIG
  include ('config/db_config.php'); 

    // create sql
    $sql = 'SELECT id, task FROM todos';

    // query server with sql
    $result = mysqli_query($conn, $sql);

    // create array from result
    $todos = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // ADD A TASK
  include('add.php');

  // DELETE A TASK
  include('delete.php');

  // HEADER
  include ('templates/header.php'); 

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <h3 class="display-4 font-weight-light text-center">Todo List</h3>
        </div>
    </div>
</div>

<div class="row justify-content-center" id="todo-list">
  <ul class="list-group mx-auto col-sm-6">
    <?php foreach($todos as $todo): ?>
      <li class="list-group-item list-group-item-action"> <?php echo htmlspecialchars($todo['task']); ?> 
      <form action="index.php" method="POST">
        <input type="hidden" name="delete_by_id" value="<?php echo $todo['id']; ?>">
        <button type="submit" name="delete" class="btn btn-danger">Delete</button></li>
      </form>
    <?php endforeach; ?>
  </ul>
</div>


<form action="index.php" method="POST">
  <div class="form-row justify-content-center align-items-center mt-5">
    <div class="col-sm-6">
      <label class="sr-only" for="todo-form-input">Name</label>
      <input type="text" name="task" class="form-control mb-2" id="todo-form-input" placeholder="Tell me your todo">
    </div>
    <div class="col-auto">
      <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
</form>

<!-- FOOTER -->
<?php include ('templates/footer.php'); ?>