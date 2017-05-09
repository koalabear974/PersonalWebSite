    <script src="../bootstrap/dist/js/jquery.min.js"></script>
   	<script src="../paralax/js/smoothWheel.js"></script>
    <script src="../paralax/js/raphael-min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

	<style type="text/css">
	body {
	    background: #fff;
	    color: #000;
	    font: 100.1% "Lucida Grande", Lucida, Verdana, sans-serif;
	}
</style>
<style media="screen">
    #holder {
        height: 1000px;
        width: 700px;
        margin-top: 0px;
        margin-left: auto;
        margin-right: auto;
    }
    #time {
        text-align: center;
        font: 100 3em "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>

<script>
window.onload = function () {
    (function() {
	  Raphael.fn.addGuides = function() {
	    this.ca.guide = function(g) {
	      return {
	        guide: g
	      };
	    };
	    this.ca.along = function(percent) {
	      var box = this.getBBox( false );
	      var g = this.attr("guide");
	      var len = g.getTotalLength();
	      var point = g.getPointAtLength(percent * len);
	      var t = {
	        transform: "...T" + [point.x - ( box.x + ( box.width / 2 ) ), point.y - ( box.y + ( box.height / 2 ) )]
	      };
	      return t;
	    };
	  };
	})();
    var backgroundFiller= {
    	stroke:'black',
    	opacity:0.1,
    	'stroke-width':'25px'
    },
    param = {
    	stroke: "#fff",
    	"stroke-width": 25,
    	cursor:'pointer'
    },
    subPath= {
    	"stroke-width": 1,
    	"stroke-opacity":0.0,
    	"fill-opacity":0.0,
    	"opacity":0.0
    },
    nonActiveCircle = {
    	width:'25px', 
    	height:'25px', 
    	r:'25', 
    	fill:'#483C44', 
    	stroke:'#483C44',
        cursor:'pointer'
    },    
    activeCircle = {
    	width:'35px', 
    	height:'35px', 
    	r:'35', 
    	fill:'#C7152B', 
    	stroke:'#C7152B',
        cursor:'pointer'
    },activeCircle2 = {
    	width:'35px', 
    	height:'35px', 
    	r:'35', 
    	fill:'#ADC264', 
    	stroke:'#ADC264',
        cursor:'pointer'
    },activeCircle3 = {
    	width:'35px', 
    	height:'35px', 
    	r:'35', 
    	fill:'#E68F49', 
    	stroke:'#E68F49',
        cursor:'pointer'
    },
    nonActiveText = {
    	'font-size':'14px',
    	'fill': 'white',
        cursor:'pointer'	
    },
    activeText = {
    	'font-size':'18px',
    	color: 'white',
        cursor:'pointer'
    },
    nonActiveLink = {
    	'stroke-width':'2px',
    	stroke: '#483C44'
    },
    activeLink = {
    	'stroke-width':'4px',
    	stroke: '#C7152B'
    },
    activeLink2 = {
    	'stroke-width':'4px',
    	stroke: '#ADC264'
    },
    activeLink3 = {
    	'stroke-width':'4px',
    	stroke: '#E68F49'
    };

    
	var paper = Raphael("holder");
	paper.addGuides();
    paper.customAttributes.arc = function (value, total, R) {
        var alpha = 360 / total * value,
            a = (90 - alpha) * Math.PI / 180,
            x = 350 + R * Math.cos(a),
            y = 400 - R * Math.sin(a),
            //color = "hsb(".concat(Math.round(R) / 200, ",", value / total, ", .75)"),
            path;
        if (total == value) {
            path = [["M", 350, 400 - R], ["A", R, R, 0, 1, 1, 499.99, 350 - R]];
        } else {
            path = [["M", 350, 400 - R], ["A", R, R, 0, +(alpha > 180), 1, x, y]];
        }
        //return {path: path, stroke: color};
    	return {path: path};
    };

	var R = 300,
	R1 = 240,
    R2 = R1 - 40,
    R3 = R2 - 40;

    var backCircle = paper.circle(350,400,R1);
    backCircle.attr(backgroundFiller);
    var backCircle = paper.circle(350,400,R2);
    backCircle.attr(backgroundFiller);
    var backCircle = paper.circle(350,400,R3);
    backCircle.attr(backgroundFiller);
    
    var firstValue = 0.1,
    firstLine = paper.path().attr(param).attr({arc: [firstValue, 100, R1]}),
    firstPathLine = paper.path().attr(subPath).attr({arc: [firstValue, 100, R]}),
    firstCircle = paper.circle(350,50,25),
    firstLink = paper.path().attr({path:"M"+ 350 + "," + 400 +"L"+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).x+","+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).y+ "z"}).attr(nonActiveLink).toBack(),
    firstText = paper.text(350,50,firstValue+"%").attr(nonActiveText);
   	firstCircle.mouseover(function (){
   		firstLink.animate(activeLink);
    	firstCircle.animate(activeCircle,100).toFront();
    	firstText.attr(activeText).toFront();
    });
    firstCircle.mouseout(function (){
    	firstText.attr(nonActiveText).toBack();
    	firstCircle.animate(nonActiveCircle,100).toBack();
    	firstLink.animate(nonActiveLink).toBack();
    });
    firstText.mouseover(function (){
    	firstLink.animate(activeLink);
    	firstCircle.animate(activeCircle,100).toFront();
    	firstText.attr(activeText).toFront();
    });
    firstText.mouseout(function (){
    	firstText.attr(nonActiveText).toBack();
    	firstCircle.animate(nonActiveCircle,100).toBack();
    	firstLink.animate(nonActiveLink).toBack();
    });
    firstCircle.node.onclick = function() {
    	firstValue+=10;
    	if(firstValue>100){
    		firstValue-=100;
    	}else if(firstValue==100){
    		firstValue=99.999;
    	}
	    firstPathLine.animate({arc: [firstValue, 100, R]},1,"linear",function (){
		    var len = firstPathLine.getTotalLength(),
		    	tempPathLine=paper.path(firstPathLine.getSubpath(len-180,len)).attr(subPath);
	    	firstLine.animate({arc: [firstValue, 100, R1]},750,"linear");
		    firstCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    firstText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    firstLink.animate({path:"M"+ 350 + "," + 400 +"L"+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).x+","+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).y+ "z"},750,"linear");
		    firstText.attr('text',Math.round(firstValue)+"%");
	    });
    };	
    firstLine.node.onclick = function() {
    	firstValue+=10;
    	if(firstValue>100){
    		firstValue-=100;
    	}else if(firstValue==100){
    		firstValue=99.999;
    	}
    	firstPathLine.animate({arc: [firstValue, 100, R]},1,"linear",function (){
		    var len = firstPathLine.getTotalLength(),
		    	tempPathLine=paper.path(firstPathLine.getSubpath(len-180,len)).attr(subPath);
	    	firstLine.animate({arc: [firstValue, 100, R1]},750,"linear");
		    firstCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    firstText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    firstLink.animate({path:"M"+ 350 + "," + 400 +"L"+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).x+","+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).y+ "z"},750,"linear");
		    firstText.attr('text',Math.round(firstValue)+"%");
	    });
    };
    firstText.node.onclick = function() {
        firstValue+=10;
        if(firstValue>100){
            firstValue-=100;
        }else if(firstValue==100){
            firstValue=99.999;
        }
        firstPathLine.animate({arc: [firstValue, 100, R]},1,"linear",function (){
            var len = firstPathLine.getTotalLength(),
                tempPathLine=paper.path(firstPathLine.getSubpath(len-180,len)).attr(subPath);
            firstLine.animate({arc: [firstValue, 100, R1]},750,"linear");
            firstCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
            firstText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
            firstLink.animate({path:"M"+ 350 + "," + 400 +"L"+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).x+","+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).y+ "z"},750,"linear");
            firstText.attr('text',Math.round(firstValue)+"%");
        });
    };	
    firstLine.attr({stroke:'#C7152B'});
    firstCircle.attr(nonActiveCircle);
    firstCircle.attr({guide : firstPathLine, along : 0}).animate({along : 1}, 1, "linear");
    firstText.attr({guide : firstPathLine, along : 0}).animate({along : 1}, 1, "linear");
    firstText.attr('text',Math.round(firstValue)+"%").toFront();

    var secondValue = 0.1,
    secondLine = paper.path().attr(param).attr({arc: [secondValue, 100, R2]}),
    secondPathLine = paper.path().attr(subPath).attr({arc: [secondValue, 100, R]}),
    secondCircle = paper.circle(350,50,25),
    secondLink = paper.path().attr({path:"M"+ 350 + "," + 400 +"L"+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).x+","+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).y+ "z"}).attr(nonActiveLink).toBack(),
    secondText = paper.text(350,50,secondValue+"%").attr(nonActiveText);
    secondCircle.mouseover(function (){
    	secondLink.animate(activeLink2);
    	secondCircle.animate(activeCircle2,100).toFront();
    	secondText.attr(activeText).toFront();
    });
    secondCircle.mouseout(function (){
    	secondText.attr(nonActiveText).toBack();
    	secondCircle.animate(nonActiveCircle,100).toBack();
    	secondLink.animate(nonActiveLink).toBack();
    });
    secondText.mouseover(function (){
    	secondLink.animate(activeLink2);
    	secondCircle.animate(activeCircle2,100).toFront();
    	secondText.attr(activeText).toFront();
    });
    secondText.mouseout(function (){
    	secondText.attr(nonActiveText).toBack();
    	secondCircle.animate(nonActiveCircle,100).toBack();
    	secondLink.animate(nonActiveLink).toBack();
    });

    secondCircle.node.onclick = function() {
    	secondValue+=10;
    	if(secondValue>100){
    		secondValue-=100;
    	}else if(secondValue==100){
    		secondValue=99.999;
    	}
    	secondPathLine.animate({arc: [secondValue, 100, R]},1,"linear",function (){
		    var len = secondPathLine.getTotalLength(),
		    tempPathLine=paper.path(secondPathLine.getSubpath(len-180,len)).attr(subPath);
	    	secondLine.animate({arc: [secondValue, 100, R2]},750,"linear");
		    secondCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    secondText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    secondLink.animate({path:"M"+ 350 + "," + 400 +"L"+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).x+","+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).y+ "z"},750,"linear");
		    secondText.attr('text',Math.round(secondValue)+"%");
	    });
    };
    secondLine.node.onclick = function() {
    	secondValue+=10;
    	if(secondValue>100){
    		secondValue-=100;
    	}else if(secondValue==100){
    		secondValue=99.999;
    	}
    	secondPathLine.animate({arc: [secondValue, 100, R]},1,"linear",function (){
		    var len = secondPathLine.getTotalLength(),
		    	tempPathLine=paper.path(secondPathLine.getSubpath(len-180,len)).attr(subPath);
	    	secondLine.animate({arc: [secondValue, 100, R2]},750,"linear");
		    secondCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    secondText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    secondLink.animate({path:"M"+ 350 + "," + 400 +"L"+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).x+","+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).y+ "z"},750,"linear");
		    secondText.attr('text',Math.round(secondValue)+"%");
	    });
    };
    secondText.node.onclick = function() {
        secondValue+=10;
        if(secondValue>100){
            secondValue-=100;
        }else if(secondValue==100){
            secondValue=99.999;
        }
        secondPathLine.animate({arc: [secondValue, 100, R]},1,"linear",function (){
            var len = secondPathLine.getTotalLength(),
                tempPathLine=paper.path(secondPathLine.getSubpath(len-180,len)).attr(subPath);
            secondLine.animate({arc: [secondValue, 100, R2]},750,"linear");
            secondCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
            secondText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
            secondLink.animate({path:"M"+ 350 + "," + 400 +"L"+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).x+","+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).y+ "z"},750,"linear");
            secondText.attr('text',Math.round(secondValue)+"%");
        });
    };	
    secondLine.attr({stroke:'#ADC264'});
	secondCircle.attr(nonActiveCircle);
	secondCircle.attr({guide : secondPathLine, along : 0}).animate({along : 1}, 1, "linear");
	secondText.attr({guide : secondPathLine, along : 0}).animate({along : 1}, 1, "linear");
    secondText.attr('text',Math.round(secondValue)+"%").toFront();

	var thirdValue= 0.1,
	thirdLine = paper.path().attr(param).attr({arc: [thirdValue, 100, R3]}),
	thirdPathLine = paper.path().attr(subPath).attr({arc: [thirdValue, 100, R]}),
	thirdCircle = paper.circle(350,50,25),
	thirdLink = paper.path().attr({path:"M"+ 350 + "," + 400 +"L"+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).x+","+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).y+ "z"}).attr(nonActiveLink).toBack(),
	thirdText = paper.text(350,50,thirdValue+"%").attr(nonActiveText);
    thirdCircle.mouseover(function (){
		thirdLink.animate(activeLink3);
    	thirdCircle.animate(activeCircle3,100).toFront();
    	thirdText.attr(activeText).toFront();
    });
    thirdCircle.mouseout(function (){
    	thirdText.attr(nonActiveText).toBack();
    	thirdCircle.animate(nonActiveCircle,100).toBack();
    	thirdLink.animate(nonActiveLink).toBack();
    });
    thirdText.mouseover(function (){
    	thirdLink.animate(activeLink3);
    	thirdCircle.animate(activeCircle3,100).toFront();
    	thirdText.attr(activeText).toFront();
    });
    thirdText.mouseout(function (){
    	thirdText.attr(nonActiveText).toBack();
    	thirdCircle.animate(nonActiveCircle,100).toBack();
    	thirdLink.animate(nonActiveLink).toBack();
    });
    thirdCircle.node.onclick = function() {
    	thirdValue+=10;
    	if(thirdValue>100){
    		thirdValue-=100;
    	}else if(thirdValue==100){
    		thirdValue=99.999;
    	}
    	thirdPathLine.animate({arc: [thirdValue, 100, R]},1,"linear",function (){
		    var len = thirdPathLine.getTotalLength(),
		    tempPathLine=paper.path(thirdPathLine.getSubpath(len-180,len)).attr(subPath);
	    	thirdLine.animate({arc: [thirdValue, 100, R3]},750,"linear");
		    thirdCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    thirdText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    thirdLink.animate({path:"M"+ 350 + "," + 400 +"L"+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).x+","+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).y+ "z"},750,"linear");
		    thirdText.attr('text',Math.round(thirdValue)+"%");
	    });
    };
    thirdLine.node.onclick = function() {
    	thirdValue+=10;
    	if(thirdValue>100){
    		thirdValue-=100;
    	}else if(thirdValue==100){
    		thirdValue=99.999;
    	}
    	thirdPathLine.animate({arc: [thirdValue, 100, R]},1,"linear",function (){
		    var len = thirdPathLine.getTotalLength();
		    var tempPathLine=paper.path(thirdPathLine.getSubpath(len-180,len)).attr(subPath);
	    	thirdLine.animate({arc: [thirdValue, 100, R3]},750,"linear");
		    thirdCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    thirdText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    thirdLink.animate({path:"M"+ 350 + "," + 400 +"L"+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).x+","+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).y+ "z"},750,"linear");
		    thirdText.attr('text',Math.round(thirdValue)+"%");
	    });
    };
    thirdText.node.onclick = function() {
        thirdValue+=10;
        if(thirdValue>100){
            thirdValue-=100;
        }else if(thirdValue==100){
            thirdValue=99.999;
        }
        thirdPathLine.animate({arc: [thirdValue, 100, R]},1,"linear",function (){
            var len = thirdPathLine.getTotalLength();
            var tempPathLine=paper.path(thirdPathLine.getSubpath(len-180,len)).attr(subPath);
            thirdLine.animate({arc: [thirdValue, 100, R3]},750,"linear");
            thirdCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
            thirdText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
            thirdLink.animate({path:"M"+ 350 + "," + 400 +"L"+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).x+","+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).y+ "z"},750,"linear");
            thirdText.attr('text',Math.round(thirdValue)+"%");
        });
    };	
    thirdLine.attr({stroke:'#E68F49'});
    thirdCircle.attr(nonActiveCircle);
    thirdCircle.attr({guide : thirdPathLine, along : 0}).animate({along : 1}, 1, "linear");
    thirdText.attr({guide : thirdPathLine, along : 0}).animate({along : 1}, 1, "linear");
    thirdText.attr('text',Math.round(thirdValue)+"%").toFront();

    var fillCircle = paper.circle(350,400,147).attr({stroke:'white',fill:'white'});
    var img = paper.image("../img/tabletImage.PNG",266,295,167,210).toFront();

    firstValue=10;
    firstPathLine.animate({arc: [firstValue, 100, R]},1,"linear",function (){
	    var len = firstPathLine.getTotalLength();
	    var tempPathLine=paper.path(firstPathLine.getSubpath(len-180,len)).attr(subPath);
    	firstLine.animate({arc: [firstValue, 100, R1]},750,"linear");
	    firstCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
	    firstText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
	    firstLink.animate({path:"M"+ 350 + "," + 400 +"L"+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).x+","+firstPathLine.getPointAtLength(firstPathLine.getTotalLength()).y+ "z"},750,"linear");
	    firstText.attr('text',Math.round(firstValue)+"%");
    });


    secondValue=20;
    secondPathLine.animate({arc: [secondValue, 100, R]},1,"linear",function (){
		    var len = secondPathLine.getTotalLength();
		    var tempPathLine=paper.path(secondPathLine.getSubpath(len-180,len)).attr(subPath);
	    	secondLine.animate({arc: [secondValue, 100, R2]},750,"linear");
		    secondCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    secondText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
		    secondLink.animate({path:"M"+ 350 + "," + 400 +"L"+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).x+","+secondPathLine.getPointAtLength(secondPathLine.getTotalLength()).y+ "z"},750,"linear");
		    secondText.attr('text',Math.round(secondValue)+"%");
	    });

    thirdValue=30;
    thirdPathLine.animate({arc: [thirdValue, 100, R]},1,"linear",function (){
	    var len = thirdPathLine.getTotalLength();
	    var tempPathLine=paper.path(thirdPathLine.getSubpath(len-180,len)).attr(subPath);
		thirdLine.animate({arc: [thirdValue, 100, R3]},750,"linear");
	    thirdCircle.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
	    thirdText.attr({guide : tempPathLine, along : 0}).animate({along : 1}, 750, "linear");
	    thirdLink.animate({path:"M"+ 350 + "," + 400 +"L"+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).x+","+thirdPathLine.getPointAtLength(thirdPathLine.getTotalLength()).y+ "z"},750,"linear");
	    thirdText.attr('text',Math.round(thirdValue)+"%");
	});

};
</script>

</head>
<body>
    <div id="holder"></div>
    
    
</body>
