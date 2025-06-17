window.onscroll = function () {
    const topBtn = document.getElementById("topBtn");
    if (topBtn) {
        topBtn.style.display = window.scrollY > 50 ? "block" : "none";
    }
};

document.addEventListener("DOMContentLoaded", function () {
    const topBtn = document.getElementById("topBtn");
    if (topBtn) {
        topBtn.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});


function updateClock() {
    const now = new Date();
    const time = now.toLocaleTimeString();
    document.getElementById("clock").textContent = time;
}
setInterval(updateClock, 1000);
updateClock();
