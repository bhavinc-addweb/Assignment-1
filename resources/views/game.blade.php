<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tic-Tac-Toe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
  .container-out {
        font-family: "Fira Sans", sans-serif;
        padding: 15px 0;
      }

      .container-in {
        width: 97%;
        margin: 0 auto;
      }
      .table-container {
        margin: 10 auto;
        text-align: center;
      }

      .box {
        min-width: 70px;
        min-height: 70px;
        background: #dee9ec;
        text-align: center;
        vertical-align: center;
        font-size: 50px;
        font-weight: 900;
        cursor: pointer;
      }

      .box:hover {
        opacity: 0.7;
      }

      .table-container h2 {
        color: #0d8b70;
        display: none;
      }

      .table-container button {
        border: none;
        background: #13838b;
        color: white;
        border-radius: 3px;
        padding: 5px 7px;
        font-size: 18px;
        cursor: pointer;
        margin: 15px;
      }

      .table-container button:hover {
        opacity: 0.7;
      }

      .table-container button:focus {
        outline: none;
      }
  </style>
</head>
<body>
 
<div class="container-out">
    <div class="container-in">
       @foreach($user as $row)
    <div class="table-container">
        <p>{{ $row->name }} <span id="player">X</span> your turn</p>
        <table align="center">
        <tr>
            <td><div class="box"></div></td>
            <td><div class="box"></div></td>
            <td><div class="box"></div></td>
        </tr>
        <tr>
            <td><div class="box"></div></td>
            <td><div class="box"></div></td>
            <td><div class="box"></div></td>
        </tr>
        <tr>
            <td><div class="box"></div></td>
            <td><div class="box"></div></td>
            <td><div class="box"></div></td>
        </tr>
        </table>

        <h2 id="message">{{ $row->name }}<span id="winner"></span> Wins</h2>
        <button id="reset">Reset</button>
    </div>
     @endforeach
    </div>
</div>

<script>

let currentPlayer = "x";

let gameStatus = "Game On";

const boxes = document.getElementsByClassName("box");

for (let i = 0; i < boxes.length; i++) {
  
  boxes[i].addEventListener("click", function()
   {
    
    if (boxes[i].innerHTML.trim() == "" && gameStatus == "Game On") {
      
      boxes[i].innerHTML = currentPlayer;

      currentPlayer = currentPlayer == "x" ? "o" : "x";

      
      document.getElementById(
        "player"
      ).innerHTML = currentPlayer.toUpperCase();

      
      if (
        boxes[0].innerHTML == boxes[1].innerHTML &&
        boxes[1].innerHTML == boxes[2].innerHTML &&
        boxes[0].innerHTML.trim() != ""
      ) {
        showWinner(0, 1, 2);
      } else if (
        boxes[3].innerHTML == boxes[4].innerHTML &&
        boxes[4].innerHTML == boxes[5].innerHTML &&
        boxes[3].innerHTML.trim() != ""
      ) {
        showWinner(3, 4, 5);
      } else if (
        boxes[6].innerHTML == boxes[7].innerHTML &&
        boxes[7].innerHTML == boxes[8].innerHTML &&
        boxes[6].innerHTML.trim() != ""
      ) {
        showWinner(6, 7, 8);
      } else if (
        boxes[0].innerHTML == boxes[3].innerHTML &&
        boxes[3].innerHTML == boxes[6].innerHTML &&
        boxes[0].innerHTML.trim() != ""
      ) {
        showWinner(0, 3, 6);
      } else if (
        boxes[1].innerHTML == boxes[4].innerHTML &&
        boxes[4].innerHTML == boxes[7].innerHTML &&
        boxes[1].innerHTML.trim() != ""
      ) {
        showWinner(1, 4, 7);
      } else if (
        boxes[2].innerHTML == boxes[5].innerHTML &&
        boxes[5].innerHTML == boxes[8].innerHTML &&
        boxes[2].innerHTML.trim() != ""
      ) {
        showWinner(2, 5, 8);
      } else if (
        boxes[0].innerHTML == boxes[4].innerHTML &&
        boxes[4].innerHTML == boxes[8].innerHTML &&
        boxes[0].innerHTML.trim() != ""
      ) {
        showWinner(0, 4, 8);
      } else if (
        boxes[2].innerHTML == boxes[4].innerHTML &&
        boxes[4].innerHTML == boxes[6].innerHTML &&
        boxes[2].innerHTML.trim() != ""
      ) {
        showWinner(2, 4, 6);
      }
    }
  });
}


document.getElementById("reset").addEventListener("click", function() {
  for (let i = 0; i < boxes.length; i++) {
    boxes[i].innerHTML = "";
    boxes[i].style.backgroundColor = "#dee9ec";
    boxes[i].style.color = "black";
  }
  currentPlayer = "x";
  document.getElementById("message").style.display = "none";
  document.getElementById("player").innerHTML = "X";
  gameStatus = "Game On";
});


function showWinner(x, y, z) {
  boxes[x].style.background = "#0d8b70";
  boxes[x].style.color = "white";
  boxes[y].style.background = "#0d8b70";
  boxes[y].style.color = "white";
  boxes[z].style.background = "#0d8b70";
  boxes[z].style.color = "white";
  document.getElementById("winner").innerHTML =
    currentPlayer == "x" ? "O" : "X";
  document.getElementById("message").style.display = "block";
  gameStatus = "Game Over";
}
</script>

</body>
</html>