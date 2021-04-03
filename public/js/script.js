$(".dropdown-item").click(function() {
  $(this).closest(".input-group").find("input").val($(this).text())
});
var data = [{
    "code": "1234",
    "name": "banana"
  },
  {
    "code": "5678",
    "name": "apple"
  },
  {
    "code": "9635",
    "name": "grapes"
  }
]
let dropdown = $('#itemCode');
dropdown.empty();
$.each(data, function(key, entry) {
  dropdown.append($('<a class="dropdown-item"></a>').attr('value', entry.code).text(entry.name));

});
$("#itemCode").on("change", function(e) {
  var selectedOption = this.value;
  alert(selectedOption)
});