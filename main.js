function startHandler(e) {
  location.hash = "#question-1";
  e.target.classList.toggle("d-none");
  let reloadBtn = document.createElement("button");
  reloadBtn.classList +=
    "btn btn-warning text-light animate__animated animate__fadeInDown";
  reloadBtn.setAttribute("id", "reloadBtn");
  reloadBtn.addEventListener("click", (e) => {
    location.hash = "";
    location.reload();
  });
  reloadBtn.innerText = "Start over";
  jumbotron.appendChild(reloadBtn);
  jumbotron.children[0].innerHTML = "Good Luck !!";
  jumbotron.children[1].innerHTML = "Click on the button to start over.";
}

function shuffle(array) {
  let a = array.sort(() => Math.random() - 0.5);
  return a;
}

function printQuestion(question, answers, qNumber) {
  let questionContainer = document.getElementById("questions");

  if (qNumber <= 20) {
    questionContainer.innerHTML = `
      <div  class="card bg-light shadow questionCard animate__animated animate__headShake"> 
        <div class="card-body">
            <h5 class="card-title">Qusetion number ${qNumber}</h5>
            <p class="card-text">${question.question}</p>
            <div id="answers" class="w-100"> </div>
        </div>
        <div class="card-footer">
        ${question.category}
        </div>
      </div>`;
    let answerContainer = document.getElementById("answers");
    // Shuffle the answers position
    let shuffleAnswers = shuffle(answers);

    for (let i = 0; i < shuffleAnswers.length; i++) {
      answerContainer.innerHTML += `
      <a class="btn btn-primary my-2 clientAnswer" href="#question-${
        qNumber + 1
      }">${shuffleAnswers[i]}</a>
      `;
    }
  }
}
var counter = 0;
function checkAnswer(correctAnswer) {
  let clientAnswer = document.querySelectorAll(".clientAnswer");

  for (let i = 0; i < clientAnswer.length; i++) {
    clientAnswer[i].addEventListener("click", (e) => {
      if (e.target.innerHTML == correctAnswer) {
        counter++;
      }
    });
  }
  sessionStorage.setItem("correct", counter);
}

function printStatus(curentStatus, status) {
  let statusContainer = document.getElementById("progressContainer");
  let progressBar = document.getElementById("progressBar");
  statusContainer.classList.remove("d-none");
  progressBar.style.width = `${curentStatus / 0.2}%`;
  progressBar.innerHTML = `<span id="progressText" class="text-dark">${status}  ${curentStatus}/20</span>`;
}

function endQuiz(hash, countCorrect) {
  if (hash == 21) {
    let reloadBtn = document.getElementById("reloadBtn");
    let questionContainer = document.getElementById("questions");
    reloadBtn.classList.add("btn-danger");
    reloadBtn.innerText = "Try again";
    jumbotron.children[0].innerHTML = "Lets see your score!!";
    jumbotron.children[1].innerHTML = "Click on the button to start again.";
    questionContainer.classList.toggle("d-none");
    printStatus(countCorrect, "Correct answers");
  }
}

window.location.hash = "";
sessionStorage.setItem("correct", 0);
let startBtn = document.getElementById("startBtn");
let jumbotron = document.getElementById("jumbotron");
fetch("https://opentdb.com/api.php?amount=20&type=multiple")
  .then((res) => res.json())
  .then((data) => {
    document.getElementById("loader").classList.toggle("d-none");
    jumbotron.classList.toggle("d-none");
    // setUp on click of start button
    startBtn.addEventListener("click", startHandler);
    // Print Question
    window.addEventListener("hashchange", (e) => {
      // Get next Question from hash
      let hash = location.hash.split("#question-");
      let qNumber = parseInt(hash[1]);
      // get current question
      if (qNumber <= 20) {
        var question = data.results[qNumber - 1];
        var correctAnswer = question.correct_answer;
        var answers = question.incorrect_answers;
        answers.push(correctAnswer);
      }
      //Function to print next question
      printQuestion(question, answers, qNumber);
      // Show status Bar
      printStatus(qNumber - 1, "Completed");
      checkAnswer(correctAnswer);
      endQuiz(qNumber, sessionStorage.getItem("correct"));
    });
  });
