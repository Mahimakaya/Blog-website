<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/c8a135f850.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <style>
        .img-fluid{
            height:300px;
        }
        label {
            padding: 5px;
        }
        .parallax{
            text-align: center;
            background-image: url("https://images.unsplash.com/photo-1476673160081-cf065607f449?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80");
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            height: 650px;
            font-size:40px;

        }
       .parallax a{
            text-decoration: none;
            color: black;
            font-size: 25px;
            font-weight: bold;
        }
      .up input{
          border: none;
          background: none;
          width: 100%;
          font-weight: bold;
          color: white;
      }
     .up textarea{
         width: 100%;
         height: 500px;
         font-size:20px;
         line-height:30x;
         font-weight:400;
         border: none;
         background: none;
         color: white;
         white-space:pre-wrap;
     }
     .up input:focus,textarea:focus{
         outline: none;
     }
  </style>
    <title></title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">POV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all.php">BlOGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">PEN</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    </body>
    </html>