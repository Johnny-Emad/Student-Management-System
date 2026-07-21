const storageKey = "studentManagementTheme";

function setTheme(theme) {
  const root = document.documentElement;
  const navbar = document.querySelector("nav.navbar");
  const themeToggle = document.getElementById("themeToggle");

  root.setAttribute("data-bs-theme", theme);
  document.body.classList.toggle("theme-light", theme === "light");
  document.body.classList.toggle("theme-dark", theme === "dark");

  if (navbar) {
    if (theme === "dark") {
      navbar.classList.add("navbar-dark", "bg-dark");
      navbar.classList.remove("navbar-light", "bg-light", "bg-body-tertiary");
    } else {
      navbar.classList.add("navbar-light", "bg-light");
      navbar.classList.remove("navbar-dark", "bg-dark", "bg-body-tertiary");
    }
  }

  if (themeToggle) {
    themeToggle.textContent = theme === "dark" ? "Light Mode" : "Dark Mode";
    themeToggle.classList.toggle("btn-outline-light", theme === "dark");
    themeToggle.classList.toggle("btn-outline-dark", theme === "light");
    themeToggle.classList.add("btn-sm");
  }

  localStorage.setItem(storageKey, theme);
}

document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem(storageKey) || "dark";
  setTheme(savedTheme);

  const themeToggle = document.getElementById("themeToggle");
  themeToggle?.addEventListener("click", () => {
    const currentTheme = document.documentElement.getAttribute("data-bs-theme");
    const nextTheme = currentTheme === "dark" ? "light" : "dark";
    setTheme(nextTheme);
  });
});
