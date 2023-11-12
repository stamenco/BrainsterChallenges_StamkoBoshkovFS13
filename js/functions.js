let budgetInput;
let expenseInput;
let amountInput;
let budgetAmount;
let expenseAmount = 0;
let balanceAmount;
let rowCounter = 1;
let expenseArr = [];
let selected = { row: "", expenseTitle: "", expenseAmount: 0 };

export function displayBalance(e) {
  e.preventDefault();
  budgetInput = $("#budget-input").val();

  if (budgetInput > 0) {
    $("#budget-amount").text(budgetInput);
    calculateBalance();
    $("#budget-input").val("");
    $("#budget-input").blur();
  } else {
    showAlert(".budget-feedback", "Value cannot be empty or negative");
    $("#budget-input").val("");
    $("#budget-input").blur();
  }
}

export function createTable(e) {
  e.preventDefault();
  expenseInput = $("#expense-input").val();
  amountInput = $("#amount-input").val();
  budgetAmount = $("#budget-amount").text();

  if (budgetAmount == "0") {
    showAlert(
      ".expense-feedback",
      "You must enter a budget value before adding expenses"
    );
    $("#expense-input").val("");
    $("#amount-input").val("");
  } else {
    if (expenseInput == "" && amountInput == "") {
      showAlert(".expense-feedback", "Please fill out all fields");
      $("#expense-input").blur();
      $("#amount-input").blur();
    } else if (expenseInput == "") {
      showAlert(".expense-feedback", "Please enter a name for your expense");
      $("#expense-input").blur();
    } else if (amountInput == "") {
      showAlert(".expense-feedback", "Please enter a value for your expense");
      $("#amount-input").blur();
    } else if (amountInput <= 0) {
      showAlert(
        ".expense-feedback",
        "An expense value cannot be 0 or negative"
      );
      $("#amount-input").val("");
      $("#amount-input").blur();
    } else {
      if ($("#table-generator").html() == "") {
        tableHTML(e);
        extendTable(e);
        tableRowData();
        calculateExpense();
        calculateBalance();
        rowCounter++;
      } else if (selected.row != "") {
        editRow();
      } else {
        extendTable(e);
        tableRowData();
        calculateExpense();
        calculateBalance();
        rowCounter++;
      }
    }
  }
}

function extendTable(e) {
  $("#my-table-body").append(
    `<tr id='row${rowCounter}' class='row'>
      <td class='col-4'>- <span id='row-expense-title${rowCounter}'>${expenseInput}</span></td>
      <td id='row-expense-amount${rowCounter}' class='col-4'>${amountInput}</td>
      <td class='col-4'>
        <button id='edit-btn${rowCounter}' class='btn btn-link edit-icon' data-id='${rowCounter}'>
          <i class="fas fa-edit pr-2"></i>
        </button>
        <button id='delete-btn${rowCounter}' class='btn btn-link delete-icon' data-id='${rowCounter}'>
          <i class="fas fa-trash-alt pl-2"></i>
        </button>
      </td>
    </tr>`
  );
  $("#expense-input").val("");
  $("#amount-input").val("");

  editButton(rowCounter);
  deleteButton(rowCounter);
}

function tableHTML(e) {
  $("#table-generator").append(
    `<table id='my-table' class='table text-center'>
      <thead>
        <tr class='row text-uppercase info-title'>
          <th scope='col' class='col-4'>Expense Title</th>
          <th scope='col' class='col-4'>Expense Value</th>
          <th scope='col' class='col-4'></th>
        </tr>
      </thead>
      <tbody id='my-table-body' class='text-danger h3'>
      </tbody>
    </table>`
  );
}

function showAlert(targetElement, text) {
  $(targetElement).css("display", "block");
  $(targetElement).text(text);
}

export function budgetFocusFade() {
  $(".budget-feedback").fadeOut("fast");
}

export function expenseFocusFade() {
  $(".expense-feedback").fadeOut("fast");
}

function tableRowData() {
  expenseArr.push(parseInt(amountInput));
}

function calculateExpense() {
  expenseAmount = 0;
  for (let i = 0; i < expenseArr.length; i++) {
    expenseAmount += expenseArr[i];
  }
  $("#expense-amount").text(expenseAmount);
}

function calculateBalance() {
  budgetAmount = parseInt($("#budget-amount").text());
  balanceAmount = budgetAmount - expenseAmount;
  $("#balance-amount").text(balanceAmount);
  if (balanceAmount > 0) {
    $("#balance").addClass("showGreen");
    $("#balance").removeClass("showRed");
  } else {
    $("#balance").addClass("showRed");
    $("#balance").removeClass("showGreen");
  }
}

function editButton(i) {
  $(`#edit-btn${i}`).on("click", function () {
    selected.row = $(this).attr("data-id");
    selected.expenseTitle = $(`#row-expense-title${i}`).text();
    selected.expenseAmount = parseInt($(`#row-expense-amount${i}`).text());

    $("#expense-input").val(selected.expenseTitle);
    $("#amount-input").val(selected.expenseAmount);

    $(`.fa-edit`).addClass("showWhite");
    $(`#row${selected.row}`).addClass("selectedBackground");
  });
}

function deleteButton(i) {
  $(`#delete-btn${i}`).on("click", function () {
    selected.row = $(this).attr("data-id");
    expenseArr[selected.row - 1] = 0;
    $(`#row${selected.row}`).remove();

    calculateExpense();
    calculateBalance();

    selected.row = "";
  });
}

function editRow() {
  $(`#row-expense-title${selected.row}`).text(`${expenseInput}`);
  $(`#row-expense-amount${selected.row}`).text(`${amountInput}`);

  expenseArr[selected.row - 1] = parseInt(amountInput);

  calculateExpense();
  calculateBalance();

  $(`.fa-edit`).removeClass("showWhite");
  $(`#row${selected.row}`).removeClass("selectedBackground");

  selected.row = "";
  selected.expenseTitle = "";
  selected.expenseAmount = 0;

  $("#expense-input").val("");
  $("#expense-input").blur();
  $("#amount-input").val("");
  $("#amount-input").blur();
}
