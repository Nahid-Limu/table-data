<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   


    <div class="container">
        @if(Session::has('successMessage'))
                <p id="alert_message" class="alert alert-success">{{Session::get('successMessage')}}</p>
          @endif
          @if(Session::has('failMessage'))
              <p id="alert_message" class="alert alert-danger">{{Session::get('failMessage')}}</p>
          @endif
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Company</button>
        <h2>Company List</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Logo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
            </tr>
            
          </tbody>
        </table>
      </div>

      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
                <div class="container">
                        <h2>Horizontal form</h2>
                        <form class="form-horizontal" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data" >
                          @csrf
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                              <input type="text" class="" id="name" placeholder="Enter name" name="name" autocomplete="off">
                            </div>
                          </div>
                          <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="" id="email" placeholder="Enter email" name="email" autocomplete="off">
                                </div>
                              </div>
                          <div class="form-group">
                                <label class="control-label col-sm-2" for="logo">Logo:</label>
                                <div class="col-sm-10">          
                                  <input type="file" class="" id="logo"  name="logo">
                                </div>
                              </div>
                          <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success">Add</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
      
      //flash msg
      $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
        $("#alert_message").alert('close');
    });
</script>
  </body>
</html>