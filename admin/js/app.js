document.addEventListener("DOMContentLoaded", () => {
    const sidebarToggle = document.getElementById("sidebarToggle");
    const mobileSidebarToggle = document.getElementById("mobileSidebarToggle");

    sidebarToggle?.addEventListener("click", () => {
        document.getElementById("sidebar")?.classList.toggle("collapsed");
    });

    mobileSidebarToggle?.addEventListener("click", () => {
        document.getElementById("sidebar")?.classList.toggle("open");
    });

    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            document.querySelectorAll(".nav-link").forEach(l => l.classList.remove("active"));
            link.classList.add("active");

            const page = link.getAttribute("data-page");
            document.querySelectorAll(".page-content").forEach(pc => pc.classList.remove("active"));
            document.getElementById(`${page}Content`)?.classList.add("active");

            const title = link.querySelector("span")?.textContent;
            document.getElementById("pageTitle").textContent = title;
        });
    });

    document.getElementById("refreshBtn")?.addEventListener("click", () => {
        location.reload();
    });
});
