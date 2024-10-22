<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body class="container">

 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
         <span class="ms-2">E-COMMERCE</span>
     </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</header>
<div class="panel panel-default">
   <div class="panel-heading">
      <h2><strong>Welcome!</strong>Amir Hamza</Span></h2>
      <h2> User list</h2>
    </div>
    <div class="panel-body">
     <table class="table table-striped">
       <th width="20%">Serial</th>
       <th width="20%">Name</th>
       <th width="20%">Username</th>
       <th width="20%">Email Address</th>
       <th width="20%">Action</th>
       <tr>
           <td>01</td>
           <td>Amir Hamza</td>
           <td>hamza</td>
           <td>hamza@gmail.com</td>
           <td> 
                <a class="btn btn-primary" herf="profile.php?id=1">View</a>
             </td>
           </tr>
 
           <tr>
           <td>02</td>
           <td>Ashik Uz Zaman</td>
           <td>zaman</td>
           <td>zaman@gmail.com</td>
           <td> 
                <a class="btn btn-primary" herf="profile.php?id=1">View</a>
             </td>
           </tr> 
 
           <tr>
           <td>03</td>
           <td>Asif Akter</td>
           <td>akter</td>
           <td>akter@gmail.com</td>
           <td> 
                <a class="btn btn-primary" herf="profile.php?id=1">View</a>
             </td>
           </tr>
 
     </table>
   </div>
 </div>
 <footer>
    <div class="my-5 text-center">
        <small>©2021.E-Commerce. All rights reserved, Dhaka, Bangladesh.</small>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>