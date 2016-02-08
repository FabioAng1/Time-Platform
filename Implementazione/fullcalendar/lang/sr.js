!function (a) {
    "function" == typeof define && define.amd ? define(["jquery", "moment"], a) : a(jQuery, moment)
}(function (a, b) {
    var c = {
        words: {
            m: ["jedan minut", "jedne minute"],
            mm: ["minut", "minute", "minuta"],
            h: ["jedan sat", "jednog sata"],
            hh: ["sat", "sata", "sati"],
            dd: ["dan", "dana", "dana"],
            MM: ["mesec", "meseca", "meseci"],
            yy: ["godina", "godine", "godina"]
        }, correctGrammaticalCase: function (a, b) {
            return 1 === a ? b[0] : a >= 2 && 4 >= a ? b[1] : b[2]
        }, translate: function (a, b, d) {
            var e = c.words[d];
            return 1 === d.length ? b ? e[0] : e[1] : a + " " + c.correctGrammaticalCase(a, e)
        }
    };
    (b.defineLocale || b.lang).call(b, "sr", {
        months: ["januar", "februar", "mart", "april", "maj", "jun", "jul", "avgust", "septembar", "oktobar", "novembar", "decembar"],
        monthsShort: ["jan.", "feb.", "mar.", "apr.", "maj", "jun", "jul", "avg.", "sep.", "okt.", "nov.", "dec."],
        weekdays: ["nedelja", "ponedeljak", "utorak", "sreda", "četvrtak", "petak", "subota"],
        weekdaysShort: ["ned.", "pon.", "uto.", "sre.", "čet.", "pet.", "sub."],
        weekdaysMin: ["ne", "po", "ut", "sr", "če", "pe", "su"],
        longDateFormat: {
            LT: "H:mm",
            LTS: "LT:ss",
            L: "DD. MM. YYYY",
            LL: "D. MMMM YYYY",
            LLL: "D. MMMM YYYY LT",
            LLLL: "dddd, D. MMMM YYYY LT"
        },
        calendar: {
            sameDay: "[danas u] LT", nextDay: "[sutra u] LT", nextWeek: function () {
                switch (this.day()) {
                    case 0:
                        return "[u] [nedelju] [u] LT";
                    case 3:
                        return "[u] [sredu] [u] LT";
                    case 6:
                        return "[u] [subotu] [u] LT";
                    case 1:
                    case 2:
                    case 4:
                    case 5:
                        return "[u] dddd [u] LT"
                }
            }, lastDay: "[juče u] LT", lastWeek: function () {
                var a = ["[prošle] [nedelje] [u] LT", "[prošlog] [ponedeljka] [u] LT", "[prošlog] [utorka] [u] LT", "[prošle] [srede] [u] LT", "[prošlog] [četvrtka] [u] LT", "[prošlog] [petka] [u] LT", "[prošle] [subote] [u] LT"];
                return a[this.day()]
            }, sameElse: "L"
        },
        relativeTime: {
            future: "za %s",
            past: "pre %s",
            s: "nekoliko sekundi",
            m: c.translate,
            mm: c.translate,
            h: c.translate,
            hh: c.translate,
            d: "dan",
            dd: c.translate,
            M: "mesec",
            MM: c.translate,
            y: "godinu",
            yy: c.translate
        },
        ordinalParse: /\d{1,2}\./,
        ordinal: "%d.",
        week: {dow: 1, doy: 7}
    }), a.fullCalendar.datepickerLang("sr", "sr", {
        closeText: "Затвори",
        prevText: "&#x3C;",
        nextText: "&#x3E;",
        currentText: "Данас",
        monthNames: ["Јануар", "Фебруар", "Март", "Април", "Мај", "Јун", "Јул", "Август", "Септембар", "Октобар", "Новембар", "Децембар"],
        monthNamesShort: ["Јан", "Феб", "Мар", "Апр", "Мај", "Јун", "Јул", "Авг", "Сеп", "Окт", "Нов", "Дец"],
        dayNames: ["Недеља", "Понедељак", "Уторак", "Среда", "Четвртак", "Петак", "Субота"],
        dayNamesShort: ["Нед", "Пон", "Уто", "Сре", "Чет", "Пет", "Суб"],
        dayNamesMin: ["Не", "По", "Ут", "Ср", "Че", "Пе", "Су"],
        weekHeader: "Сед",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: ""
    }), a.fullCalendar.lang("sr", {
        buttonText: {month: "Месец", week: "Недеља", day: "Дан", list: "Планер"},
        allDayText: "Цео дан",
        eventLimitText: function (a) {
            return "+ још " + a
        }
    })
});