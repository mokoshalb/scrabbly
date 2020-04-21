var letterInput = document.getElementById('letters');
var findWords = function() {
    var results = [];
    var letters = letterInput.value.toLowerCase();
    results = ScrabbleWordFinder.find(letters);
    var startList = document.getElementById("startLetter");
    var endList = document.getElementById("endLetter");
    var limit = Number(document.getElementById("quantity").value);
    var startSelectedValue = startList.options[startList.selectedIndex].value;
    var endSelectedValue = endList.options[endList.selectedIndex].value;
    results = results.filter(function(str1){return str1[0].startsWith(startSelectedValue);});
    results = results.filter(function(str2){return str2[0].endsWith(endSelectedValue);});
    if(limit>1){
        results = results.filter(function(str3){return str3[0].length == limit;});
    }
    $('table').DataTable({
        order: [],
        paging: true,
        "pageLength": 50,
        "pagingType": "simple",
        "dom": '<"top"ip>rt<"bottom"p><"clear">',
        "language": {
          "emptyTable": "No combinations found for your letter input!"
        },
        data: results,
        destroy: true,
        columns: [
            { title: "Words" },
            { title: "Score" },
            { title: "Meaning" }
        ]
    } );
};

jQuery(function($) {
    $("#stage").wizard({
    	stepsWrapper: "#wrapped",
    	submit: ".submit",
    	beforeSelect: function( event, state ) {
    		if (!state.isMovingForward)
      		 return true;
    		var inputs = $(this).wizard('state').step.find(':input');
    		return !inputs.length || !!inputs.valid();
    	}
    }).validate({
    	errorPlacement: function(error, element) { 
    		error.insertAfter( element );
    	}
    });
});

jQuery(document).ready(function(){
    $('.qtyplus').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('name');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal)) {
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            $('input[name='+fieldName+']').val(1);
        }
    });
    $(".qtyminus").click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('name');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            $('input[name='+fieldName+']').val(0);
        }
    });
});

function changeToUpperCase(t) {
   var eleVal = document.getElementById(t.id);
   eleVal.value= eleVal.value.toUpperCase().replace(/\s/g,'*');
}

particlesJS("particles", {
    particles: {
        number: {
            value: 80,
            density: {
                enable: true,
                value_area: 600
            }
        },
        color: {
            value: "#BCBCBC"
        },
        shape: {
            type: "circle",
            stroke: {
                width: 0,
                color: "#BCBCBC"
            },
            polygon: {
                nb_sides: 5
            },
            image: {
                src: "img/github.svg",
                width: 100,
                height: 100
            }
        },
        opacity: {
            value: 0.8,
            random: false,
            anim: {
                enable: false,
                speed: 1,
                opacity_min: 0.1,
                sync: false
            }
        },
        size: {
            value: 3,
            random: true,
            anim: {
                enable: false,
                speed: 40,
                size_min: 0.1,
                sync: false
            }
        },
        line_linked: {
            enable: true,
            distance: 150,
            color: "#BCBCBC",
            opacity: 0.4,
            width: 1
        },
        move: {
            enable: true,
            speed: 4,
            direction: "none",
            random: false,
            straight: false,
            out_mode: "out",
            attract: {
                enable: false,
                rotateX: 600,
                rotateY: 1500
            }
        }
    },
    interactivity: {
        detect_on: "window",
        events: {
            onhover: {
                enable: true,
                mode: "repulse"
            },
            onclick: {
                enable: true,
                mode: "push"
            },
            resize: true
        },
        modes: {
            grab: {
                distance: 400,
                line_linked: {
                    opacity: 1
                }
            },
            bubble: {
                distance: 400,
                size: 40,
                duration: 2,
                opacity: 8,
                speed: 3
            },
            repulse: {
                distance: 100
            },
            push: {
                particles_nb: 4
            },
            remove: {
                particles_nb: 2
            }
        }
    },
    retina_detect: true
});