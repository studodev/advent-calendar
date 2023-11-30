const calendarContainer = document.getElementById('calendar');

calendarContainer.addEventListener('click', e => {
    const target = e.target;
    if (target.classList.contains('opened') || !target.classList.contains('case')) {
        return;
    }

    const name = target.dataset.name;
    const day = target.dataset.day;

    const today = new Date();
    const dayDate = new Date(today.getFullYear(), 11, parseInt(day));
    if (today < dayDate) {
        alert("C'est trop tôt !");
        return;
    }

    target.classList.add('opened');
    fetch('/open', {
        method: 'POST',
        body: JSON.stringify({
            name: name,
            day: day,
        }),
    }).then(r => console.log(r));
});
