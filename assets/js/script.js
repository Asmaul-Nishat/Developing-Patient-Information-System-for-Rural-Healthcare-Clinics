function setLang(lang) {
  alert("Language switched to: " + (lang === 'bn' ? 'বাংলা' : 'English'));
  // Later: load translations from JSON
}

// Sidebar toggle (for mobile)
document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.querySelector(".sidebar");
  const toggleBtn = document.createElement("button");
  toggleBtn.innerText = "☰";
  toggleBtn.classList.add("sidebar-toggle");
  document.body.prepend(toggleBtn);
  toggleBtn.onclick = () => sidebar.classList.toggle("open");
});
