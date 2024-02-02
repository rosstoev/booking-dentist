async function onScheduleFormSubmit(event) {
    event.preventDefault();
    const form = document.getElementById('schedule-form');

    try {
        const response = await fetch('/save-schedule', {
            method: "POST",
            body: new FormData(form)
        })

        const result = await response.json();
        const modalFormContentElement = document.getElementById('modal-form');
        modalFormContentElement.innerHTML = result.output;
        if (result.isValid) {
            location.href = '/';
        }
    } catch (error) {
        console.log(error);
    }
}

document.addEventListener("submit", onScheduleFormSubmit);
