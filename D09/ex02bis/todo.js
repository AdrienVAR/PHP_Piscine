var todo_list = [];
var ft_list = $("#ft_list");
var cookie = [];

$(document).ready(function(){
    $("#btn").click(function(){
        var text = prompt("Create a ToDo");
        if (text){
         add_todo(text);
    }
    });
    if (get_cookie("todos")){
        todo_list = print_cookie();
    }
});

function set_cookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function get_cookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

function print_cookie() {
  todos = (document.cookie.split('=')[1]).split(',');
  var todosLength = todos.length;
  for (var i = 0; i < todosLength; i++) {
    add_todo(todos[i]);
  }
  return todos;
}

function add_todo(text){
   var newtd = document.createElement("div");
   newtd.innerHTML = text;
   ft_list.prepend(newtd);
   todo_list.push(newtd.textContent);
   set_cookie("todos", todo_list, 1);
   newtd.addEventListener("click", del_todo);
}

function del_todo(){
   if (confirm("Remove this item?")){
       this.parentElement.removeChild(this);
       var index = todo_list.indexOf(this.textContent);
       todo_list.splice(index, 1);
       set_cookie("todos", todo_list, 1);
   }
}