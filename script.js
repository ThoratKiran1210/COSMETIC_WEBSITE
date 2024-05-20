let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".header .navbar");

menu.onclick = () => {
  menu.classList.toggle("fas-times");
  navbar.classList.toggle("active");
};

window.onscroll = () => {
  menu.classList.remove("fas-times");
  navbar.classList.remove("active");
};


let slides = document.querySelectorAll(".home .slide");
let index = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.classList.add("active");
        } else {
            slide.classList.remove("active");
        }
    });
}

function next() {
    index = (index + 1) % slides.length;
    showSlide(index);
}

function prev() {
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
}






const contactForm = document.getElementById("contactForm");

contactForm.addEventListener("submit", (event) => {
  const contactForm = document.getElementById("contactForm");

  contactForm.addEventListener("submit", (event) => {
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");

    if (!nameInput.value || !emailInput.value) {
      event.preventDefault();
      if (!nameInput.value) {
        alert("Please enter your name.");
      }

      if (!emailInput.value) {
        alert("Please enter your email address.");
      }
    }
  });
  event.preventDefault();
  const requiredFields = contactForm.querySelectorAll(
    "input[required], textarea"
  );
  requiredFields.forEach((field) => (field.value = ""));
  alert("Message sent successfully!");
});

document
  .getElementById("subscribe-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    var email = document.querySelector(".email").value;
    var successMessage = document.getElementById("success-msg");
    successMessage.style.display = "block";
    document.getElementById("subscribe").value = "Visit  our website again!";
    document.querySelector(".email").value = "";
  });

function submitQuiz() {
  // Get user selections
  const skinType = document.querySelector(
    'input[name="skinType"]:checked'
  ).value;
  const makeupStyle = document.querySelector(
    'input[name="makeupStyle"]:checked'
  ).value;
  const foundationCoverage = document.querySelector(
    'input[name="foundationCoverage"]:checked'
  ).value;
  const skinConcerns = [];

  const checkboxes = document.querySelectorAll(
    'input[name="skinConcerns"]:checked'
  );
  for (const checkbox of checkboxes) {
    skinConcerns.push(checkbox.value);
  }

  let result = `Your perfect makeup look:\n`;
  result += `  Skin Type: ${skinType}\n`;
  result += `  Makeup Style: ${makeupStyle}\n`;
  result += `  Foundation Coverage: ${foundationCoverage}\n`;

  if (skinConcerns.length > 0) {
    result += `  Skin Concerns: ${skinConcerns.join(", ")}`;
  }
  alert(result);
}

const searchInput = document.getElementById("search-input");

searchInput.addEventListener("input", function (event) {
  event.preventDefault();
  const query = searchInput.value.trim().toLowerCase();
  const products = document.querySelectorAll(".box");
  let found = false;
  products.forEach((product) => {
    const productName = product.querySelector("h3").textContent.toLowerCase();
    if (productName.includes(query)) {
      product.style.display = "block";
      found = true;
    } else {
      product.style.display = "none";
    }
  });
});


































