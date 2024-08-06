// script.js
const calendar = {
    monthNames: ["January", "February", "March", "April", "May", "June", 
                 "July", "August", "September", "October", "November", "December"],
    currentMonth: new Date().getMonth(),
    currentYear: new Date().getFullYear(),

    renderCalendar: function() {
        const monthYear = document.getElementById('monthYear');
        const calendarDates = document.getElementById('calendar-dates');

        // Define o mês e o ano atual
        const firstDayOfMonth = new Date(this.currentYear, this.currentMonth, 1).getDay();
        const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();

        // Atualiza o título do mês/ano
        monthYear.textContent = `${this.monthNames[this.currentMonth]} ${this.currentYear}`;

        // Limpa as datas anteriores
        calendarDates.innerHTML = '';

        // Preenche os dias em branco do mês anterior
        for (let i = 0; i < firstDayOfMonth; i++) {
            const emptyCell = document.createElement('div');
            calendarDates.appendChild(emptyCell);
        }

        // Preenche os dias do mês atual
        for (let i = 1; i <= daysInMonth; i++) {
            const dateCell = document.createElement('div');
            dateCell.textContent = i;
            calendarDates.appendChild(dateCell);
        }
    },

    changeMonth: function(direction) {
        this.currentMonth += direction;
        if (this.currentMonth < 0) {
            this.currentMonth = 11;
            this.currentYear--;
        } else if (this.currentMonth > 11) {
            this.currentMonth = 0;
            this.currentYear++;
        }
        this.renderCalendar();
    }
};

document.getElementById('prevMonth').addEventListener('click', () => calendar.changeMonth(-1));
document.getElementById('nextMonth').addEventListener('click', () => calendar.changeMonth(1));

// Renderiza o calendário ao carregar a página
calendar.renderCalendar();
