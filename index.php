<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Dynamic Treeview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <center><h2>Add Nodes to Tree view</h2></center>
    <hr>
    <form action="add.php" method="post" id="treeview">
      <div class="form-group">
        <label for="employee">Employee:</label>
        <input type="text" class="form-control" id="employee" placeholder="Enter Employee" name="employee">
      </div>
      <div class="form-group">
        <label for="manager">Manager:</label>
        <select class="form-control" id="manager" name="manager"></select>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</div>
<div class="container">
  <div id="treeview_item"></div>
</div>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    manager_list();
    treeview_data();

    function treeview_data(){
      $.ajax({
        url: 'treeview.php',
        dataType: 'JSON',
        success:function(data){
          console.log(data);
          
          $('#treeview_item').treeview({
            data:data
          });
        }
      });
    }

    function manager_list(){
      $.ajax({
        url: 'fetch.php',
        success:function(data){
          $('#manager').html(data);
        }
      });
    }

    $('#treeview').on('submit', function(e){
      e.preventDefault();

      $.ajax({
        url: 'add.php',
        method: 'POST',
        data:$(this).serialize(),
        success:function(data){
          manager_list();
          treeview_data();
          $('#treeview')[0].reset();
          alert(data);
        }
      });
    });
  });
</script>