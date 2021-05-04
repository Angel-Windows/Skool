// const calendar = calendar_bd.dataset.calendar_bd;
const calendar_bd = document.querySelector('.calendar_bd')
const card_element = calendar_bd.querySelectorAll('.card_element')
let parse = JSON.parse(calendar_bd.dataset.calendar_bd);
parse.forEach((element) => {
    let dateForm = Number(moment(element['date'], 'DD-M-YYYY H:mm:ss').format('H'))
    let dateFormMinute = moment(element['date'], 'DD-M-YYYY H:mm:ss').format('m')
    console.log(dateFormMinute*60/100)
    card_element[dateForm - 7].innerHTML = "<div class=\"card_calendar\">\n" +
        "<p>" + dateForm + " - " + (dateForm + element['range_lesson'] / 60) + "</p>\n" +
        "<p>Web-программирование(HTML+CSS), <i class=\"fas fa-user-graduate\"></i> " + element['user_id'] + ", <i class=\"fas fa-graduation-cap\"></i> Никитченко Сергей</p>\n" +
        "</div>";
    card_element[dateForm - 7].querySelector(".card_calendar").style.height = (element['range_lesson'] / 2) - 15 + "px";
    card_element[dateForm - 7].querySelector(".card_calendar").style.zIndex = 19 - dateForm;
    card_element[dateForm - 7].querySelector(".card_calendar").style.top = dateFormMinute/2+"px";
});




