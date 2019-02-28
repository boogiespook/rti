
<!doctype html>
<html lang="en">
<head>

<title>RTI Roadmap</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="roadmap.css">
<link rel="stylesheet" type="text/css" href="http://overpass-30e2.kxcdn.com/overpass.css"/>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script type="text/javascript">

var correctCards = 0;
$( init );

function init() {

  // Hide the success message
  $('#successMessage').hide();
  $('#successMessage').css( {
    left: '580px',
    top: '250px',
    width: 0,
    height: 0
  } );

  // Reset the game
  correctCards = 0;
  $('#cardPile').html( '' );
  $('#cardSlots').html( '' );
  $('#cardSlotsDev').html( '' );
  // Create the pile of shuffled cards
  var numbersOps = [ "Adaptive SOE", "Ansible Automation", "Compliance Scanning", "Open Source Enablement", "Business Influence Mapping" ];
  //numbers.sort( function() { return Math.random() - .5 } );
  var numbersDev = [ "Container Platforms", "Agile Development", "Open Innovation Lab", "Business Automation", "Microservices Design and Architecture" ];
  var workshops = [ "Adaptive SOE", "Ansible Automation", "Compliance Scanning", "Open Source Enablement", "Business Influence Mapping", "Container Platforms", "Agile Development", "Open Innovation Lab", "Business Automation", "Microservices Design and Architecture" ];
  //workshops.sort( function() { return Math.random() - .5 } );
  
  for ( var i=0; i<10; i++ ) {
//    $('<div>' + workshops[i] + '</div>').data( 'number', workshops[i] ).attr( 'id', 'card'+workshops[i] ).appendTo( '#cardPile' ).draggable( {
	var ii = i + 1;
    $('<div>' + workshops[i] + '</div>').data( 'number', workshops[i] ).attr( 'id', 'card'+[ii] ).appendTo( '#cardPile' ).draggable( {
      containment: '#content',
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
  }


  // Create the Ops card slots
  var wordsOps = [ '1', '2', '3', '4', '5','6','7','8','9','10'];
  for ( var i=1; i<=10; i++ ) {
    $('<div>' + wordsOps[i-1] + '</div>').data( 'number', i ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
  }

  // Create the Dev card slots
//  var wordsDev = [ 'Dev', 'Dev', 'Dev', 'Dev', 'Dev'];
//  for ( var i=1; i<=5; i++ ) {
//    $('<div>' + wordsDev[i-1] + '</div>').data( 'number', i ).appendTo( '#cardSlots' ).droppable( {
//      accept: '#cardPile div',
//      hoverClass: 'hovered',
//      drop: handleCardDrop
//    } );
//  }
//
}

function handleCardDrop( event, ui ) {
  var slotNumber = $(this).data( 'number' );
  var cardNumber = ui.draggable.data( 'number' );
    ui.draggable.addClass( 'correct' );
    ui.draggable.draggable( 'enable' );
    $(this).droppable( 'enable' );
    ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
    ui.draggable.draggable( 'option', 'revert', false );
    correctCards++;
    document.getElementById("totalWorkshops").innerHTML = correctCards;
}

</script>

</head>
<body>

<div class="wideBox">
  <h1>RTI Drag-and-Drop Roadmap</h1>
</div>

<div id="content">

  <div id="cardPile"></div>
Workshops    <div id="cardSlots"></div>Timeline
<!--   <div id="cardSlotsDev">Development</div> -->

<br>
<p>Total Workshops: <span id="totalWorkshops">0</span></p>


</div>

</body>
</html>

