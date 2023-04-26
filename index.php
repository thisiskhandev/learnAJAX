<!-- <?php

echo "<pre>";
print_r($_SERVER);
echo "</pre>";

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Insert with AJAX</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/styles.css" />
</head>

<body>
  <header>
    <nav>
      <div class="nav-wrapper light-blue lighten-2">
        <main class="container">
          <a href="/" class="brand-logo"><img src="./assets/images/logo-ajax.svg" alt="Ajax logo Vector" srcset="./assets/images/logo-ajax.svg" style="max-width: 100%; width: 90px;"></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Sass</a></li>
            <li><a href="#">Components</a></li>
            <li><a href="#">JavaScript</a></li>
          </ul>
        </main>
      </div>
    </nav>
  </header>

  <!-- Insert Data -->
  <main class="container">
    <section class="row">
      <h2>Insert Data</h2>
      <div class="row">
        <form class="col s12" id="addForm">
          <div class="row">
            <div class="input-field col s4">
              <input id="name" name="name" type="text" class="validate" required />
              <label for="name">First Name</label>
            </div>
            <div class="input-field col s4">
              <input id="phone" name="phone" type="tel" class="validate" required />
              <label for="phone">Phone Number</label>
            </div>
            <div class="input-field col s4">
              <input id="class" name="class" type="text" class="validate" required />
              <label for="class">Class</label>
            </div>
          </div>
          <button class="btn waves-effect waves-light light-blue" type="submit" name="action" id="save">
            Submit
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>
    </section>
  </main>

  <!-- View Data -->
  <main class="container" id="viewDataRecord" style="overflow: hidden">
    <section class="row">
      <!--
        <div class="" style="margin: 10px; margin-left: 0">
           <button
            class="btn waves-effect waves-light light-blue"
            name="viewData"
            id="viewData"
            type="button"
          >
            View
            <i class="material-icons left">visibility</i>
          </button> 
        </div>
        -->
      <form id="searchForm" style="margin: 10px;">
        <div class="row" style="margin: 0;">
          <div class="col s8" style="margin: 0;">
            <h2 style="margin: 0;">View Data</h2>
          </div>
          <div class="input-field col s4" style="margin: 0;">
            <input id="search" name="search" type="text" autocomplete="false" />
            <label for="search">Search...</label>
          </div>
        </div>
      </form>
      <div id="table-data">
        <?php include_once "load-data.php"; ?>
      </div>
    </section>
  </main>

  <!-- Delete Modal -->
  <div id="modal1" class="modal confirm_box modal-fixed-footer s2">
    <div class="modal-content">
      <p class="flow-text">Are You Sure want to delete this record?</p>
      <ul>
        <li>
          <h5>
            Student:
            <strong id="sname" class="lighten-5 red" style="padding: 0 10px"></strong>
          </h5>
        </li>
        <li>
          <h5>
            Phone:
            <strong id="sphone" class="lighten-5 red" style="padding: 0 10px"></strong>
          </h5>
        </li>
        <li>
          <h5>
            Class:
            <strong id="sclass" class="lighten-5 red" style="padding: 0 10px"></strong>
          </h5>
        </li>
      </ul>
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0)" class="modal-close waves-effect btn-flat"><span>Cancel</span></a>
      <a href="javascript:void(0)" data-id="" class="modal-close delete_confirm waves-effect waves-darken-1 btn red lighten-1"><span>Delete</span> <i class="small material-icons">delete</i></a>
    </div>
  </div>

  <!-- Edit Modal -->
  <div id="editModal" class="modal confirm_box modal-fixed-footer s2">
    <div class="modal-content">
      <p class="flow-text">Edit Record</p>
      <div class="row">
        <form class="col s12" id="addForm">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">person</i>
              <input id="e-name" name="name" type="text" class="validate" required placeholder="First Name" />
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">phone_in_talk</i>
              <input id="e-phone" name="phone" type="tel" class="validate" required placeholder="Phone Number" />
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">class</i>
              <input id="e-class" name="class" type="text" class="validate" required placeholder="Class" />
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0)" class="modal-close waves-effect btn-flat"><span>Cancel</span></a>
      <a href="javascript:void(0)" data-id="" class="modal-close edit_confirm waves-effect waves-darken-1 btn green lighten-1"><i class="small material-icons">done</i> <span> Confirm </span>
        <i class="small material-icons">done_all</i>
      </a>
    </div>
  </div>

  <footer>
    <div class="light-blue lighten-2" style="padding: 10px">
      <h6 class="white-text center" style="margin: 0">
        All rights reserved to <a href="https://github.com/thisiskhandev" target="_blank" style="color: #fff;"><strong><ins>Hassan Khan</ins></strong></a>
      </h6>
    </div>
  </footer>
  
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- MaterializeCSS JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- Custom JS -->
  <script src="./assets/scripts.js"></script>
</body>

</html>