import * as Func from "/js/functions.js";
$(function () {
  $("#budget-form").on("submit", Func.displayBalance);
  $("#expense-form").on("submit", Func.createTable);
  $("#budget-input").on("focus", Func.budgetFocusFade);
  $("#budget-input").on("focus", Func.expenseFocusFade);
  $("#expense-input").on("focus", Func.expenseFocusFade);
  $("#amount-input").on("focus", Func.expenseFocusFade);
});
