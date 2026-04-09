// ===== 1. Sapaan OTOMATIS =====
function setSapaan() {
    const hour = new Date().getHours();
    const Sapaan = document.getElementById("sapaan");

    if (!Sapaan) return;

    if (hour >= 5 && hour < 12) {
        Sapaan.textContent = "☀️ Selamat Pagi!";
    } else if (hour >= 12 && hour < 15) {
        Sapaan.textContent = "🌤️ Selamat Siang!";
    } else if (hour >= 15 && hour < 18) {
        Sapaan.textContent = "🌇 Selamat Sore!";
    } else {
        Sapaan.textContent = "🌙 Selamat Malam!";
    }
}

setGreeting();

// ===== 2. ACTIVE NAV LINK SAAT SCROLL =====
const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", function () {
    let currentSection = "";

    sections.forEach(function (section) {
        const sectionTop = section.offsetTop - 80;
        if (window.scrollY >= sectionTop) {
            currentSection = section.getAttribute("id");
        }
    });

    navLinks.forEach(function (link) {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + currentSection) {
            link.classList.add("active");
        }
    });
});

// ===== 3. BACK TO TOP BUTTON =====
const backToTopBtn = document.getElementById("back-to-top");

window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
        backToTopBtn.classList.add("show");
    } else {
        backToTopBtn.classList.remove("show");
    }
});

backToTopBtn.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});


// ===== 4. FADE-IN SAAT SCROLL =====
const fadeSections = document.querySelectorAll(".fade-section");

const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add("visible");
        }
    });
}, { threshold: 0.1 });

fadeSections.forEach(function (section) {
    observer.observe(section);
});