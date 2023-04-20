<?php



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert with AJAX</title>
    <!-- Compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <!--Import Google Icon Font-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/styles.css" />
  </head>

  <body>
    <header>
      <nav>
        <div class="nav-wrapper light-blue lighten-2">
          <main class="container">
            <a href="#" class="brand-logo">Logo</a>
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
                <input
                  id="name"
                  name="name"
                  type="text"
                  class="validate"
                  required
                />
                <label for="name">First Name</label>
              </div>
              <div class="input-field col s4">
                <input
                  id="phone"
                  name="phone"
                  type="tel"
                  class="validate"
                  required
                />
                <label for="phone">Phone Number</label>
              </div>
              <div class="input-field col s4">
                <input
                  id="class"
                  name="class"
                  type="text"
                  class="validate"
                  required
                />
                <label for="class">Class</label>
              </div>
            </div>
            <button
              class="btn waves-effect waves-light light-blue"
              type="submit"
              name="action"
              id="save"
            >
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
        <h2>View Data</h2>
        <div class="" style="margin: 10px; margin-left: 0">
          <!-- <button
            class="btn waves-effect waves-light light-blue"
            name="viewData"
            id="viewData"
            type="button"
          >
            View
            <i class="material-icons left">visibility</i>
          </button> -->
        </div>
        <table class="highlight responsive-table">
          <thead class="light-blue lighten-2 white-text">
            <tr>
              <th>Id</th>
              <th>Full Name</th>
              <th>Class</th>
              <th>Phone</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>

          <tbody id="table-data">
            <tr>
              <td>Alvin</td>
              <td>Eclair</td>
              <td>Eclair</td>
              <td>$0.87</td>
              <td>
                <button class="btn_icons edit" id="" data-id="">
                  <i class="small material-icons">edit</i>
                </button>
              </td>
              <td>
                <button class="btn_icons delete" id="" data-id="">
                  <i class="small material-icons red-text">delete</i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>

    <footer>
      <div class="light-blue lighten-2" style="padding: 10px">
        <h6 class="white-text center" style="margin: 0">
          All rights reserved to Hassan Khan
        </h6>
      </div>
    </footer>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="./assets/scripts.js"></script>
  </body>
</html>
