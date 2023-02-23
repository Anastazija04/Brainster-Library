console.log("hello ana");
let noteInput = document.getElementById("noteInput");
let urlParams = new URLSearchParams(window.location.search);
let id = urlParams.get("id");
let notesContainer = document.getElementById("notesContainer");
let addNoteBtn = document.getElementById("addNoteBtn");

function read() {
  $.ajax({
    url: "notes/notes.php",
    method: "POST",
    data: {
      bookId: id,
    },
    success: function (data) {
      notesContainer.innerHTML = "";
      noteInput.value = "";
      dbNotes = JSON.parse(data);
      dbNotes.forEach((element) => {
        let noteText = element.note;
        let noteWrapper = document.createElement("p");
        let note = document.createElement("div");
        let deleteBtn = document.createElement("button");
        let editBtn = document.createElement("button");

        note.classList.add("row", "border", "m-2", "p-2", "rounded");
        noteWrapper.classList.add("col-12", "m-2");
        noteWrapper.classList.add("overflow");
        editBtn.classList.add("bg-warning", "m-1", "radiusOnButtons");
        deleteBtn.classList.add("bg-warning", "m-1", "radiusOnButtons");

        deleteBtn.innerHTML = "<i class='fa-solid fa-trash'></i>";
        editBtn.innerHTML = "<i class='fa-solid fa-pen-to-square'></i>";
        deleteBtn.id = element.id;
        editBtn.id = element.id;
        noteWrapper.append(noteText);
        note.append(noteWrapper);
        note.append(editBtn);
        note.append(deleteBtn);
        notesContainer.append(note);

        deleteBtn.addEventListener("click", function () {
          $.ajax({
            url: "notes/notes.php",
            method: "POST",
            data: {
              delete: true,
              deleteId: deleteBtn.id,
            },
            success: function (data) {
              read();
            },
          });
        });
        deleteBtn.addEventListener("click", function () {
          $.ajax({
            url: "notes/notes.php",
            method: "POST",
            data: {
              delete: true,
              deleteId: deleteBtn.id,
            },
            success: function (data) {
              read();
            },
          });
        });
        editBtn.addEventListener("click", function () {
          let editInput = document.createElement("input");
          editInput.setAttribute("value", element.note);
          editInput.classList.add(
            "form-control",
            "bg-warning",
            "border",
            "text-dark",
            "mb-2"
          );
          notesContainer.append(editInput);
          let btnSave = document.createElement("button");
          btnSave.innerHTML =
            "<i class='fa-sharp fa-solid fa-floppy-disk'></i>";
          notesContainer.append(btnSave);
          btnSave.classList.add("bg-warning", "mb-2", "radiusOnButtons");
          btnSave.addEventListener("click", function () {
            if (editInput.value == "") {
              swal("The field cannot be empty!");
            } else {
              $.ajax({
                url: "notes/notes.php",
                method: "POST",
                data: {
                  edit: true,
                  editId: editBtn.id,
                  editInput: editInput.value,
                },
                success: function (data) {
                  console.log(data);
                  read();
                },
              });
            }
          });
        });
      });
    },
  });
}

read();

addNoteBtn.addEventListener("click", function () {
  let noteInputValue = noteInput.value;
  if (noteInputValue == "") {
    swal("The field cannot be empty!");
  } else {
    $.ajax({
      url: "notes/notes.php",
      method: "POST",
      data: {
        add: true,
        inputValue: noteInputValue,
        bookId: id,
      },
      success: function (data) {
        read();
      },
    });
  }
});
