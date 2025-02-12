// console.log("theme scripts are in");
document.addEventListener('DOMContentLoaded', function () {

    function setVh() {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
    setVh();
    
    // Debounce helper to limit the frequency of function calls
    function debounce(func, wait = 100) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
    window.addEventListener('resize', debounce(setVh, 100));

    console.log(
        "%cLooking for easter eggs huh? Well, it's dangerous to go alone, take this! - hi@ericrees.email",
        "color: #ffffff; background-color: #BC6C25; font-size: 12px; padding: 8px 12px; border-radius: 4px;"
      );
});
