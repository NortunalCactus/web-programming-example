/* DEFINE DATA */
const times = {
    "T0": "-",
    "12:00": "T12",
    "15:00": "T15",
    "18:00": "T18",
    "21:00": "T21" 
}

const prices = {
    "FCA": [14, 19.8],
    "FCP": [22.5, 27],
    "FCC": [21, 24],
    "STA": [14, 19.8],
    "STP": [12.5, 17.5],
    "STC": [11, 15.3]
}
console.log(document.querySelectorAll('.normalprice'));

const RoundToNearest = function(num) {
    return (Math.round( num * 100 + Number.EPSILON ) / 100).toFixed(2);
}

const moviesData = [
    {
        "id": "ACT",
        "name": "Avengers: Endgame",
        "rating": "M",
        "img": "media/avenger.jpg",
        "plot": "After the devastating events of Avengers: Infinity War (2018), the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos's actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...",
        "trailer": "https://www.youtube.com/embed/TcMBFSGVi1c",
        "showtime": [
            {
                "code": "MON",
                "description": "Monday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "TUE",
                "description": "Tuesday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "WED",
                "description": "Wednesday",
                "times": [
                    {
                        "code": "T21",
                        "description": "21:00"
                    }
                ]
            },
            {
                "code": "THU",
                "description": "Thursday",
                "times": [
                    {
                        "code": "T21",
                        "description": "21:00"
                    }
                ]
            },
            {
                "code": "FRI",
                "description": "Friday",
                "times": [
                    {
                        "code": "T21",
                        "description": "21:00"
                    }
                ]
            },
            {
                "code": "SAT",
                "description": "Saturday",
                "times": [
                    {
                        "code": "T15",
                        "description": "18:00"
                    }
                ]
            },
            {
                "code": "SUN",
                "description": "Sunday",
                "times": [
                    {
                        "code": "T21",
                        "description": "18:00"
                    }
                ]
            }
        ]
    },
    {
        "id": "AHF",
        "name": "Top End Wedding",
        "rating": "M",
        "img": "media/wedding.jpg",
        "plot": "Lauren and Ned are engaged, they are in love, and they have just ten days to find Lauren's mother who has gone AWOL somewhere in the remote far north of Australia, reunite her parents and pull off their dream wedding.",
        "trailer": "https://www.youtube.com/embed/uoDBvGF9pPU",
        "showtime": [
            {
                "code": "MON",
                "description": "Monday",
                "times": [
                    {
                        "code": "T18",
                        "description": "18:00"
                    }
                ]
            },
            {
                "code": "TUE",
                "description": "Tuesday",
                "times": [
                    {
                        "code": "T18",
                        "description": "18:00"
                    }
                ]
            },
            {
                "code": "WED",
                "description": "Wednesday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "THU",
                "description": "Thursday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "FRI",
                "description": "Friday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "SAT",
                "description": "Saturday",
                "times": [
                    {
                        "code": "T15",
                        "description": "15:00"
                    }
                ]
            },
            {
                "code": "SUN",
                "description": "Sunday",
                "times": [
                    {
                        "code": "T15",
                        "description": "15:00"
                    }
                ]
            }
        ]
    },
    {
        "id": "ANM",
        "name": "Dumbo",
        "rating": "PG",
        "img": "media/dumbo.jpg",
        "plot": "Holt was once a circus star, but he went off to war and when he returned it had terribly altered him. Circus owner Max Medici (Danny DeVito) hires him to take care of Dumbo, a newborn elephant whose oversized ears make him the laughing stock of the struggling circus troupe. But when Holt's children discover that Dumbo can fly, silver-tongued entrepreneur V.A. Vandevere (Michael Keaton), and aerial artist Colette Marchant (Eva Green) swoop in to make the little elephant a star.",
        "trailer": "https://www.youtube.com/embed/7NiYVoqBt-8",
        "showtime": [
            {
                "code": "MON",
                "description": "Monday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            },
            {
                "code": "TUE",
                "description": "Tuesday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            },
            {
                "code": "WED",
                "description": "Wednesday",
                "times": [
                    {
                        "code": "T18",
                        "description": "18:00"
                    }
                ]
            },
            {
                "code": "THU",
                "description": "Thursday",
                "times": [
                    {
                        "code": "T18",
                        "description": "18:00"
                    }
                ]
            },
            {
                "code": "FRI",
                "description": "Friday",
                "times": [
                    {
                        "code": "T18",
                        "description": "18:00"
                    }
                ]
            },
            {
                "code": "SAT",
                "description": "Saturday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            },
            {
                "code": "SUN",
                "description": "Sunday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            }
        ]
    },
    {
        "id": "RMC",
        "name": "The Happy Prince",
        "rating": "MA15+",
        "img": "media/prince.jpg",
        "plot": "Holt was once a circus star, but he went off to war and when he returned it had terribly altered him. Circus owner Max Medici (Danny DeVito) hires him to take care of Dumbo, a newborn elephant whose oversized ears make him the laughing stock of the struggling circus troupe. But when Holt's children discover that Dumbo can fly, silver-tongued entrepreneur V.A. Vandevere (Michael Keaton), and aerial artist Colette Marchant (Eva Green) swoop in to make the little elephant a star.",
        "trailer": "https://www.youtube.com/embed/4HmN9r1Fcr8",
        "showtime": [
            {
                "code": "MON",
                "description": "Monday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "TUE",
                "description": "Tuesday",
                "times": [
                    {
                        "code": "T0",
                        "description": "-"
                    }
                ]
            },
            {
                "code": "WED",
                "description": "Wednesday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            },
            {
                "code": "THU",
                "description": "Thursday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            },
            {
                "code": "FRI",
                "description": "Friday",
                "times": [
                    {
                        "code": "T12",
                        "description": "12:00"
                    }
                ]
            },
            {
                "code": "SAT",
                "description": "Saturday",
                "times": [
                    {
                        "code": "T21",
                        "description": "21:00"
                    }
                ]
            },
            {
                "code": "SUN",
                "description": "Sunday",
                "times": [
                    {
                        "code": "T21",
                        "description": "21:00"
                    }
                ]
            }
        ]
    }
];

/* INIT */

let discountFlag = false;
let inputs = document.querySelectorAll('input[name=\'booking\']');
let labels = document.querySelectorAll('.booking-date label');

const synopsis = document.getElementById("sypnosis");
synopsis.style.display = "none";


let nav_bar = document.getElementById('navigation');
let nav_height = document.getElementsByTagName('nav')[0].clientHeight;
let nav_links = document.querySelectorAll('.nav-item');

document.addEventListener('scroll', () => {
    let sect1_top = document.getElementById('section1').offsetTop
    let sect2_top = document.getElementById('section2').offsetTop
    let sect3_top = document.getElementById('section3').offsetTop
    let win_y = window.scrollY + nav_height

    if (sect1_top < win_y && win_y < sect2_top) {
        nav_links[0].classList.add('active')
        nav_bar.style.backgroundColor = 'black'
    }
    else nav_links[0].classList.remove('active')

    if (sect2_top < win_y && win_y < sect3_top) {
        nav_links[1].classList.add('active')
        nav_bar.style.backgroundColor = 'darkslategrey'
    }
    else nav_links[1].classList.remove('active')


    if (sect3_top < win_y) {
        nav_links[2].classList.add('active')
        nav_bar.style.backgroundColor = '#424874'
    }
    else nav_links[2].classList.remove('active')
})



/* Add click event for each poster to display the synopsis information */
var posters = document.querySelectorAll('#poster');
posters.forEach(poster => {
    poster.addEventListener('click', (e) => {
        // removeSectionContent('booking-section');
        var movieID = e.target.id;
        const movie = moviesData.find(m => m.id === movieID);
        clear('booking-box .inner')
        getSynopsisInfo(movie);
        getShowTime(movie);

        window.scrollTo(0, synopsis.offsetTop - nav_height);
    });
});

const removeSectionContent = function(section){
    const node = document.getElementById(section);
    if(node !== null && 
        node.firstChild !== null){
        while(node.firstChild){
            node.removeChild(node.lastChild);
        }
    }
}

/* Update synopsis information for selected movie */
const getSynopsisInfo = function(movie){
    var synopsisInfoSection = document.getElementById('synopsis-info');
    
    var movieTitle = document.getElementById('synopsis-movie_title');
    var moviePlot =  document.getElementById('synopsis-movie_plot');
    var trailer = document.querySelector('iframe');
    var input = document.querySelector('input[name=\'movie[id]\']');
    //console.log(input);
    if(movie !== null){
        movieTitle.innerHTML = movie.name;
        moviePlot.innerHTML = movie.plot;
        trailer.src = movie.trailer;
        input.value = movie.id;
        synopsis.style.display = '';
    }
}
/* create showtime based on the selected movie */
const getShowTime = function(movie)
 {
     let showTimes = movie.showtime;

     for(let i =0; i < showTimes.length; i++){
         if(showTimes[i].code === inputs[i].id){
            inputs[i].disabled = false;
            if(showTimes[i].times[0].code === 'T0'){
                 inputs[i].disabled = true;
                 inputs[i].checked = false;
            }
            labels[i].innerHTML = showTimes[i].description + '<br>' + showTimes[i].times[0].description;
         }
     }
    // var movieShowTimes = movie.showtime;
    // var bookingSectionDiv = document.getElementById('booking-section');
    // movieShowTimes.forEach(show => {
    //     // Temporary code to only display 1 time slot for a certain day only
    //     //We can split the time slots of each day if there is further requirements in next assignment
    //     if(show.times[0].code !== 'T0'){
    //         const div = document.createElement('div');
    //         const inputRadio = document.createElement('input');
    //         const labelRadio = document.createElement('label');

    //         // inputRadio.setAttribute("type", "radio");
    //         // inputRadio.setAttribute("name", "booking");
    //         // inputRadio.id = show.code;
    //         // inputRadio.required = true;

    //         // labelRadio.setAttribute("for", show.code);
    //         // labelRadio.innerText = show.description + `<br>` + show.times[0].description;

    //         div.className = 'booking-date';
    //         // div.appendChild(inputRadio);
    //         // div.appendChild(labelRadio);
    
    //         div.innerHTML = `
    //         <input type="radio" name="booking" id='` + show.code + `' required>
    //         <label for='` + show.code  +`'>` + show.description + `<br>` + show.times[0].description + `</label>
    //         `
            
    //         // if(show.time === '-')
    //         // {
    //         //     div.querySelector('input[name=\'booking\']').disabled = true;
    //         //     div.querySelector('input[name=\'booking\']').checked = false;
    //         // }
    
    //         bookingSectionDiv.appendChild(div);
    //     }
    // });
    // const inputDay = document.createElement('input');
    // const inputHour = document.createElement
    // bookingSectionDiv.innerHTML += `
    // <input type="hidden" name="movieDay" required>
    // <input type="hidden" name="movieHour" required>
    // `
}

let discount_flag = false;
let total = document.getElementById('total');

const calculateTotalAmt = function(){
    let seats = [...document.getElementsByClassName('seats')].map(s => s.value ? Number(s.value) : 0)
    let temp = 0;
    for (let i = 0; i < 6; i++)
        if (discount_flag)
            temp += seats[i] * Object.values(prices)[i][0]
        else
            temp += seats[i] * Object.values(prices)[i][1]

    total.innerText = `Total: $${RoundToNearest(temp)}`
}

const clear = function (class_name) {
    $("."+class_name).find(':input').each(function() {
      switch(this.type) {
          case 'password':
          case 'text':
          case 'textarea':
          case 'file':
          case 'select-one':
          case 'select-multiple':
          case 'date':
          case 'number':
          case 'tel':
          case 'email':
              $(this).val('');
              break;
          case 'checkbox':
          case 'radio':
              this.checked = false;
              break;
      }
    });

    total.innerHTML = 'Total: ';
  }

let bookingDateSelections = document.querySelectorAll('.booking-date')
for (let i = 0; i < bookingDateSelections.length; i++) {
    bookingDateSelections[i].addEventListener('click', () => {
        if (!(inputs[i].checked)) return

        let day = inputs[i].id;
        let time = times[(labels[i].innerText).split('\n')[1]];

        document.querySelector('input[name=\'movie[day]\']').value = day
        document.querySelector('input[name=\'movie[hour]\']').value = time

        if (((day !== "SAT" || day !== "SUN") && time === 'T12') ||
            (day === "MON" || day === "WED"))
            discount_flag = true;
        else
            discount_flag = false;
        
        calculateTotalAmt();
            
    })
}



let seats = document.getElementsByClassName('seats')
for (const seat of seats) seat.addEventListener('change', calculateTotalAmt)



