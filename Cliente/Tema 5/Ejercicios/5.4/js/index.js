function CheckForm() {
    let email = document.getElementById("email")
    let music = document.getElementById("music")
    let arrive = document.getElementById("arrive")
    let name = document.getElementById("name")
    let day = document.getElementById("day")
    let month = document.getElementById("month")
    let year = document.getElementById("year")
    let week_day = document.getElementById("week_day")
    let friends = document.getElementById("friends")

    let dataSend = "";

    var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    if (!(validEmail.test(email.value))) {
        error += "\t - Email no válido\n";
        email.value = null;
    } else {
        dataSend += " - Email: "+email.value + "\n";
    }

    dataSend += " - Musica: "+music.value + "\n";
    alert("Datos enviados: \n" + dataSend);


    let reds = new Array(7)
    for(let i = 1; i <= 7; i += 1)
        reds[i - 1] = document.getElementById("red_" + i)

    let dom = [email, music, arrive, name, day, month, year, week_day, friends]

    let counter = 0;
    for(let i = 0; i < dom.length; i += 1)
    {
        if (!dom[i].value)
        {
            counter += 1
            if(i < 7)
                reds[i].style.border = "solid 1px red"
        }
        else
        {
                reds[i].style.border = "solid 1px black"
        }
    }

    if (counter == 0)
        return true
    else
        return false
}