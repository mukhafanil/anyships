export class FilterButtonUpdater {
    constructor(filterPeople, filterHours, filterDate, rangeHoursInput, filterButton) {
        this.filterPeople = filterPeople;
        this.filterHours = filterHours;
        this.filterDate = filterDate;
        this.rangeHoursInput = rangeHoursInput;
        this.filterButton = filterButton;
    }

    #getPeopleDeclension(number) {
        const titles = ['человека', 'человек', 'человек'];
        const cases = [2, 0, 1, 1, 1, 2];
        return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
    }

    #getHoursDeclension(number) {
        const cases = [2, 0, 1, 1, 1, 2];
        const titles = ['час', 'часа', 'часов'];
        return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
    }

    updateButton() {
        let people = this.filterPeople.value,
            peopleMin = Number(this.filterPeople.getAttribute('min')),
            peopleMax = Number(this.filterPeople.getAttribute('max'));
        if (people < peopleMin) {
            people = peopleMin;
        } else if (people > peopleMax) {
            people = peopleMax;
        }

        let hours = this.filterHours.value,
            hoursMin = Number(this.filterHours.getAttribute('min')),
            hoursMax = Number(this.filterHours.getAttribute('max'));
        if (hours < hoursMin) {
            hours = hoursMin;
        } else if (hours > hoursMax) {
            hours = hoursMax;
        }

        let dateString = this.filterDate.value;
        let dateParts = dateString.split('.');
        let formattedDateString = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
        let date = new Date(formattedDateString);

        let startHour = (this.rangeHoursInput.value > 0 && this.rangeHoursInput.value <= 23) ? this.rangeHoursInput.value : '0';
        startHour = (startHour >= 0 && startHour <= 9) ? '0' + startHour : startHour;

        if (!isNaN(date.getTime())) {
            const dateStr = date.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', year: 'numeric' });
            const peopleDeclension = this.#getPeopleDeclension(people);
            const hoursDeclension = this.#getHoursDeclension(hours);
            this.filterButton.textContent = `Для ${people} ${peopleDeclension} на ${hours} ${hoursDeclension} - ${dateStr} с ${startHour}:00`;
        }
    }

    setupListeners() {
        this.filterPeople.addEventListener('input', () => this.updateButton());
        this.filterHours.addEventListener('input', () => this.updateButton());
        this.filterDate.addEventListener('input', () => this.updateButton());
        this.rangeHoursInput.addEventListener('input', () => this.updateButton());
    }
}