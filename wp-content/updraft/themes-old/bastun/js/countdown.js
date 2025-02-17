function updateCountdown() {
    const countdownElement = document.querySelector('.featurearea__countdown');

    if (!countdownElement) {
        console.error('');
        return;
    }

    const targetDate = new Date(countdownElement.getAttribute('data-countdown')).getTime();

    const now = new Date().getTime();
    const distance = targetDate - now;

    
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    
    document.getElementById("days").innerText = days;
    document.getElementById("hours").innerText = hours;
    document.getElementById("minutes").innerText = minutes;
    document.getElementById("seconds").innerText = seconds;

    
    if (distance < 0) {
        clearInterval(interval);
        document.querySelector('.featurearea__countdown').innerHTML = "Time is up";
    }
}

const interval = setInterval(updateCountdown, 1000);

setInterval(updateCountdown, 1000);
updateCountdown();