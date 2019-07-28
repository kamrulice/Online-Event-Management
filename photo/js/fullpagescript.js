var myFullpage = new fullpage('#fullpage', {
                sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
                anchors: ['firstPage', 'secondPage', '3rdPage', 'fourthPage','fifthPage','sixthPage'],
                navigation: true,

                showActiveTooltip: true,
                menu: '#menu',
                responsiveWidth: 900,
                autoScrolling: true,
                scrollBar: false,
                afterResponsive: function (isResponsive) {}
            });