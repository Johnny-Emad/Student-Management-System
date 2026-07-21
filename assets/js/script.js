const storageKey = "studentManagementTheme";

function setTheme(theme) {
  const root = document.documentElement;
  const navbar = document.querySelector("nav.navbar");
  const themeToggle = document.getElementById("themeToggle");

  root.setAttribute("data-bs-theme", theme);
  root.style.colorScheme = theme;
  document.body.classList.remove("theme-light", "theme-dark");
  document.body.classList.add(theme === "dark" ? "theme-dark" : "theme-light");

  if (navbar) {
    if (theme === "dark") {
      navbar.classList.add("navbar-dark", "bg-dark");
      navbar.classList.remove(
        "navbar-light",
        "bg-light",
        "bg-white",
        "bg-body-tertiary",
      );
    } else {
      navbar.classList.add("navbar-light", "bg-white");
      navbar.classList.remove(
        "navbar-dark",
        "bg-dark",
        "bg-light",
        "bg-body-tertiary",
      );
    }
  }

  if (themeToggle) {
    themeToggle.innerHTML =
      theme === "dark"
        ? '<span aria-hidden="true">☀️</span><span class="d-none d-sm-inline">Light Mode</span>'
        : '<span aria-hidden="true">🌙</span><span class="d-none d-sm-inline">Dark Mode</span>';
    themeToggle.classList.toggle("btn-outline-light", theme === "dark");
    themeToggle.classList.toggle("btn-outline-secondary", theme === "light");
    themeToggle.classList.add("btn-sm");
  }

  localStorage.setItem(storageKey, theme);
}

document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem(storageKey);
  const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches
    ? "dark"
    : "light";
  const initialTheme = savedTheme || systemTheme;
  setTheme(initialTheme);

  const themeToggle = document.getElementById("themeToggle");
  themeToggle?.addEventListener("click", () => {
    const currentTheme = document.documentElement.getAttribute("data-bs-theme");
    const nextTheme = currentTheme === "dark" ? "light" : "dark";
    setTheme(nextTheme);
  });
});
