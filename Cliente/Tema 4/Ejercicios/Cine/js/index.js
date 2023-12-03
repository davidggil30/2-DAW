class Cinema {
    constructor(address, contact, taq, email, parking, minus, sound, films) {
        this.address = address;
        this.contact = contact;
        this.taq = taq;
        this.email = email;
        this.parking = parking;
        this.minus = minus;
        this.sound = sound;
        this.films = films;
    }

    Saca_info_cine() {
        document.write("<nav class='infoCine'>");
        document.write("<ul class='listInfo'>");
        document.write("<li>" + this.address + "</li>");
        document.write("<li>" + this.contact + "</li>");
        document.write("<li>" + this.taq + "</li>");
        document.write("<li>" + this.email + "</li>");
        document.write("<li>" + this.parking + "</li>");
        document.write("<li>" + this.minus + "</li>");
        document.write("<li>" + this.sound + "</li>");
        document.write("</ul>");
        document.write("</nav>");
    }

    Mostrar_películas() {
        for (let i = 0; i < this.films.length; i++) {
            document.write("<div class='film'>");
            document.write("<div class='title'>");
            document.write("<h3 id='h" + i + "'>" + this.films[i]['title'] + "</h3>");
            document.write("</div>");
            document.write("<div class='cover'>");
            document.write("<img src='" + this.films[i]['cover'] + " alt='Movie Cover'/>");
            document.write("</div>");
            document.write("<div class='gender'>");
            document.write("<p>" + this.films[i]['gender'] + "</p>");
            document.write("</div>");
            document.write("<div class='nationality'>");
            document.write("<p>" + this.films[i]['nationality'] + "</p>");
            document.write("</div>");
            document.write("<div class='rating'>");
            document.write("<p>" + this.films[i]['rating'] + "</p>");

            document.write("</div>");
            document.write("</div>");

            // Change the event listener to trigger on the movie title click
            var titleElement = document.getElementById('h' + i);
            titleElement.addEventListener('click', () => {
                this.infoPeli(i);
            });
        }
    }

    infoPeli(peli) {
        let newWin = window.open("./pages/info.html", "width=600, height=600");
        newWin.document.write("<div class='film'>");
        newWin.document.write("<div class='title'>");
        newWin.document.write("<h3 id='h" + peli + "'>" + this.films[peli]['title'] + "</h3>");
        newWin.document.write("</div>");
        newWin.document.write("<div class='cover'>");
        newWin.document.write("<img src='" + this.films[peli]['cover'] + "'/>");
        newWin.document.write("</div>");
        newWin.document.write("<div class='gender'>");
        newWin.document.write("<p>" + this.films[peli]['gender'] + "</p>");
        newWin.document.write("</div>");
        newWin.document.write("<div class='nationality'>");
        newWin.document.write("<p>" + this.films[peli]['nationality'] + "</p>");
        newWin.document.write("</div>");
        newWin.document.write("<div class='rating'>");
        newWin.document.write("<p>" + this.films[peli]['rating'] + "</p>");
        newWin.document.write("</div>");
        newWin.document.write("</div>");
    }
}

let filmsData = [
    {
        pid: '1',
        title: "Transformers",
        director: "Michael Bay",
        nationality: "Americana",
        gender: "Accion/Ciencia Ficcion",
        rating: "PG-13",
        description: "A long time ago, far away on the planet of Cybertron…",
        duration: "144",
        actors: "Shia LaBeouf, Megan Fox, Josh Duhamel, Tyrese Gibson",
        link_exterior: "http://www.transformersmovie.com/intl/es/",
        cover: "../img/TF.jpg"
    },
    {
        pid: '2',
        title: "Joshua",
        director: "George Ratliff",
        nationality: "Americana",
        gender: "Thriler",
        rating: "No Apta",
        description: "The arrival of a newborn girl causes the gradual disintegration of … ",
        duration: "130",
        actores: "Sam Rockwell, Vera Farmiga, Celia Weston",
        link_exterior: "http://imdb.com/title/tt0808331/",
        cover: "../img/JO.jpg"
    },
];

let cine = new Cinema("Avenida Libertad <br> Alcorcón <br> Madrid <br> 28924", "804 532 123", "Taquilla", "cine@gmail.com", "Parking: <br> Disponible 4 plazas", "Acceso minusválidos: 50", "Dolby Digital Surround 7.1", filmsData);
