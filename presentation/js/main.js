// initialize

var $sections = $(".panels section"),
    $panels = $("#panels"),
    $panelText = $(".panel-text"),
    $overlay = $(".overlay"),
    px = "px",
    numberOfPanels = $sections.length,
    dW = $(window).width(),
    panelWidth = Math.round(dW / numberOfPanels);


// check width for panels

function getWindowWidth() {
  return ($(window).width());
}
function getPanelsWidth() {
  return (Math.round(getWindowWidth() / (numberOfPanels-1))-10);
}

function isThereEnoughSpaceInWindow() {
  return (getWindowWidth() < 1200);
}

function checkWidth() {

  var panelWidth = getPanelsWidth();
    
      $sections.each(function( index ){
        
        var pW = panelWidth + 25;
        
        if ($(this).attr("id") == "thank") {
            pW = 80;
        }
          $(this).css({
            left: panelWidth*index+px,
            width: pW + px,
            zIndex: numberOfPanels
          });
      });

      $panels.css({ width: getWindowWidth()+px });

}

// check panels at load and resizing

$(window).load(function() {
    checkWidth();
});
$(window).resize(function() {
    checkWidth();
});

$sections.mouseover( function() {

});

// handle click

$sections.click( function() {

  var $this = $(this);

    if ($this.width() >= 1200) {
      checkWidth();

      $panels.css({
          height: "100%"
      });

    } else {
      $(this).css({ 
          width: 1440+px,
          left: 25+px,
          zIndex: 99999
        });

      $panels.css({
          height: $(this).attr("data-height")
      });

    }
    
    $overlay.toggle();  
    $panelText.toggle();  
});