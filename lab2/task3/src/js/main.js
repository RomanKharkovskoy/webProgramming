document.addEventListener("DOMContentLoaded", function () {
    const startButton = document.getElementById("startButton");
    const statusDiv = document.getElementById("status");
    let links = [];
    let interval;

    startButton.addEventListener("click", function () {
        if (interval) {
            clearInterval(interval);
        }
        links = [];
        statusDiv.textContent = "";

        for (let i = 1; i <= 5; i++) {
            const linkInput = document.getElementById(`link${i}`).value;
            if (linkInput) {
                links.push(linkInput);
            }
        }

        const intervalValue = parseInt(document.getElementById("interval").value);
        if (intervalValue && links.length > 0) {
            let currentIndex = 0;

            interval = setInterval(function () {
                if (currentIndex < links.length) {
                    window.open(links[currentIndex], "_blank");
                    statusDiv.textContent = `Открыта ссылка ${currentIndex + 1}`;
                    currentIndex++;
                } else {
                    clearInterval(interval);
                    alert("Все ссылки открыты");
                    statusDiv.textContent = "Все ссылки открыты";
                }
            }, intervalValue * 1000);
        } else {
            statusDiv.textContent = "Пожалуйста, введите ссылки и интервал времени.";
        }
    });
});
