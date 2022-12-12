document.addEventListener("DOMContentLoaded", () => {

    if (window.location.pathname === '/') {

        const anchors = document.querySelectorAll('.scroll-to');
        for (let anchor of anchors) {
            anchor.addEventListener('click', function (e) {
                e.preventDefault()
                const blockID = anchor.getAttribute('href')

                document.querySelector(blockID).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                })
            })
        }

    } else {
        const anchors = document.querySelectorAll('.scroll-to')
        for (let anchor of anchors) {
            anchor.href = `https://dormint.io/${anchor.getAttribute('href')}`
        }
    }


    function editHeaderScroll() {
        if (scrollY !== 0 && scrollY > 10) {
            document.querySelector('header').classList.add('scroll')
        } else {
            document.querySelector('header').classList.remove('scroll')
        }
    }

    window.addEventListener('scroll', function () {
        editHeaderScroll()
    });

    const lockPadding = document.querySelectorAll('.lock-padding')
    const wrapper = document.querySelector('.wrapper')

    function bodyLock() {
        const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

        if (lockPadding.length > 0) {
            lockPadding.forEach((el) => {
                el.style.paddingRight = lockPaddingValue
            })
        }
        document.body.style.paddingRight = lockPaddingValue;
        document.body.classList.add('fixed');
    }

    function bodyUnLock() {
        document.body.style.paddingRight = '0'

        document.body.classList.remove('fixed')

        if (lockPadding.length > 0) {
            lockPadding.forEach((el) => {
                el.style.paddingRight = '0px'
            })
        }
    }

    const menuOpen = document.querySelector('.js-menu-open')
    const menu = document.querySelector('.js-menu')
    if (menuOpen)
        menuOpen.addEventListener('click', () => {
            bodyLock()
            menu.classList.toggle('open');
        })

    const menuClose = document.querySelectorAll('.js-menu-close')

    menuClose.forEach(el => {
        el.addEventListener('click', () => {
            bodyUnLock()
            menu.classList.toggle('open');
        })

    });

    const anchors = document.querySelectorAll('header .menu__list a[href*="#"]')
    console.log('anchors >>', anchors)
    //problem
    for (let anchor of anchors) {
        anchor.addEventListener('click', function (e) {
            // e.preventDefault()
            bodyUnLock()
            menu.classList.toggle('open');
            // const blockID = anchor.hash
            // // const blockID = anchor.getAttribute('href').substr(1)
            //
            // document.getElementById(blockID).scrollIntoView({
            //     behavior: 'smooth',
            //     block: 'start'
            // })
        })
    }

    const roadSlider = new Swiper('.road-slider', {
        loop: false,
        navigation: {
            nextEl: '.road .swiper-button-next',
            prevEl: '.road .swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1.3,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1023: {
                slidesPerView: 3,
                spaceBetween: 30
            },

            1250: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });

    const videoSlider = new Swiper('.video-slider', {
        loop: true,
        navigation: {
            nextEl: '.in-action .swiper-button-next',
            prevEl: '.in-action .swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 15
            },
            767: {
                slidesPerView: 2.3,
                spaceBetween: 20
            },

            1250: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });

    if (document.querySelector('.banner')) {
        const dev = {};

        dev.interactions = {

            button: function () {

                let $button = document.querySelector('.banner svg');
                gsap.set($button, {
                    top: Math.floor(Math.random() * (window.innerHeight - $button.offsetHeight)),
                    left: Math.floor(Math.random() * (window.innerWidth - $button.offsetWidth)),
                    opacity: 1
                });

                let rotate = gsap.timeline({
                    scrollTrigger: {
                        trigger: '.banner',
                        scrub: 0.2,
                        start: 'top top',
                        end: '+=10000',
                    }
                }).to($button, {
                    rotation: 360 * 0.5,
                    duration: 1,
                    ease: 'none'
                });

            }

        };

        dev.interactions.button();

        if (window.innerWidth > 1020) {
            gsap.registerPlugin(ScrollTrigger);
            const main = document.querySelector(".banner");
            const footer = document.querySelector(".phone-inner");

            ScrollTrigger.create({
                pin: true, scrub: true,
                scrub: 1,
                trigger: ".phone-inner",
                endTrigger: ".about",
                start: "top 90px",
                end: "top 270px",
            });
        }
    }

    const closeModalTeam = document.querySelectorAll('.close-modal-team')
    closeModalTeam.forEach(modal => {
        modal && modal.addEventListener('click', () => {
            Fancybox.close()
        })
    })


    let formEventSubmit = document.querySelectorAll('.wpcf7');
    formEventSubmit.forEach(form => {
        form.addEventListener('wpcf7mailsent', function (event) {
            console.log(event.detail.contactFormId);

            if (event.detail.contactFormId == 97){
                let messageSpan = document.querySelectorAll('.message-span');
                messageSpan.forEach(message => {
                        message.style.display = "inline-block";
                    }
                )
                setTimeout(() => {
                    form.style.display = "none";
                    messageSpan.classList.add('show');
                }, 300)
            }

            if (event.detail.contactFormId == 113 || event.detail.contactFormId == 114){
                let messageSpan = document.querySelectorAll('.message-span');
                messageSpan.forEach(message => {
                        message.style.display = "inline-block";
                    }
                )
                setTimeout(() => {
                    form.style.display = "none";
                    messageSpan.classList.add('show');
                }, 100)
            }
        })
    })
    let perLinks = document.querySelectorAll('.team-item__link');
    perLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.stopPropagation();
        })
    })

    const tokenTimelineSlider = new Swiper('.token-timeline-slider', {
        navigation: {
            nextEl: '.token-timeline-items .swiper-button-next',
            prevEl: '.token-timeline-items .swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 20
            },

            1199: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
    const pillowsTypesSlider = new Swiper('.pillows-types-slider', {
        navigation: {
            nextEl: '.pillows-types-items .swiper-button-next',
            prevEl: '.pillows-types-items .swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1.3,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1199: {
                slidesPerView: 4,
                spaceBetween: 30
            },

            1350: {
                slidesPerView: 5,
                spaceBetween: 30
            }
        }
    });


})

function randomScalingFactor() {
    return Math.round(Math.random() * 10);
}

const DATA_COUNT = 7;
const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};

var chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(231,233,237)',
    pink: 'rgb(86, 87, 247)'
};

const labels = {};
const data = {

    labels: JSON.parse(chartDataAbscissa),
    datasets: [
        {
            label: "In-game(Mining, Sleep to earn)",
            borderColor: chartColors.red,
            backgroundColor: chartColors.red,
            fill: true,
            data: JSON.parse(chartDataMining)
        },
        {
            label: "Marketing, Acquisitions, & Licenses",
            borderColor: chartColors.orange,
            backgroundColor: chartColors.orange,
            fill: true,
            data: JSON.parse(chartDataStaking)
        },
        {
            label: "Airdrop",
            borderColor: chartColors.yellow,
            backgroundColor: chartColors.yellow,
            fill: true,
            data: JSON.parse(chartDataMarketing)
        },
        {
            label: "Team, Partners, Advisors",
            borderColor: chartColors.green,
            backgroundColor: chartColors.green,
            fill: true,
            data: JSON.parse(chartDataAirdrop)
        },
        {
            label: "Public sale",
            borderColor: chartColors.blue,
            backgroundColor: chartColors.blue,
            fill: true,
            data: JSON.parse(chartDataTeam)
        },
        {
            label: "Liquidity",
            borderColor: chartColors.purple,
            backgroundColor: chartColors.purple,
            fill: true,
            data: JSON.parse(chartDataPublic)
        },
        {
            label: "Private sale",
            borderColor: chartColors.grey,
            backgroundColor: chartColors.grey,
            fill: true,
            data: JSON.parse(chartDataPrivate)
        },
        {
            label: "Seed",
            borderColor: chartColors.pink,
            backgroundColor: chartColors.pink,
            fill: true,
            data: JSON.parse(chartDataSeed)
        }]
};
const getOrCreateLegendList = (chart, id) => {
    const legendContainer = document.getElementById(id);
    let listContainer = legendContainer.querySelector('ul');

    if (!listContainer) {
        listContainer = document.createElement('ul');
        listContainer.style.display = 'flex';
        listContainer.style.flexDirection = 'row';
        listContainer.style.margin = 0;
        listContainer.style.padding = 0;
        legendContainer.appendChild(listContainer);
    }

    return listContainer;
};

const htmlLegendPlugin = {
    id: 'htmlLegend',
    afterUpdate(chart, args, options) {
        const ul = getOrCreateLegendList(chart, options.containerID);

        // Remove old legend items
        while (ul.firstChild) {
            ul.firstChild.remove();
        }

        // Reuse the built-in legendItems generator
        const items = chart.options.plugins.legend.labels.generateLabels(chart);

        items.forEach(item => {
            const li = document.createElement('li');
            li.style.alignItems = 'center';
            li.style.cursor = 'pointer';
            li.style.display = 'flex';
            li.style.flexDirection = 'row';

            li.onclick = () => {
                const {type} = chart.config;
                if (type === 'pie' || type === 'doughnut') {
                    // Pie and doughnut charts only have a single dataset and visibility is per item
                    chart.toggleDataVisibility(item.index);
                } else {
                    chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
                }
                chart.update();
            };

            // Color box
            const boxSpan = document.createElement('span');
            boxSpan.style.background = item.fillStyle;
            boxSpan.style.borderColor = item.strokeStyle;
            boxSpan.style.borderWidth = item.lineWidth + 'px';
            boxSpan.style.display = 'inline-block';
            boxSpan.style.height = '12px';
            boxSpan.style.marginRight = '10px';
            boxSpan.style.width = '12px';

            // Text
            const textContainer = document.createElement('p');
            textContainer.style.margin = 0;
            textContainer.style.padding = 0;
            textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

            const text = document.createTextNode(item.text);
            textContainer.appendChild(text);

            li.appendChild(boxSpan);
            li.appendChild(textContainer);
            ul.appendChild(li);
        });
    }
};

Chart.defaults.elements.bar.borderWidth = 5;
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {

        responsive: true,
        plugins: {
            htmlLegend: {
                // ID of the container to put the legend in
                containerID: 'legend-container',
            },
            legend: {
                display: false,
            }
        },
        scales: {
            y: {

                ticks: {
                    color: "white"
                },
                grid: {
                    display: true,
                    drawBorder: false,
                    color: 'rgba(182, 181, 215, 0.2)'
                }
            },
            x: {

                ticks: {
                    color: "white"
                },
                grid: {
                    display: true,
                    drawBorder: false,
                    color: 'rgba(182, 181, 215, 0.2)'
                }

            }
        }
    },
    plugins: [htmlLegendPlugin],
});