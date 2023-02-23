const checkboxes = document.querySelectorAll(".category-checkbox");
const bookCards = document.querySelectorAll(".book-card");

checkboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", () => {
    const selectedCategories = Array.from(checkboxes)
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => checkbox.value);

    bookCards.forEach((bookCard) => {
      if (selectedCategories.includes(bookCard.dataset.category)) {
        bookCard.style.display = "block";
      } else {
        bookCard.style.display = "none";
      }
      if (selectedCategories.length === 0) {
        bookCards.forEach((bookCard) => {
          bookCard.style.display = "block";
        });
      }
    });
  });
});
